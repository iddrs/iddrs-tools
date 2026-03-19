<?php

use Twig\Environment;
use function contab\tester\get_value_for_test;
use function contab\tester\store\saldo_invertido_excecoes;
use function contab\tester\test_name;
use function support\db\db;

return function(int $remessa, string $entidade, Environment $templates, array &$result): bool {
    
    $name = 'Saldos invertidos';
    $testId = test_name(__FILE__);
    $success = false;
    
    //seleciona as contas contábeis
    $sql = <<<SQL
        select distinct
            conta_contabil,
            nm_conta_contabil,
            escrituravel
        from pcasp
        where remessa = $remessa
        order by conta_contabil asc;
    SQL;
    //prepara o filtro para ser usado na busca por saldos
    $pcasp = array_map(function($row){
        $filter = $row['conta_contabil'];
        $i = strlen($filter);
        while($i >= 0){
            if($filter[$i-1] !== '0' && $filter[$i-1] !== '.'){
                break;
            }
            --$i;
            $filter = substr($filter, 0, $i);
        }
        $row['filtro'] = $filter;
        return $row;
    }, db()->query($sql)->fetchAll(PDO::FETCH_ASSOC));
    
    $diferencas = [];//armazena as diferenças encontradas
    $excecoes = saldo_invertido_excecoes();
    
    foreach ($pcasp as $item){
        // Identifica a natureza do saldo
        switch ((int) $item['conta_contabil'][0]){
            case 1:
            case 3:
            case 5:
            case 7:
                $natureza_esperada = 'D';
                break;
            case 2:
            case 4:
            case 6:
            case 8:
                $natureza_esperada = 'C';
                break;
        }
        // verifica se a conta não é uma exceção
        if(key_exists($item['conta_contabil'], $excecoes)){
            $natureza_esperada = $excecoes[$item['conta_contabil']];
        }
        
        // se a conta tem saldo misto, então pula para a próxima
        if($natureza_esperada == 'DC') continue;
        
        //calcula o saldo encontrado
        $sql = <<<SQL
                select
                    sum(saldo_final)
                from bal_ver
                where
                    remessa = $remessa
                    and entidade like '$entidade'
                    and conta_contabil like '{$item['filtro']}%';
        SQL;
        $saldo_final = get_value_for_test($sql);
        // se o saldo final é zero, apenas segue para a próxima conta
        if($saldo_final === 0.0) continue;
        
        // identifica a natureza do saldo final
        switch ((int) $item['conta_contabil'][0]){
            case 1:
            case 3:
            case 5:
            case 7:
                if($saldo_final > 0.0) {
                    $natureza_encontrada = 'D';
                }else{
                    $natureza_encontrada = 'C';
                }
                break;
            case 2:
            case 4:
            case 6:
            case 8:
                if($saldo_final > 0.0) {
                    $natureza_encontrada = 'C';
                }else{
                    $natureza_encontrada = 'D';
                }
                break;
        }
        
        // se tudo certo, só continua
        if($natureza_esperada === $natureza_encontrada) continue;
        
        $diferencas[] = [
            'conta_contabil' => $item['conta_contabil'],
            'nm_conta_contabil' => $item['nm_conta_contabil'],
            'natureza_esperada' => $natureza_esperada,
            'natureza_encontrada' => $natureza_encontrada,
            'saldo_final' => $saldo_final
        ];
    }
    
    if(count($diferencas) === 0) $success = true;
    
    $result[$testId] = [
        'name' => $name,
        'success' => $success,
        'html' => $templates->render('saldo-invertido.twig', [
            'testId' => $testId,
            'testTitle' => $name,
            'testSuccess' => $success,
            'diferencas' => $diferencas,
        ])
    ];
    
    return $success;
};
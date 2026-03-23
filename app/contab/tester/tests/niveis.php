<?php

use Twig\Environment;
use function contab\tester\get_value_for_test;
use function contab\tester\store\niveis_contas_contabeis;
use function contab\tester\store\saldo_invertido_excecoes;
use function contab\tester\test_name;
use function support\db\db;

return function(int $remessa, string $entidade, Environment $templates, array &$result): bool {
    
    $name = 'Correspondência de saldos entre os níveis das contas orçamentárias e de controle';
    $testId = test_name(__FILE__);
    $success = true;
    
    $pcasp = niveis_contas_contabeis();
    $lista = [];//lista com as contas contábeis
    // prepara as contas esquerdas e direitas e seus filtros
    foreach ($pcasp as $cc){
        $cc_e = $cc;
        switch ((int) $cc[0]){
            case 5:
                $cc[0] = '6';
                $cc_d = $cc;
                break;
            case 7:
                $cc[0] = '8';
                $cc_d = $cc;
                break;
        }
        
        //prepara os filtros
        $filter_e = $cc_e;
        $i = strlen($filter_e);
        while($i >= 0){
            if($filter_e[$i-1] !== '0' && $filter_e[$i-1] !== '.'){
                break;
            }
            --$i;
            $filter_e = substr($filter_e, 0, $i);
        }
        
        $filter_d = $cc_d;
        $i = strlen($filter_d);
        while($i >= 0){
            if($filter_d[$i-1] !== '0' && $filter_d[$i-1] !== '.'){
                break;
            }
            --$i;
            $filter_d = substr($filter_d, 0, $i);
        }
        $lista[] = [
            'cc_e' => $cc_e,
            'filtro_e' => $filter_e,
            'cc_d' => $cc_d,
            'filtro_d' => $filter_d,
        ];
    }
    
    $resultado = [];
    
    foreach ($lista as $item){
        // busca os saldos finais
        $sql = <<<SQL
                select
                    sum(saldo_final)
                from bal_ver
                where
                    remessa = $remessa
                    and entidade like '$entidade'
                    and conta_contabil like '{$item['filtro_e']}%';
        SQL;
        $saldo_final_e = get_value_for_test($sql);
        
        $sql = <<<SQL
                select
                    sum(saldo_final)
                from bal_ver
                where
                    remessa = $remessa
                    and entidade like '$entidade'
                    and conta_contabil like '{$item['filtro_d']}%';
        SQL;
        $saldo_final_d = get_value_for_test($sql);
                
        if(round($saldo_final_e, 2) !== round($saldo_final_d, 2)) $success = false;
        
        $resultado[] = [
            'conta_contabil_e' => $item['cc_e'],
            'saldo_final_e' => $saldo_final_e,
            'conta_contabil_d' => $item['cc_d'],
            'saldo_final_d' => $saldo_final_d,
            'diferenca' => round($saldo_final_e - $saldo_final_d, 2)
        ];
    }
    
    
    $result[$testId] = [
        'name' => $name,
        'success' => $success,
        'html' => $templates->render('niveis.twig', [
            'testId' => $testId,
            'testTitle' => $name,
            'testSuccess' => $success,
            'contas' => $resultado,
        ])
    ];
    
    return $success;
};
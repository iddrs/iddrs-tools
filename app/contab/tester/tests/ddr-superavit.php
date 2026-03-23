<?php

use Twig\Environment;
use function contab\tester\get_value_for_test;
use function contab\tester\store\niveis_contas_contabeis;
use function contab\tester\store\saldo_invertido_excecoes;
use function contab\tester\test_name;
use function support\db\db;

return function(int $remessa, string $entidade, Environment $templates, array &$result): bool {
    
    $name = 'DDR de exercícios anteriores / superávit financeiro disponível para créditos';
    $testId = test_name(__FILE__);
    $success = true;
    $resultado = [];
    
    
    $sql = <<<SQL
            select distinct
                fr
            from bal_ver
            where
                remessa = $remessa
                and entidade like '$entidade'
                and conta_contabil like '8.2.1.1.1.02.%'
            order by fr asc
    SQL;
    $stmt = db()->query($sql);
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $item){
        $fr = $item['fr'];
        $sql = <<<SQL
                select
                    sum(saldo_inicial)
                from bal_ver
                where
                    remessa = $remessa
                    and entidade like '$entidade'
                    and conta_contabil like '8.2.1.1.1.02.%'
                    and fr = $fr
        SQL;
        $saldo_inicial = get_value_for_test($sql);
        
        $sql = <<<SQL
                select
                    sum(saldo_final)
                from bal_ver
                where
                    remessa = $remessa
                    and entidade like '$entidade'
                    and (conta_contabil like '6.3.1.9.%'
                        or conta_contabil like '6.3.2.9.%')
                    and fr = $fr
        SQL;
        $rp_cancelado = get_value_for_test($sql);
        
        $sql = <<<SQL
                select
                    sum(valor_credito)
                from creditos
                where
                    remessa = $remessa
                    and entidade like '$entidade'
                    and cd_origem_recurso = 1
                    and fr_credito = $fr
        SQL;
        $creditos = get_value_for_test($sql);
        
        $saldo_disponivel = round($saldo_inicial + $rp_cancelado - $creditos, 2);
        
        $sql = <<<SQL
                select
                    sum(saldo_inicial)
                from bal_ver
                where
                    remessa = $remessa
                    and entidade like '$entidade'
                    and conta_contabil like '8.2.1.1.1.02.%'
                    and fr = $fr
        SQL;
        $saldo_final = get_value_for_test($sql);
                
        if(round($saldo_disponivel, 2) !== round($saldo_final, 2)) $success = false;
        
        $resultado[] = [
            'fr' => $fr,
            'saldo_inicial' => $saldo_inicial,
            'rp_cancelado' => $rp_cancelado,
            'creditos' => $creditos,
            'saldo_disponivel' => $saldo_disponivel,
            'saldo_final' => $saldo_final,
            'diferenca' => round($saldo_disponivel - $saldo_final, 2)
        ];
    }
    
    
    $result[$testId] = [
        'name' => $name,
        'success' => $success,
        'html' => $templates->render('ddr-superavit.twig', [
            'testId' => $testId,
            'testTitle' => $name,
            'testSuccess' => $success,
            'resultado' => $resultado,
        ])
    ];
    
    return $success;
};
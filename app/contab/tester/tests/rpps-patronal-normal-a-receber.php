<?php

use Twig\Environment;
use function contab\tester\get_value_for_test;
use function contab\tester\test_name;

return function(int $remessa, string $entidade, Environment $templates, array &$result): bool {
    
    $name = 'Contribuição patronal ao RPPS a receber';
    $testId = test_name(__FILE__);
    $success = false;
    
    $etotal = 0.0;
    $dtotal = 0.0;
    
    $sql = <<<SQL
        select sum(saldo_final)
        from bal_ver 
        where remessa = $remessa and entidade like 'fpsm' 
            and conta_contabil like '1.1.3.6.2.01.01.%';
    SQL;
    $valor = get_value_for_test($sql);
    $etotal += $valor;
    $esquerdo[$sql] = $valor;
    
    
    
    $sql = <<<SQL
        select sum(valor_liquidacao)
        from liquidacao
        where remessa = $remessa
            and (
                cd_rubrica like '3.1.91.13.08%'
                or cd_rubrica like '3.1.91.13.10.01%'
                or cd_rubrica like '3.1.91.13.10.02%'
            )
    SQL;
    $valor = get_value_for_test($sql);
    $dtotal += $valor;
    $direito[$sql] = $valor;
    
    $sql = <<<SQL
        select sum(valor_pagamento)*-1
        from pagamento
        where remessa = $remessa
            and (
                cd_rubrica like '3.1.91.13.08%'
                or cd_rubrica like '3.1.91.13.10.01%'
                or cd_rubrica like '3.1.91.13.10.02%'
            )
    SQL;
    $valor = get_value_for_test($sql);
    $dtotal += $valor;
    $direito[$sql] = $valor;
    
    
    if(round($etotal, 2) === round($dtotal, 2)) $success = true;
    
    $result[$testId] = [
        'name' => $name,
        'success' => $success,
        'html' => $templates->render('esquerdo-direito.twig', [
            'testId' => $testId,
            'testTitle' => $name,
            'testSuccess' => $success,
            'esquerdo' => $esquerdo,
            'direito' => $direito,
        ])
    ];
    
    return $success;
};
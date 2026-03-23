<?php

use Twig\Environment;
use function contab\tester\get_value_for_test;
use function contab\tester\test_name;

return function(int $remessa, string $entidade, Environment $templates, array &$result): bool {
    
    $name = 'Restos a pagar não processados cancelados';
    $testId = test_name(__FILE__);
    $success = false;
    
    $etotal = 0.0;
    $dtotal = 0.0;
    
    
    $valor = \contab\tester\get_valor_manual($entidade, $remessa, 'rp_np_cancelado');
    $etotal += $valor;
    $esquerdo['RP não processados cancelados'] = $valor;
    
    
    
    $sql = <<<SQL
        select sum(saldo_final) 
        from bal_ver 
        where remessa = $remessa and entidade like '$entidade' 
            and conta_contabil like '6.3.1.9.%';
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
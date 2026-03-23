<?php

use Twig\Environment;
use function contab\tester\get_value_for_test;
use function contab\tester\test_name;

return function(int $remessa, string $entidade, Environment $templates, array &$result): bool {
    
    $name = 'Crédito orçamentário disponível';
    $testId = test_name(__FILE__);
    $success = false;
    
    $etotal = 0.0;
    $dtotal = 0.0;
    
    $sql = <<<SQL
        select sum(saldo_final)
        from bal_ver 
        where remessa = $remessa and entidade like '$entidade' 
            and conta_contabil like '6.2.2.1.1.%';
    SQL;
    $valor = get_value_for_test($sql);
    $etotal += $valor;
    $esquerdo[$sql] = $valor;
    
    $exercicio = substr($remessa, 0, 4);
    $sql = <<<SQL
        select sum(a_empenhar) 
        from bal_desp
        where remessa = $remessa and entidade like '$entidade'
            
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
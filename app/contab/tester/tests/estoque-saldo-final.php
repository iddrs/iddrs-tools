<?php

use Twig\Environment;
use function contab\tester\get_value_for_test;
use function contab\tester\test_name;

return function(int $remessa, string $entidade, Environment $templates, array &$result): bool {
    
    $name = 'Estoques x saldo final do Almox';
    $testId = test_name(__FILE__);
    $success = false;
    
    $etotal = 0.0;
    $dtotal = 0.0;
    
    $valor = \contab\tester\get_valor_manual($entidade, $remessa, 'estoque_saldo_final');
    $etotal += $valor;
    $esquerdo['Saldo final do Almox'] = $valor;
    
    
    
    $sql = <<<SQL
        select sum(saldo_final) 
        from bal_ver 
        where remessa = $remessa and entidade like '$entidade' 
            and conta_contabil like '1.1.5.%';
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
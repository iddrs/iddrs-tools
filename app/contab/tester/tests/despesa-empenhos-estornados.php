<?php

use Twig\Environment;
use function contab\tester\get_value_for_test;
use function contab\tester\test_name;

return function(int $remessa, string $entidade, Environment $templates, array &$result): bool {
    
    $name = 'Valor dos empenhos estornados';
    $testId = test_name(__FILE__);
    $success = false;
    
    $etotal = 0.0;
    $dtotal = 0.0;
    
    $sql = <<<SQL
        select sum(saldo_final)
        from bal_ver 
        where remessa = $remessa and entidade like '$entidade' 
            and conta_contabil like '5.2.2.9.2.01.03.%';
    SQL;
    $valor = get_value_for_test($sql);
    $etotal += $valor;
    $esquerdo[$sql] = $valor;
    
    $exercicio = substr($remessa, 0, 4);
    $sql = <<<SQL
        select sum(valor_empenho) 
        from empenho
        where remessa = $remessa and entidade like '$entidade'
            and ano_empenho = $exercicio
            and valor_empenho < 0.0
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
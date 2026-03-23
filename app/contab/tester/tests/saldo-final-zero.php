<?php

use Twig\Environment;
use function contab\tester\get_value_for_test;
use function contab\tester\test_name;

return function(int $remessa, string $entidade, Environment $templates, array &$result): bool {
    
    $name = 'Contas que o saldo final deve ser Zero';
    $testId = test_name(__FILE__);
    $success = true;
    
    $lista_cc = [
        '1.1.3.1.1.01.01.',
        '1.1.3.1.1.01.04.',
        '1.1.3.1.1.01.99.',
        '1.1.9.2.1.01.',
        '2.1.1.1.1.01.02.02.',
        '2.1.1.1.1.01.03.02.',
        '2.1.1.2.1.01.02.',
        '2.3.7.1.1.01.',
        '2.3.7.1.2.01.',
        '2.3.7.1.3.01.',
        '2.3.7.1.4.01.',
        '2.3.7.1.5.01.',
        '5.3.1.7.',
        '5.3.2.7.',
        '6.3.1.7.1.',
        '6.3.2.7.',
    ];
    
    $resultado = [];
    
    foreach ($lista_cc as $cc){
        $sql = <<<SQL
            select sum(saldo_final)
            from bal_ver 
            where remessa = $remessa and entidade like '$entidade' 
                and conta_contabil like '$cc%';
        SQL;
        $valor = get_value_for_test($sql);
        $resultado[$cc] = $valor;
        if($valor !== 0.0) $success = false;
    }
    
    $result[$testId] = [
        'name' => $name,
        'success' => $success,
        'html' => $templates->render('saldo-zero.twig', [
            'testId' => $testId,
            'testTitle' => $name,
            'testSuccess' => $success,
            'contas' => $resultado,
        ])
    ];
    
    return $success;
};
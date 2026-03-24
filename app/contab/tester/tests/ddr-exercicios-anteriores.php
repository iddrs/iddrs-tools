<?php

use Twig\Environment;
use function contab\tester\get_value_for_test;
use function contab\tester\test_name;

return function(int $remessa, string $entidade, Environment $templates, array &$result): bool {
    
    $name = 'DDR de exercícios anteriores';
    $testId = test_name(__FILE__);
    $success = false;
    
    $etotal = 0.0;
    $dtotal = 0.0;
    
    $sql = <<<SQL
        select sum(saldo_final)
        from bal_ver 
        where remessa = $remessa and entidade like '$entidade' 
            and conta_contabil like '8.2.1.1.1.02.%';
    SQL;
    $valor = get_value_for_test($sql);
    $etotal += $valor;
    $esquerdo[$sql] = $valor;
    
    
    $sql = <<<SQL
        select sum(saldo_inicial)
        from bal_ver 
        where remessa = $remessa and entidade like '$entidade' 
            and conta_contabil like '1.%'
            and financeiro_permanente like 'F'
    SQL;
    $valor = get_value_for_test($sql);
    $dtotal += $valor;
    $direito[$sql] = $valor;
    
    $sql = <<<SQL
        select sum(saldo_inicial) *-1
        from bal_ver 
        where remessa = $remessa and entidade like '$entidade' 
            and conta_contabil like '2.1.%'
            and financeiro_permanente like 'F'
    SQL;
    $valor = get_value_for_test($sql);
    $dtotal += $valor;
    $direito[$sql] = $valor;
    
    $sql = <<<SQL
        select sum(saldo_inicial) *-1
        from bal_ver 
        where remessa = $remessa and entidade like '$entidade' 
            and conta_contabil like '2.2.%'
            and financeiro_permanente like 'F'
    SQL;
    $valor = get_value_for_test($sql);
    $dtotal += $valor;
    $direito[$sql] = $valor;
    
    $sql = <<<SQL
        select sum(saldo_inicial)*-1
        from bal_ver
        where remessa = $remessa and entidade like '$entidade'
            and conta_contabil like '6.3.1.1.%'
    SQL;
    $valor = get_value_for_test($sql);
    $dtotal += $valor;
    $direito[$sql] = $valor;
    
    $sql = <<<SQL
        select sum(saldo_inicial)*-1
        from bal_ver
        where remessa = $remessa and entidade like '$entidade'
            and conta_contabil like '6.2.2.1.3.01.%'
    SQL;
    $valor = get_value_for_test($sql);
    $dtotal += $valor;
    $direito[$sql] = $valor;
    
    $sql = <<<SQL
        select sum(saldo_inicial)*-1
        from bal_ver
        where remessa = $remessa and entidade like '$entidade'
            and conta_contabil like '6.3.1.7.%'
    SQL;
    $valor = get_value_for_test($sql);
    $dtotal += $valor;
    $direito[$sql] = $valor;
    
    $sql = <<<SQL
        select sum(saldo_final)
        from bal_ver
        where remessa = $remessa and entidade like '$entidade'
            and conta_contabil like '6.3.1.9.%'
    SQL;
    $valor = get_value_for_test($sql);
    $dtotal += $valor;
    $direito[$sql] = $valor;
    
    $sql = <<<SQL
        select sum(saldo_final)
        from bal_ver
        where remessa = $remessa and entidade like '$entidade'
            and conta_contabil like '6.3.2.9.%'
    SQL;
    $valor = get_value_for_test($sql);
    $dtotal += $valor;
    $direito[$sql] = $valor;
    
    $sql = <<<SQL
        select sum(saldo_final) *-1
        from bal_ver
        where remessa = $remessa and entidade like '$entidade'
            and conta_contabil like '5.2.2.1.3.01.%'
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
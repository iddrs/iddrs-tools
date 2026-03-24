<?php

use Twig\Environment;
use function contab\tester\get_value_for_test;
use function contab\tester\test_name;

return function(int $remessa, string $entidade, Environment $templates, array &$result): bool {
    
    $name = 'PAD: BAL_DESP.txt';
    $testId = test_name(__FILE__);
    $success = true;
    
    $resultado = [];

    $cc = 'dotacao_inicial';
    $resultado[$cc]['label'] = 'Dotação inicial';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(dotacao_fixada) 
        from bal_desp
        where remessa = $remessa and entidade like '$entidade'
    SQL;
    $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
    $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
    if($resultado[$cc]['diferenca'] !== 0.0) $success = false;

    $cc = 'dotacao_atualizada';
    $resultado[$cc]['label'] = 'Dotação atualizada';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(dotacao_atualizada) 
        from bal_desp
        where remessa = $remessa and entidade like '$entidade'
    SQL;
    $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
    $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
    if($resultado[$cc]['diferenca'] !== 0.0) $success = false;

    $cc = 'empenhado';
    $resultado[$cc]['label'] = 'Empenhado';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(empenhado) 
        from bal_desp
        where remessa = $remessa and entidade like '$entidade'
    SQL;
    $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
    $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
    if($resultado[$cc]['diferenca'] !== 0.0) $success = false;

    $cc = 'liquidado';
    $resultado[$cc]['label'] = 'Liquidado';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(liquidado) 
        from bal_desp
        where remessa = $remessa and entidade like '$entidade'
    SQL;
    $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
    $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
    if($resultado[$cc]['diferenca'] !== 0.0) $success = false;

    $cc = 'pago';
    $resultado[$cc]['label'] = 'Pago';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(pago) 
        from bal_desp
        where remessa = $remessa and entidade like '$entidade'
    SQL;
    $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
    $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
    if($resultado[$cc]['diferenca'] !== 0.0) $success = false;

    
    
    $result[$testId] = [
        'name' => $name,
        'success' => $success,
        'html' => $templates->render('pad-manual.twig', [
            'testId' => $testId,
            'testTitle' => $name,
            'testSuccess' => $success,
            'resultado' => $resultado,
        ])
    ];
    
    return $success;
};
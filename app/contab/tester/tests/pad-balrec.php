<?php

use Twig\Environment;
use function contab\tester\get_value_for_test;
use function contab\tester\test_name;

return function(int $remessa, string $entidade, Environment $templates, array &$result): bool {
    
    $name = 'PAD: BAL_REC.txt';
    $testId = test_name(__FILE__);
    $success = true;
    
    $resultado = [];

    $cc = 'receita_previsao_inicial_liquida';
    $resultado[$cc]['label'] = 'Previsão inicial da receita líquida';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(receita_orcada) 
        from bal_rec
        where remessa = $remessa and entidade like '$entidade'
    SQL;
    $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
    $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
    if($resultado[$cc]['diferenca'] !== 0.0) $success = false;

    $cc = 'receita_previsao_atualizada_liquida';
    $resultado[$cc]['label'] = 'Previsão atualizada da receita líquida';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(previsao_atualizada_receita) 
        from bal_rec
        where remessa = $remessa and entidade like '$entidade'
    SQL;
    $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
    $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
    if($resultado[$cc]['diferenca'] !== 0.0) $success = false;

    $cc = 'receita_arrecadada_liquida';
    $resultado[$cc]['label'] = 'Receita arrecadada líquida';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(receita_realizada) 
        from bal_rec
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
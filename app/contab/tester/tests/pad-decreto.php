<?php

use Twig\Environment;
use function contab\tester\get_value_for_test;
use function contab\tester\test_name;

return function(int $remessa, string $entidade, Environment $templates, array &$result): bool {
    
    $name = 'PAD: DECRETO.txt';
    $testId = test_name(__FILE__);
    $success = true;
    
    $resultado = [];
    
    $cc = 'credito_suplementar';
    $resultado[$cc]['label'] = 'Crédito suplementar';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(valor_credito) 
        from creditos
        where remessa = $remessa and entidade like '$entidade'
            and tp_credito = 1
    SQL;
    $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
    $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
    if($resultado[$cc]['diferenca'] !== 0.0) $success = false;
    
    $cc = 'credito_especial';
    $resultado[$cc]['label'] = 'Crédito especial';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(valor_credito) 
        from creditos
        where remessa = $remessa and entidade like '$entidade'
            and tp_credito = 2
    SQL;
    $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
    $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
    if($resultado[$cc]['diferenca'] !== 0.0) $success = false;
    
    $cc = 'credito_extraordinario';
    $resultado[$cc]['label'] = 'Crédito extraordinário';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(valor_credito) 
        from creditos
        where remessa = $remessa and entidade like '$entidade'
            and tp_credito = 3
    SQL;
    $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
    $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
    if($resultado[$cc]['diferenca'] !== 0.0) $success = false;
    
    $cc = 'reabertura';
    $resultado[$cc]['label'] = 'Reabertura';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(valor_saldo_reaberto) 
        from creditos
        where remessa = $remessa and entidade like '$entidade'
            and valor_saldo_reaberto > 0.0
    SQL;
    $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
    $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
    if($resultado[$cc]['diferenca'] !== 0.0) $success = false;
    
    $cc = 'credito_superavit';
    $resultado[$cc]['label'] = 'Crédito por superávit';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(valor_credito) 
        from creditos
        where remessa = $remessa and entidade like '$entidade'
            and cd_origem_recurso = 1
    SQL;
    $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
    $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
    if($resultado[$cc]['diferenca'] !== 0.0) $success = false;
    
    $cc = 'credito_excesso';
    $resultado[$cc]['label'] = 'Crédito por excesso de arrecadação';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(valor_credito) 
        from creditos
        where remessa = $remessa and entidade like '$entidade'
            and cd_origem_recurso = 2
    SQL;
    $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
    $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
    if($resultado[$cc]['diferenca'] !== 0.0) $success = false;
    
    $cc = 'credito_reducao_na_entidade';
    $resultado[$cc]['label'] = 'Crédito por redução na mesma entidade';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(valor_credito) 
        from creditos
        where remessa = $remessa and entidade like '$entidade'
            and cd_origem_recurso = 5
    SQL;
    $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
    $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
    if($resultado[$cc]['diferenca'] !== 0.0) $success = false;
    
    $cc = 'credito_reducao_entre_entidades';
    $resultado[$cc]['label'] = 'Crédito por redução entre entidades';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(valor_credito) 
        from creditos
        where remessa = $remessa and entidade like '$entidade'
            and cd_origem_recurso = 6
    SQL;
    $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
    $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
    if($resultado[$cc]['diferenca'] !== 0.0) $success = false;
    
    $cc = 'credito_reducao_na_entidade';
    $resultado[$cc]['label'] = 'Dotação cancelada';
    $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, $cc);
    $sql = <<<SQL
        select sum(valor_reducao) 
        from creditos
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
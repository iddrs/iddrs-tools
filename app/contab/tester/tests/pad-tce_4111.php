<?php

use Twig\Environment;
use function contab\tester\get_value_for_test;
use function contab\tester\test_name;

return function(int $remessa, string $entidade, Environment $templates, array &$result): bool {
    
    $name = 'PAD: TCE_4111.txt';
    $testId = test_name(__FILE__);
    $success = true;
    
    $itens = [
        'ativo' => 'Ativo',
        'passivo' => 'Passivo',
        'vpd' => 'VPD',
        'vpa' => 'VPA',
        'capo' => 'CAPO',
        'cepo' => 'CEPO',
        'controles_devedores' => 'Controles devedores',
        'controles_credores' => 'Controles credores',
    ];    
    $cc = 0;
    $resultado = [];
    foreach ($itens as $k => $v){
        $cc++;
        
        $resultado[$cc]['label'] = "$v débitos";
        $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, "{$k}_debitos");
        $sql = <<<SQL
            select sum(valor_lancamento) 
            from lancont
            where remessa = $remessa and entidade like '$entidade' 
                and conta_contabil like '$cc.%'
                and tp_lancamento like 'D'
        SQL;
        $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
        $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
        if($resultado[$cc]['diferenca'] !== 0.0) $success = false;
        
        $resultado[$cc]['label'] = "$v créditos";
        $resultado[$cc]['valor_manual'] = \contab\tester\get_valor_manual($entidade, $remessa, "{$k}_creditos");
        $sql = <<<SQL
            select sum(valor_lancamento) 
            from lancont
            where remessa = $remessa and entidade like '$entidade' 
                and conta_contabil like '$cc.%'
                and tp_lancamento like 'C'
        SQL;
        $resultado[$cc]['valor_pad'] = get_value_for_test($sql);
        $resultado[$cc]['diferenca'] = round($resultado[$cc]['valor_manual'] - $resultado[$cc]['valor_pad'], 2);
        if($resultado[$cc]['diferenca'] !== 0.0) $success = false;
        
        
    }
    
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
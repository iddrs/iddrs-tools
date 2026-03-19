<?php

namespace contab\tester\profile;

function mensal(): array {
    return [
        'title' => 'Testes de consistência contábil mensal',
        'tests' => [
            'fechamento-contas-patrimoniais',
            'fechamento-contas-orcamentarias',
            'fechamento-contas-controle',
            'saldos-invertidos',
        ]
    ];
}

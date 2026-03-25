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
            'niveis',
            'patrimonio-saldo-final',
            'saldo-final-zero',
            'suprimento-fundos-ativo-controle',
            'estoque-saldo-final',
            'parcerias-convenios-ativo-controle',
            'outros-congeneres-ativo-controle',
            'precatorios-cp-passivo-controle',
            'precatorios-lp-passivo-controle',
            'rpps-patronal-a-pagar',
            'rgps-patronal-a-pagar',
            'rgps-patronal-autonomos-a-pagar',
            'fgts-a-pagar',
            'ipergs-patronal-a-pagar',
            'rp-p-a-passivo-pagar',
            'pasep-a-pagar',
            'diarias-a-pagar',
            'receita-previsao-inicial-bruta',
            'receita-previsao-inicial-deducao-fundeb',
            'receita-previsao-inicial-deducao-renuncia',
            'receita-previsao-inicial-deducao-outras',
            'receita-reestimativa',
            'despesa-credito-inicial',
            'despesa-credito-suplementar',
            'despesa-credito-especial-aberto',
            'despesa-credito-especial-reaberto',
            'despesa-credito-extraordinario-aberto',
            'despesa-credito-extraordinario-reaberto',
            'despesa-credito-superavit',
            'despesa-credito-excesso',
            'despesa-credito-reducao',
            'despesa-credito-reabertura',
            'despesa-credito-valor-global-dotacao',
            'despesa-reducao-dotacao',
            'despesa-empenhos-emitidos',
            'despesa-empenhos-estornados',
            'rp-np-inscritos',
            'rp-np-inscritos-ant',
            'rp-p-inscritos',
            'rp-p-inscritos-ant',
            'receita-a-realizar',
            'receita-realizada',
            'receita-deducao-fundeb-realizada',
            'receita-deducao-renuncia-realizada',
            'receita-deducao-outras-realizada',
            'despesa-credito-disponivel',
            'despesa-credito-empenhado-a-liquidar',
            'despesa-credito-liquidado-a-pagar',
            'despesa-credito-pago',
            'despesa-empenhado-a-liquidar',
            'despesa-liquidado-a-pagar',
            'despesa-pago',
            'rp-np-a-liquidar',
            'rp-np-liquidado-a-pagar',
            'rp-np-pago',
            'rp-np-cancelado',
            'rp-p-a-pagar',
            'rp-p-pago',
            'rp-p-cancelado',
            'ddr-disponivel',
            'ddr-empenhada',
            'ddr-liquidada',
            'ddr-retencoes',
//            'ddr-superavit',// Este teste só funciona se as contas 6.3.1.9 e 6.3.2.9 tiverem a informação da FR correta
            'ddr-exercicios-anteriores',
            'duodecimo-dotacao',
        ]
    ];
}

function pad(): array {
    return [
        'title' => 'Testes de consistência dos *.TXT do PAD',
        'tests' => [
            'pad-balver',
            'pad-balrec',
            'pad-baldesp',
            'pad-decreto',
            'pad-tce_4111',
        ],
    ];
}

function agregado(): array {
    return [
        'title' => 'Testes de consistência contábil agregados (independentes de entidade)',
        'tests' => [
            'ativo-passivo-intra',
            'vpd-vpa-intra',
            'receita-despesa-intra',
            'aporte-atuarial-a-pagar',
            'rpps-servidores-a-receber',
            'rpps-patronal-normal-a-receber',
            'rpps-amortizacao-deficit-a-receber',
        ],
    ];
}
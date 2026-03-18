<?php

namespace pad\converter\layout;

function orgao(): array {
    return [
        'orgao',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\exercicio(1, 4),
            \pad\converter\field\cd_orgao(5, 2),
            \pad\converter\field\nm_orgao(7, 80),
        ],
        []
    ];
}

function uniorcam(): array {
    return [
        'uniorcam',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\exercicio(1, 4),
            \pad\converter\field\cd_orgao(5, 2),
            \pad\converter\field\nm_orgao(0, 0),
            \pad\converter\field\cd_uniorcam(5, 4),
            \pad\converter\field\nm_uniorcam(9, 80),
            \pad\converter\field\cd_identificador_uniorcam(89, 2),
            \pad\converter\field\ds_identificador_uniorcam(0, 0),
            \pad\converter\field\cnpj(91, 14)
        ],
        [
            'ds_identificador_uniorcam_filler',
        ]
    ];
}

function programa(): array {
    return [
        'programa',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\exercicio(1, 4),
            \pad\converter\field\cd_programa(5, 4),
            \pad\converter\field\nm_programa(9, 80),
        ],
        []
    ];
}

function projativ(): array {
    return [
        'projativ',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\exercicio(1, 4),
            \pad\converter\field\cd_projativ(5, 5),
            \pad\converter\field\nm_projativ(10, 80),
            \pad\converter\field\cd_identificador_projativ(90, 2),
            \pad\converter\field\ds_identificador_projativ(90, 2)
        ],
        [
            'ds_identificador_projativ_filler',
        ]
    ];
}

function rubrica(): array {
    return [
        'rubrica',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\exercicio(1, 4),
            \pad\converter\field\cd_rubrica(5, 15),
            \pad\converter\field\ds_rubrica(20, 110),
            \pad\converter\field\tp_nivel(130, 1),
            \pad\converter\field\nr_nivel(131, 2)
        ],
        []
    ];
}

function recurso(): array {
    return [
        'fontes_recurso',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\exercicio_fr(1, 1),
            \pad\converter\field\ds_exercicio_fr(0, 0),
            \pad\converter\field\fr(2, 3),
            \pad\converter\field\ds_fr(5, 80),
            \pad\converter\field\finalidade_fr(85, 160)
        ],
        ['ds_exercicio_fr_filler'],
    ];
}

function credor(): array {
    return [
        'credor',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\cd_credor(1, 10),
            \pad\converter\field\nm_credor(11, 60),
            \pad\converter\field\cpf_credor(71, 14),
            \pad\converter\field\cnpj_credor(71, 14),
        ],
        [],
    ];
}

function cta_disp(): array {
    return [
        'cta_disp',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\conta_contabil(1, 20),
            \pad\converter\field\nm_conta_contabil(0, 0),
            \pad\converter\field\cd_orgao(21, 2),
            \pad\converter\field\nm_orgao(0, 0),
            \pad\converter\field\cd_uniorcam(21, 4),
            \pad\converter\field\nm_uniorcam(0, 0),
            \pad\converter\field\cd_banco(29, 5),
            \pad\converter\field\cd_agencia(34, 5),
            \pad\converter\field\nr_conta_corrente(39, 20),
            \pad\converter\field\tp_conta_corrente(59, 1),
            \pad\converter\field\ds_tp_conta_corrente(0, 0),
            \pad\converter\field\classificacao_ctadisp(60, 1),
            \pad\converter\field\ds_classificacao_ctadisp(0, 0),
            \pad\converter\field\exercicio_fr(65, 1),
            \pad\converter\field\ds_exercicio_fr(0, 0),
            \pad\converter\field\fr(66, 3),
            \pad\converter\field\ds_fr(0, 0),
            \pad\converter\field\co(69, 4),
            \pad\converter\field\ds_co(0, 0),
            \pad\converter\field\cd_detalhe_tce(73, 4),
            \pad\converter\field\ds_detalhe_tce(0, 0)
        ],
        [
            'ds_exercicio_fr_filler',
            'ds_co_filler',
            'tp_conta_corrente_filler',
            'ds_classificacao_ctadisp_filler',
            'ds_detalhe_tce_filler'
        ],
    ];
}

function empenho(): array {
    return [
        'empenho',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\cd_orgao(1, 2),
            \pad\converter\field\nm_orgao(0, 0),
            \pad\converter\field\cd_uniorcam(1, 4),
            \pad\converter\field\nm_uniorcam(0, 0),
            \pad\converter\field\cd_funcao(5, 2),
            \pad\converter\field\ds_funcao(0, 0),
            \pad\converter\field\cd_subfuncao(7, 3),
            \pad\converter\field\ds_subfuncao(0, 0),
            \pad\converter\field\cd_programa(10, 4),
            \pad\converter\field\nm_programa(0, 0),
            \pad\converter\field\cd_projativ(17, 5),
            \pad\converter\field\nm_projativ(0, 0),
            \pad\converter\field\cd_rubrica(22, 15),
            \pad\converter\field\ds_rubrica(0, 0),
            \pad\converter\field\chave_empenho(45, 13),
            \pad\converter\field\ano_empenho(45, 5),
            \pad\converter\field\nr_empenho(52, 6),
            \pad\converter\field\data_empenho(58, 8),
            \pad\converter\field\valor_empenho(66, 14),
            \pad\converter\field\cd_credor(80, 10),
            \pad\converter\field\cpf_credor(0, 0),
            \pad\converter\field\cnpj_credor(0, 0),
            \pad\converter\field\nm_credor(0, 0),
            \pad\converter\field\cp_despesa(255, 3),
            \pad\converter\field\ds_cp_despesa(0, 0),
            \pad\converter\field\registro_precos(260, 1),
            \pad\converter\field\nr_licitacao(281, 20),
            \pad\converter\field\ano_licitacao(301, 4),
            \pad\converter\field\historico(305, 400),
            \pad\converter\field\cd_forma_contratacao(705, 3),
            \pad\converter\field\ds_forma_contratacao(0, 0),
            \pad\converter\field\cd_base_legal(708, 2),
            \pad\converter\field\ds_base_legal(0, 0),
            \pad\converter\field\cd_despesa_funcionario(710, 1),
            \pad\converter\field\ds_despesa_funcionario(0, 0),
            \pad\converter\field\licitacao_compartilhada(711, 1),
            \pad\converter\field\cnpj(712, 14, id: 'cnpj_orgao_gerenciador'),
            \pad\converter\field\exercicio_fr(730, 1),
            \pad\converter\field\ds_exercicio_fr(0, 0),
            \pad\converter\field\fr(731, 3),
            \pad\converter\field\ds_fr(0, 0),
            \pad\converter\field\co(734, 4),
            \pad\converter\field\ds_co(0, 0),
            \pad\converter\field\cd_detalhe_tce(738, 4),
            \pad\converter\field\ds_detalhe_tce(0, 0),
        ],
        [
            'ds_funcao_filler',
            'ds_subfuncao_filler',
            'ds_cp_despesa_filler',
            'ds_forma_contratacao_filler',
            'ds_base_legal_filler',
            'ds_despesa_funcionario_filler',
            'ds_exercicio_fr_filler',
            'ds_co_filler',
            'ds_detalhe_tce_filler',
        ]
    ];
}

function liquidac(): array {
    return [
        'liquidacao',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\nr_liquidacao(14, 20),
            \pad\converter\field\chave_empenho(1, 13),
            \pad\converter\field\ano_empenho(1, 5),
            \pad\converter\field\nr_empenho(8, 6),
            \pad\converter\field\data_liquidacao(34, 8),
            \pad\converter\field\valor_liquidacao(42, 14),
            \pad\converter\field\historico(251, 400),
            \pad\converter\field\existe_contrato(651, 1),
            \pad\converter\field\nr_contrato_tce(652, 20),
            \pad\converter\field\nr_contrato(672, 20),
            \pad\converter\field\ano_contrato(692, 4),
            \pad\converter\field\existe_nf(696, 1),
            \pad\converter\field\nr_nf(697, 9),
            \pad\converter\field\serie_nf(706, 3),
            \pad\converter\field\cd_tipo_contrato(709, 1),
            \pad\converter\field\ds_tipo_contrato(0, 0),
            \pad\converter\field\cd_orgao(0, 0),
            \pad\converter\field\nm_orgao(0, 0),
            \pad\converter\field\cd_uniorcam(0, 0),
            \pad\converter\field\nm_uniorcam(0, 0),
            \pad\converter\field\cd_funcao(0, 0),
            \pad\converter\field\ds_funcao(0, 0),
            \pad\converter\field\cd_subfuncao(0, 0),
            \pad\converter\field\ds_subfuncao(0, 0),
            \pad\converter\field\cd_programa(0, 0),
            \pad\converter\field\nm_programa(0, 0),
            \pad\converter\field\cd_projativ(0, 0),
            \pad\converter\field\nm_projativ(0, 0),
            \pad\converter\field\cd_rubrica(0, 0),
            \pad\converter\field\ds_rubrica(0, 0),
            \pad\converter\field\cd_credor(0, 0),
            \pad\converter\field\cpf_credor(0, 0),
            \pad\converter\field\cnpj_credor(0, 0),
            \pad\converter\field\nm_credor(0, 0),
            \pad\converter\field\cp_despesa(0, 0),
            \pad\converter\field\ds_cp_despesa(0, 0),
            \pad\converter\field\registro_precos(0, 0),
            \pad\converter\field\nr_licitacao(0, 0),
            \pad\converter\field\ano_licitacao(0, 0),
            \pad\converter\field\cd_forma_contratacao(0, 0),
            \pad\converter\field\ds_forma_contratacao(0, 0),
            \pad\converter\field\cd_base_legal(0, 0),
            \pad\converter\field\ds_base_legal(0, 0),
            \pad\converter\field\cd_despesa_funcionario(0, 0),
            \pad\converter\field\ds_despesa_funcionario(0, 0),
            \pad\converter\field\licitacao_compartilhada(0, 0),
            \pad\converter\field\cnpj(0, 0, id: 'cnpj_orgao_gerenciador'),
            \pad\converter\field\exercicio_fr(0, 0),
            \pad\converter\field\ds_exercicio_fr(0, 0),
            \pad\converter\field\fr(0, 0),
            \pad\converter\field\ds_fr(0, 0),
            \pad\converter\field\co(0, 0),
            \pad\converter\field\ds_co(0, 0),
            \pad\converter\field\cd_detalhe_tce(0, 0),
            \pad\converter\field\ds_detalhe_tce(0, 0),
        ],
        [
            'ds_tipo_contrato_filler'
        ]
    ];
}

function pagament(): array {
    return [
        'pagamento',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\chave_empenho(1, 13),
            \pad\converter\field\ano_empenho(1, 5),
            \pad\converter\field\nr_empenho(8, 6),
            \pad\converter\field\data_pagamento(34, 8),
            \pad\converter\field\valor_pagamento(42, 14),
            \pad\converter\field\conta_contabil(206, 20, id: 'conta_contabil_debito'),
            \pad\converter\field\nm_conta_contabil(0, 0, id: 'nm_conta_contabil_debito'),
            \pad\converter\field\cd_orgao(226, 2, id: 'cd_orgao_debito'),
            \pad\converter\field\nm_orgao(0, 0, id: 'nm_orgao_debito'),
            \pad\converter\field\cd_uniorcam(226, 4, id: 'cd_uniorcam_debito'),
            \pad\converter\field\nm_uniorcam(0, 0, id: 'nm_uniorcam_debito'),
            \pad\converter\field\conta_contabil(230, 20, id: 'conta_contabil_credito'),
            \pad\converter\field\nm_conta_contabil(0, 0, id: 'nm_conta_contabil_credito'),
            \pad\converter\field\cd_orgao(250, 2, id: 'cd_orgao_credito'),
            \pad\converter\field\nm_orgao(0, 0, id: 'nm_orgao_credito'),
            \pad\converter\field\cd_uniorcam(250, 4, id: 'cd_uniorcam_credito'),
            \pad\converter\field\nm_uniorcam(0, 0, id: 'nm_uniorcam_credito'),
            \pad\converter\field\historico(254, 400),
            \pad\converter\field\nr_liquidacao(654, 20),
            \pad\converter\field\cd_orgao(0, 0),
            \pad\converter\field\nm_orgao(0, 0),
            \pad\converter\field\cd_uniorcam(0, 0),
            \pad\converter\field\nm_uniorcam(0, 0),
            \pad\converter\field\cd_funcao(0, 0),
            \pad\converter\field\ds_funcao(0, 0),
            \pad\converter\field\cd_subfuncao(0, 0),
            \pad\converter\field\ds_subfuncao(0, 0),
            \pad\converter\field\cd_programa(0, 0),
            \pad\converter\field\nm_programa(0, 0),
            \pad\converter\field\cd_projativ(0, 0),
            \pad\converter\field\nm_projativ(0, 0),
            \pad\converter\field\cd_rubrica(0, 0),
            \pad\converter\field\ds_rubrica(0, 0),
            \pad\converter\field\cd_credor(0, 0),
            \pad\converter\field\cpf_credor(0, 0),
            \pad\converter\field\cnpj_credor(0, 0),
            \pad\converter\field\nm_credor(0, 0),
            \pad\converter\field\cp_despesa(0, 0),
            \pad\converter\field\ds_cp_despesa(0, 0),
            \pad\converter\field\registro_precos(0, 0),
            \pad\converter\field\nr_licitacao(0, 0),
            \pad\converter\field\ano_licitacao(0, 0),
            \pad\converter\field\cd_forma_contratacao(0, 0),
            \pad\converter\field\ds_forma_contratacao(0, 0),
            \pad\converter\field\cd_base_legal(0, 0),
            \pad\converter\field\ds_base_legal(0, 0),
            \pad\converter\field\cd_despesa_funcionario(0, 0),
            \pad\converter\field\ds_despesa_funcionario(0, 0),
            \pad\converter\field\licitacao_compartilhada(0, 0),
            \pad\converter\field\cnpj(0, 0, id: 'cnpj_orgao_gerenciador'),
            \pad\converter\field\exercicio_fr(0, 0),
            \pad\converter\field\ds_exercicio_fr(0, 0),
            \pad\converter\field\fr(0, 0),
            \pad\converter\field\ds_fr(0, 0),
            \pad\converter\field\co(0, 0),
            \pad\converter\field\ds_co(0, 0),
            \pad\converter\field\cd_detalhe_tce(0, 0),
            \pad\converter\field\ds_detalhe_tce(0, 0),
        ],
        []
    ];
}

function bal_ver(): array {
    return [
        'bal_ver',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\conta_contabil(1, 20),
            \pad\converter\field\cd_orgao(21, 2),
            \pad\converter\field\nm_orgao(0, 0),
            \pad\converter\field\cd_uniorcam(21, 4),
            \pad\converter\field\nm_uniorcam(0, 0),
            ['saldo_anterior_devedor', 25, 13, '', ['valor']],
            ['saldo_anterior_credor', 38, 13, '', ['valor']],
            ['saldo_atual_devedor', 77, 13, '', ['valor']],
            ['saldo_atual_credor', 90, 13, '', ['valor']],
            ['saldo_inicial', 0, 0, 'REAL', []],
            ['natureza_saldo_inicial', 0, 0, 'TEXT', []],
            \pad\converter\field\movimento_devedor(51, 13),
            \pad\converter\field\movimento_credor(64, 13),
            ['saldo_final', 0, 0, 'REAL', []],
            ['natureza_saldo_final', 0, 0, 'TEXT', []],
            \pad\converter\field\nm_conta_contabil(103, 148),
            \pad\converter\field\tp_nivel(251, 1),
            \pad\converter\field\nr_nivel(252, 2),
            \pad\converter\field\escrituravel(255, 1),
            \pad\converter\field\natureza_informacao(256, 1),
            \pad\converter\field\ds_natureza_informacao(0, 0),
            \pad\converter\field\financeiro_permanente(257, 1),
            \pad\converter\field\ds_financeiro_permanente(0, 0),
            \pad\converter\field\exercicio_fr(266, 1),
            \pad\converter\field\ds_exercicio_fr(0, 0),
            \pad\converter\field\fr(267, 3),
            \pad\converter\field\ds_fr(0, 0),
            \pad\converter\field\co(270, 4),
            \pad\converter\field\ds_co(0, 0),
            \pad\converter\field\cd_detalhe_tce(274, 4),
            \pad\converter\field\ds_detalhe_tce(0, 0)
        ],
        [
            'saldos_contabeis',
            'ds_natureza_informacao_filler',
            'ds_financeiro_permanente_filler',
            'ds_exercicio_fr_filler',
            'ds_co_filler',
            'ds_detalhe_tce_filler',
        ]
    ];
}

function bal_rec(): array {
    return [
        'bal_rec',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\nro(1, 20),
            \pad\converter\field\cd_receita(1, 20),
            \pad\converter\field\ds_receita(55, 170),
            \pad\converter\field\classe_receita(0, 0),
            \pad\converter\field\tp_receita(0, 0),
            \pad\converter\field\ds_tp_receita(0, 0,),
            \pad\converter\field\cd_orgao(21, 2),
            \pad\converter\field\nm_orgao(0, 0),
            \pad\converter\field\cd_uniorcam(21, 4),
            \pad\converter\field\nm_uniorcam(0, 0),
            \pad\converter\field\receita_orcada(25, 13),
            \pad\converter\field\previsao_atualizada_receita(231, 13),
            \pad\converter\field\receita_realizada(38, 13),
            \pad\converter\field\a_arrecadar(0, 0),
            \pad\converter\field\tp_nivel(225, 1),
            \pad\converter\field\nr_nivel(226, 2),
            \pad\converter\field\cd_deducao(228, 3),
            \pad\converter\field\ds_deducao(0, 0),
            \pad\converter\field\exercicio_fr(248, 1),
            \pad\converter\field\ds_exercicio_fr(0, 0),
            \pad\converter\field\fr(249, 3),
            \pad\converter\field\ds_fr(0, 0),
            \pad\converter\field\co(252, 4),
            \pad\converter\field\ds_co(0, 0),
            \pad\converter\field\cd_detalhe_tce(256, 4),
            \pad\converter\field\ds_detalhe_tce(0, 0),
        ],
        [
            'ds_exercicio_fr_filler',
            'ds_deducao_filler',
            'ds_co_filler',
            'ds_detalhe_tce_filler',
            'calc_a_arrecadar_filler',
            'classe_receita_filler',
            'tp_receita_filler',
            'ds_tp_receita_filler',
        ]
    ];
}

function receita(): array {
    return [
        'receita',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\nro(1, 20),
            \pad\converter\field\cd_receita(1, 20),
            \pad\converter\field\ds_receita(0, 0),
            \pad\converter\field\classe_receita(0, 0),
            \pad\converter\field\tp_receita(0, 0),
            \pad\converter\field\ds_tp_receita(0, 0,),
            \pad\converter\field\cd_orgao(21, 2),
            \pad\converter\field\nm_orgao(0, 0),
            \pad\converter\field\cd_uniorcam(21, 4),
            \pad\converter\field\nm_uniorcam(0, 0),
            \pad\converter\field\tp_nivel(0, 0),
            \pad\converter\field\cd_deducao(253, 3),
            \pad\converter\field\ds_deducao(0, 0),
            \pad\converter\field\exercicio_fr(264, 1),
            \pad\converter\field\ds_exercicio_fr(0, 0),
            \pad\converter\field\fr(265, 3),
            \pad\converter\field\ds_fr(0, 0),
            \pad\converter\field\co(268, 4),
            \pad\converter\field\ds_co(0, 0),
            \pad\converter\field\cd_detalhe_tce(272, 4),
            \pad\converter\field\ds_detalhe_tce(0, 0),
            \pad\converter\field\receita_realizada(25, 13, id: 'realizada_jan'),
            \pad\converter\field\receita_realizada(38, 13, id: 'realizada_fev'),
            \pad\converter\field\receita_realizada(51, 13, id: 'realizada_mar'),
            \pad\converter\field\receita_realizada(64, 13, id: 'realizada_abr'),
            \pad\converter\field\receita_realizada(77, 13, id: 'realizada_mai'),
            \pad\converter\field\receita_realizada(90, 13, id: 'realizada_jun'),
            \pad\converter\field\receita_realizada(103, 13, id: 'realizada_jul'),
            \pad\converter\field\receita_realizada(116, 13, id: 'realizada_ago'),
            \pad\converter\field\receita_realizada(129, 13, id: 'realizada_set'),
            \pad\converter\field\receita_realizada(142, 13, id: 'realizada_out'),
            \pad\converter\field\receita_realizada(155, 13, id: 'realizada_nov'),
            \pad\converter\field\receita_realizada(168, 13, id: 'realizada_dez'),
            \pad\converter\field\receita_realizada(0, 0, id: 'arrecadado'),
            \pad\converter\field\receita_orcada(181, 12, id: 'meta_1bim'),
            \pad\converter\field\receita_orcada(193, 12, id: 'meta_2bim'),
            \pad\converter\field\receita_orcada(205, 12, id: 'meta_3bim'),
            \pad\converter\field\receita_orcada(217, 12, id: 'meta_4bim'),
            \pad\converter\field\receita_orcada(229, 12, id: 'meta_5bim'),
            \pad\converter\field\receita_orcada(241, 12, id: 'meta_6bim'),
            \pad\converter\field\receita_orcada(0, 0, id: 'meta_jan'),
            \pad\converter\field\receita_orcada(0, 0, id: 'meta_fev'),
            \pad\converter\field\receita_orcada(0, 0, id: 'meta_mar'),
            \pad\converter\field\receita_orcada(0, 0, id: 'meta_abr'),
            \pad\converter\field\receita_orcada(0, 0, id: 'meta_mai'),
            \pad\converter\field\receita_orcada(0, 0, id: 'meta_jun'),
            \pad\converter\field\receita_orcada(0, 0, id: 'meta_jul'),
            \pad\converter\field\receita_orcada(0, 0, id: 'meta_ago'),
            \pad\converter\field\receita_orcada(0, 0, id: 'meta_set'),
            \pad\converter\field\receita_orcada(0, 0, id: 'meta_out'),
            \pad\converter\field\receita_orcada(0, 0, id: 'meta_nov'),
            \pad\converter\field\receita_orcada(0, 0, id: 'meta_dez'),
            \pad\converter\field\receita_orcada(0, 0, id: 'meta_total'),
            \pad\converter\field\a_arrecadar(0, 0, id: 'dif_jan'),
            \pad\converter\field\a_arrecadar(0, 0, id: 'dif_fev'),
            \pad\converter\field\a_arrecadar(0, 0, id: 'dif_mar'),
            \pad\converter\field\a_arrecadar(0, 0, id: 'dif_abr'),
            \pad\converter\field\a_arrecadar(0, 0, id: 'dif_mai'),
            \pad\converter\field\a_arrecadar(0, 0, id: 'dif_jun'),
            \pad\converter\field\a_arrecadar(0, 0, id: 'dif_jul'),
            \pad\converter\field\a_arrecadar(0, 0, id: 'dif_ago'),
            \pad\converter\field\a_arrecadar(0, 0, id: 'dif_set'),
            \pad\converter\field\a_arrecadar(0, 0, id: 'dif_out'),
            \pad\converter\field\a_arrecadar(0, 0, id: 'dif_nov'),
            \pad\converter\field\a_arrecadar(0, 0, id: 'dif_dez'),
            \pad\converter\field\a_arrecadar(0, 0),
        ],
        [
            'ds_exercicio_fr_filler',
            'ds_deducao_filler',
            'ds_co_filler',
            'ds_detalhe_tce_filler',
            'receita_filler',
            'classe_receita_filler',
            'tp_receita_filler',
            'ds_tp_receita_filler',
        ]
    ];
}

function bal_desp(): array {
    return [
        'bal_desp',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\cd_orgao(1, 2),
            \pad\converter\field\nm_orgao(0, 0),
            \pad\converter\field\cd_uniorcam(1, 4),
            \pad\converter\field\nm_uniorcam(0, 0),
            \pad\converter\field\cd_funcao(5, 2),
            \pad\converter\field\ds_funcao(0, 0),
            \pad\converter\field\cd_subfuncao(7, 3),
            \pad\converter\field\ds_subfuncao(0, 0),
            \pad\converter\field\cd_programa(10, 4),
            \pad\converter\field\nm_programa(0, 0),
            \pad\converter\field\cd_projativ(17, 5),
            \pad\converter\field\nm_projativ(0, 0),
            \pad\converter\field\cd_elemento(22, 6),
            \pad\converter\field\ds_elemento(0, 0),
            \pad\converter\field\dotacao(32, 13, id: 'dotacao_fixada'),
            \pad\converter\field\dotacao(45, 13, id: 'atualizacao_monetaria'),
            \pad\converter\field\dotacao(58, 13, id: 'credito_suplementar'),
            \pad\converter\field\dotacao(71, 13, id: 'credito_especial'),
            \pad\converter\field\dotacao(84, 13, id: 'credito_extraordinario'),
            \pad\converter\field\dotacao(97, 13, id: 'reducao_dotacao'),
            \pad\converter\field\dotacao(0, 0, id: 'dotacao_atualizada'),
            \pad\converter\field\dotacao(0, 0, id: 'dotacao_disponivel'),
            \pad\converter\field\valor(0, 0, id: 'a_empenhar'),
            \pad\converter\field\valor(136, 13, id: 'empenhado'),
            \pad\converter\field\valor(0, 0, id: 'a_liquidar'),
            \pad\converter\field\valor(149, 13, id: 'liquidado'),
            \pad\converter\field\valor(0, 0, id: 'empenhado_a_pagar'),
            \pad\converter\field\valor(0, 0, id: 'liquidado_a_pagar'),
            \pad\converter\field\valor(162, 13, id: 'pago'),
            \pad\converter\field\valor(175, 13, id: 'limitado'),
            \pad\converter\field\valor(188, 13, id: 'recomposto'),
            \pad\converter\field\dotacao(218, 13, id: 'transferencia'),
            \pad\converter\field\dotacao(231, 13, id: 'transposicao'),
            \pad\converter\field\dotacao(244, 13, id: 'remanejamento'),
            \pad\converter\field\exercicio_fr(257, 1),
            \pad\converter\field\ds_exercicio_fr(0, 0),
            \pad\converter\field\fr(258, 3),
            \pad\converter\field\ds_fr(0, 0),
        ],
        [
            'ds_funcao_filler',
            'ds_subfuncao_filler',
            'ds_exercicio_fr_filler',
            'bal_desp_filler'
        ]
    ];
}

function tce_4111(): array {
    return [
        'lancont',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\conta_contabil(1, 20),
            \pad\converter\field\nm_conta_contabil(0, 0),
            \pad\converter\field\cd_orgao(21, 2),
            \pad\converter\field\nm_orgao(0, 0),
            \pad\converter\field\cd_uniorcam(21, 4),
            \pad\converter\field\nm_uniorcam(0, 0),
            \pad\converter\field\nr_lancamento(29, 12),
            \pad\converter\field\nr_lote(41, 12),
            \pad\converter\field\nr_documento(53, 13),
            \pad\converter\field\data_lancamento(66, 8),
            \pad\converter\field\valor_lancamento(74, 17),
            \pad\converter\field\tp_lancamento(91, 1),
            \pad\converter\field\nr_arquivamento(92, 12),
            \pad\converter\field\historico(104, 150, id: 'historico'),
            \pad\converter\field\tp_documento(254, 1),
            \pad\converter\field\ds_tp_documento(0, 0),
            \pad\converter\field\natureza_informacao(255, 1),
            \pad\converter\field\ds_natureza_informacao(0, 0),
            \pad\converter\field\financeiro_permanente(256, 1),
            \pad\converter\field\ds_financeiro_permanente(0, 0),
            \pad\converter\field\exercicio_fr(265, 1),
            \pad\converter\field\ds_exercicio_fr(0, 0),
            \pad\converter\field\fr(266, 3),
            \pad\converter\field\ds_fr(0, 0),
            \pad\converter\field\co(269, 4),
            \pad\converter\field\ds_co(0, 0),
            \pad\converter\field\cd_detalhe_tce(273, 4),
            \pad\converter\field\ds_detalhe_tce(0, 0)
        ],
        [
            'ds_tp_documento_filler',
            'ds_natureza_informacao_filler',
            'ds_financeiro_permanente_filler',
            'ds_exercicio_fr_filler',
            'ds_co_filler',
            'ds_detalhe_tce_filler',
        ]
    ];
}

function bver_enc(): array {
    return [
        'bver_enc',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\conta_contabil(1, 20),
            \pad\converter\field\cd_orgao(21, 2),
            \pad\converter\field\nm_orgao(0, 0),
            \pad\converter\field\cd_uniorcam(21, 4),
            \pad\converter\field\nm_uniorcam(0, 0),
            ['saldo_anterior_devedor', 25, 13, '', ['valor']],
            ['saldo_anterior_credor', 38, 13, '', ['valor']],
            ['saldo_atual_devedor', 77, 13, '', ['valor']],
            ['saldo_atual_credor', 90, 13, '', ['valor']],
            ['saldo_inicial', 0, 0, 'REAL', []],
            ['natureza_saldo_inicial', 0, 0, 'TEXT', []],
            \pad\converter\field\movimento_devedor(51, 13),
            \pad\converter\field\movimento_credor(64, 13),
            ['saldo_final', 0, 0, 'REAL', []],
            ['natureza_saldo_final', 0, 0, 'TEXT', []],
            \pad\converter\field\nm_conta_contabil(103, 148),
            \pad\converter\field\tp_nivel(251, 1),
            \pad\converter\field\nr_nivel(252, 2),
            \pad\converter\field\escrituravel(255, 1),
            \pad\converter\field\natureza_informacao(256, 1),
            \pad\converter\field\ds_natureza_informacao(0, 0),
            \pad\converter\field\financeiro_permanente(257, 1),
            \pad\converter\field\ds_financeiro_permanente(0, 0),
            \pad\converter\field\exercicio_fr(266, 1),
            \pad\converter\field\ds_exercicio_fr(0, 0),
            \pad\converter\field\fr(267, 3),
            \pad\converter\field\ds_fr(0, 0),
            \pad\converter\field\co(270, 4),
            \pad\converter\field\ds_co(0, 0),
            \pad\converter\field\cd_detalhe_tce(274, 4),
            \pad\converter\field\ds_detalhe_tce(0, 0)
        ],
        [
            'saldos_contabeis',
            'ds_natureza_informacao_filler',
            'ds_financeiro_permanente_filler',
            'ds_exercicio_fr_filler',
            'ds_co_filler',
            'ds_detalhe_tce_filler',
        ]
    ];
}

function rd_extra(): array {
    return [
        'rd_extra',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\conta_contabil(1, 20),
            \pad\converter\field\nm_conta_contabil(0, 0),
            \pad\converter\field\cd_orgao(21, 2),
            \pad\converter\field\nm_orgao(0, 0),
            \pad\converter\field\cd_uniorcam(21, 4),
            \pad\converter\field\nm_uniorcam(0, 0),
            \pad\converter\field\valor_extra(25, 28),//precisa pegar até o fim da linha, pois o sinal do valor ficou distante do campo de valor
            \pad\converter\field\ingresso_dispendio(38, 1),
            \pad\converter\field\cd_identificador_dfc(45, 1),
            \pad\converter\field\ds_identificador_dfc(0, 0),
            \pad\converter\field\cd_identificador_bf(46, 2),
            \pad\converter\field\ds_identificador_bf(0, 0),
            \pad\converter\field\exercicio_fr(48, 1),
            \pad\converter\field\ds_exercicio_fr(0, 0),
            \pad\converter\field\fr(49, 3),
            \pad\converter\field\ds_fr(0, 0),
        ],
        [
            'ds_identificador_dfc_filler',
            'ds_identificador_bf_filler',
            'ds_exercicio_fr_filler',
        ]
    ];
}


function decreto(): array {
    return [
        'creditos',
        [
            \pad\converter\field\remessa(),
            \pad\converter\field\entidade(),
            \pad\converter\field\nr_lei(1, 20),
            \pad\converter\field\data_lei(21, 8),
            \pad\converter\field\nr_decreto(29, 20),
            \pad\converter\field\data_decreto(49, 8),
            \pad\converter\field\valor_credito(57, 13),
            \pad\converter\field\valor_reducao(70, 13),
            \pad\converter\field\tp_credito(83, 1),
            \pad\converter\field\ds_tp_credito(0, 0),
            \pad\converter\field\cd_origem_recurso(84, 1),
            \pad\converter\field\ds_origem_recurso(0, 0),
            \pad\converter\field\cd_alteracao_orcamentaria(85, 1),
            \pad\converter\field\ds_alteracao_orcamentaria(0, 0),
            \pad\converter\field\valor_alteracao_orcamentaria(86, 13),
            \pad\converter\field\data_reabertura_credito(99, 8),
            \pad\converter\field\valor_saldo_reaberto(107, 13),
            \pad\converter\field\exercicio_fr(128, 1, id: 'exercicio_fr_credito'),
            \pad\converter\field\ds_exercicio_fr(0, 0, id: 'ds_exercicio_fr_credito'),
            \pad\converter\field\fr(129, 3, id: 'fr_credito'),
            \pad\converter\field\ds_fr(0, 0, id: 'ds_fr_credito'),
            \pad\converter\field\exercicio_fr(132, 1, id: 'exercicio_fr_reducao'),
            \pad\converter\field\ds_exercicio_fr(0, 0, id: 'ds_exercicio_fr_reducao'),
            \pad\converter\field\fr(133, 3, id: 'fr_reducao'),
            \pad\converter\field\ds_fr(0, 0, id: 'ds_fr_reducao'),
            \pad\converter\field\data_operacao(136, 8),
        ],
        [
            'ds_tp_credito_filler',
            'ds_origem_recurso_filler',
            'ds_alteracao_orcamentaria_filler',
            'ds_exercicio_fr_credito_filler',
            'ds_exercicio_fr_reducao_filler',
        ]
    ];
}
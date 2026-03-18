<?php

namespace pad\converter\field;

function remessa(int $start = 0, int $lenght = 0, string $dtype = 'INTEGER', string $id = 'remessa'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function entidade(int $start = 0, int $lenght = 0, string $dtype = 'TEXT', string $id = 'entidade'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function exercicio(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'exercicio'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_orgao(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_orgao'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nm_orgao(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'nm_orgao'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_uniorcam(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_uniorcam'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nm_uniorcam(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'nm_uniorcam'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_identificador_uniorcam(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_identificador_uniorcam'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_identificador_uniorcam(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_identificador_uniorcam'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cnpj(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'cnpj'): array {
    $transformers = ['fmt_cnpj'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_programa(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_programa'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nm_programa(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'nm_programa'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_projativ(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_projativ'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nm_projativ(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'nm_projativ'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_identificador_projativ(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_identificador_projativ'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_identificador_projativ(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_identificador_projativ'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_rubrica(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'cd_rubrica'): array {
    $transformers = ['fmt_rubrica'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_rubrica(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_rubrica'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function tp_nivel(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'tp_nivel'): array {
    $transformers = ['to_upper'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nr_nivel(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'nr_nivel'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function fr(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'fr'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function exercicio_fr(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'exercicio_fr'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_exercicio_fr(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_exercicio_fr'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_fr(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_fr'): array {
    $transformers = ['trim_str'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function finalidade_fr(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'finalidade_fr'): array {
    $transformers = ['trim_str'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_credor(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_credor'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nm_credor(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'nm_credor'): array {
    $transformers = ['trim_str'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cpf_credor(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'cpf_credor'): array {
    $transformers = ['trim_str', 'is_cpf', 'fmt_cpf'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cnpj_credor(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'cnpj_credor'): array {
    $transformers = ['trim_str', 'is_cnpj', 'fmt_cnpj'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function conta_contabil(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'conta_contabil'): array {
    $transformers = ['fmt_cc'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nm_conta_contabil(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'nm_conta_contabil'): array {
    $transformers = ['trim_str'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_banco(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_banco'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_agencia(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'cd_agencia'): array {
    $transformers = ['trim_str'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nr_conta_corrente(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'nr_conta_corrente'): array {
    $transformers = ['trim_str'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function tp_conta_corrente(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'tp_conta_corrente'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_tp_conta_corrente(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_tp_conta_corrente'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function classificacao_ctadisp(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'classificacao_ctadisp'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_classificacao_ctadisp(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_classificacao_ctadisp'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function co(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'co'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_co(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_co'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_detalhe_tce(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_detalhe_tce'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_detalhe_tce(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_detalhe_tce'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_funcao(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_funcao'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_funcao(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_funcao'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_subfuncao(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_subfuncao'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_subfuncao(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_subfuncao'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function chave_empenho(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'chave_empenho'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ano_empenho(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'ano_empenho'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nr_empenho(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'nr_empenho'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function data_empenho(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'data_empenho'): array {
    $transformers = ['extract_data'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function valor_empenho(int $start, int $lenght, string $dtype = 'REAL', string $id = 'valor_empenho'): array {
    $transformers = ['valor_sinal'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cp_despesa(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cp_despesa'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_cp_despesa(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_cp_despesa'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function registro_precos(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'registro_precos'): array {
    $transformers = ['to_upper'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nr_licitacao(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'nr_licitacao'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ano_licitacao(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'ano_licitacao'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function historico(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'historico'): array {
    $transformers = ['trim_str'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_forma_contratacao(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'cd_forma_contratacao'): array {
    $transformers = ['to_upper'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_forma_contratacao(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_forma_contratacao'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_base_legal(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_base_legal'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_base_legal(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_base_legal'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_despesa_funcionario(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'cd_despesa_funcionario'): array {
    $transformers = ['to_upper'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_despesa_funcionario(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_despesa_funcionario'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function licitacao_compartilhada(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'licitacao_compartilhada'): array {
    $transformers = ['to_upper'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function data_liquidacao(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'data_liquidacao'): array {
    $transformers = ['extract_data'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function valor_liquidacao(int $start, int $lenght, string $dtype = 'REAL', string $id = 'valor_liquidacao'): array {
    $transformers = ['valor_sinal'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function existe_contrato(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'existe_contrato'): array {
    $transformers = ['to_upper'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nr_contrato_tce(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'nr_contrato_tce'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nr_contrato(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'nr_contrato'): array {
    $transformers = ['trim_str'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ano_contrato(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'ano_contrato'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function existe_nf(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'existe_nf'): array {
    $transformers = ['to_upper'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nr_nf(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'nr_nf'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function serie_nf(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'serie_nf'): array {
    $transformers = ['trim_str', 'to_upper'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_tipo_contrato(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'cd_tipo_contrato'): array {
    $transformers = ['to_upper'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_tipo_contrato(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_tipo_contrato'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function data_pagamento(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'data_pagamento'): array {
    $transformers = ['extract_data'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function valor_pagamento(int $start, int $lenght, string $dtype = 'REAL', string $id = 'valor_pagamento'): array {
    $transformers = ['valor_sinal'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nr_liquidacao(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'nr_liquidacao'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function movimento_devedor(int $start, int $lenght, string $dtype = 'REAL', string $id = 'movimento_devedor'): array {
    $transformers = ['valor'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function movimento_credor(int $start, int $lenght, string $dtype = 'REAL', string $id = 'movimento_credor'): array {
    $transformers = ['valor'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function escrituravel(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'escrituravel'): array {
    $transformers = ['to_upper'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function natureza_informacao(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'natureza_informacao'): array {
    $transformers = ['trim_str', 'to_upper'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_natureza_informacao(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_natureza_informacao'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function financeiro_permanente(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'financeiro_permanente'): array {
    $transformers = ['trim_str', 'to_upper'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_financeiro_permanente(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_financeiro_permanente'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nro(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'nro'): array {
    $transformers = ['to_nro', 'fmt_nro'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_receita(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'cd_receita'): array {
    $transformers = ['fmt_nro'];
    return [$id, $start, $lenght, $dtype, $transformers];
}


function ds_receita(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_receita'): array {
    $transformers = ['trim_str'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function classe_receita(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'classe_receita'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function tp_receita(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'tp_receita'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_tp_receita(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_tp_receita'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function receita_orcada(int $start, int $lenght, string $dtype = 'REAL', string $id = 'receita_orcada'): array {
    $transformers = ['valor'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function receita_realizada(int $start, int $lenght, string $dtype = 'REAL', string $id = 'receita_realizada'): array {
    $transformers = ['valor'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_deducao(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_deducao'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_deducao(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_deducao'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function previsao_atualizada_receita(int $start, int $lenght, string $dtype = 'REAL', string $id = 'previsao_atualizada_receita'): array {
    $transformers = ['valor'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function a_arrecadar(int $start, int $lenght, string $dtype = 'REAL', string $id = 'a_arrecadar'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_elemento(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'cd_elemento'): array {
    $transformers = ['fmt_elemento'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_elemento(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_elemento'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function dotacao(int $start, int $lenght, string $dtype = 'REAL', string $id = ''): array {
    $transformers = ['valor'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function valor(int $start, int $lenght, string $dtype = 'REAL', string $id = ''): array {
    $transformers = ['valor'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nr_lancamento(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'nr_lancamento'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nr_lote(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'nr_lote'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nr_documento(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'nr_documento'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function data_lancamento(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'data_lancamento'): array {
    $transformers = ['extract_data'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function valor_lancamento(int $start, int $lenght, string $dtype = 'REAL', string $id = 'valor_lancamento'): array {
    $transformers = ['valor'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function tp_lancamento(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'tp_lancamento'): array {
    $transformers = ['to_upper'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nr_arquivamento(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'nr_arquivamento'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function tp_documento(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'tp_documento'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_tp_documento(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_tp_documento'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function valor_extra(int $start, int $lenght, string $dtype = 'REAL', string $id = 'valor_extra'): array {
    $transformers = ['valor_extra'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ingresso_dispendio(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ingresso_dispendio'): array {
    $transformers = ['to_upper'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_identificador_dfc(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'cd_identificador_dfc'): array {
    $transformers = ['to_upper'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_identificador_dfc(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_identificador_dfc'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_identificador_bf(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_identificador_bf'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_identificador_bf(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_identificador_bf'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nr_lei(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'nr_lei'): array {
    $transformers = ['trim_str'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function data_lei(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'data_lei'): array {
    $transformers = ['extract_data'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function nr_decreto(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'nr_decreto'): array {
    $transformers = ['trim_str'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function data_decreto(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'data_decreto'): array {
    $transformers = ['extract_data'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function valor_credito(int $start, int $lenght, string $dtype = 'REAL', string $id = 'valor_credito'): array {
    $transformers = ['valor'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function valor_reducao(int $start, int $lenght, string $dtype = 'REAL', string $id = 'valor_reducao'): array {
    $transformers = ['valor'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function tp_credito(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'tp_credito'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_tp_credito(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_tp_credito'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_origem_recurso(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_origem_recurso'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_origem_recurso(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_origem_recurso'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function cd_alteracao_orcamentaria(int $start, int $lenght, string $dtype = 'INTEGER', string $id = 'cd_alteracao_orcamentaria'): array {
    $transformers = ['to_int'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function ds_alteracao_orcamentaria(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'ds_alteracao_orcamentaria'): array {
    $transformers = [];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function valor_alteracao_orcamentaria(int $start, int $lenght, string $dtype = 'REAL', string $id = 'valor_alteracao_orcamentaria'): array {
    $transformers = ['valor'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function data_reabertura_credito(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'data_reabertura_credito'): array {
    $transformers = ['extract_data'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function valor_saldo_reaberto(int $start, int $lenght, string $dtype = 'REAL', string $id = 'valor_saldo_reaberto'): array {
    $transformers = ['valor'];
    return [$id, $start, $lenght, $dtype, $transformers];
}

function data_operacao(int $start, int $lenght, string $dtype = 'TEXT', string $id = 'data_operacao'): array {
    $transformers = ['extract_data'];
    return [$id, $start, $lenght, $dtype, $transformers];
}
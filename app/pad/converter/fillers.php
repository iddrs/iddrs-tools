<?php

namespace pad\converter\filler;

function ds_identificador_uniorcam_filler(array $data): array {
    $cod = [
        1  => 'Prefeitura Municipal',
        2  => 'Câmara Municipal',
        3  => 'Secretaria da Educação',
        4  => 'Secretaria da Saúde',
        5  => 'RPPS (exceto autarquia)',
        6  => 'Autarquia (exceto RPPS)',
        7  => 'Autarquia (RPPS)',
        8  => 'Fundação',
        9  => 'Empresa Estatal Dependente',
        10 => 'Empresa Estatal Não Dependente',
        11 => 'Consórcio',
        12 => 'Outras',
    ];
    
    $data['ds_identificador_uniorcam'] = $cod[$data['cd_identificador_uniorcam']];
    
    return $data;
}

function ds_identificador_projativ_filler(array $data): array {
    $cod = [
        1  => 'RPPS',
        2  => 'Demais Proj./Ativ./Op. Esp.',
    ];
    
    $data['ds_identificador_projativ'] = $cod[$data['cd_identificador_projativ']];
    
    return $data;
}

function ds_exercicio_fr_filler(array $data): array {
    $cod = [
        0  => '',
        1  => 'Recursos do Exercício Corrente',
        2  => 'Recursos de Exercícios Anteriores',
        9  => 'Recursos Condicionados',
    ];
    
    $data['ds_exercicio_fr'] = $cod[$data['exercicio_fr']];
    
    return $data;
}

function ds_exercicio_fr_credito_filler(array $data): array {
    $cod = [
        0  => '',
        1  => 'Recursos do Exercício Corrente',
        2  => 'Recursos de Exercícios Anteriores',
        9  => 'Recursos Condicionados',
    ];
    $data['ds_exercicio_fr_credito'] = $cod[$data['exercicio_fr_credito']];
    return $data;
}

function ds_exercicio_fr_reducao_filler(array $data): array {
    $cod = [
        0  => '',
        1  => 'Recursos do Exercício Corrente',
        2  => 'Recursos de Exercícios Anteriores',
        9  => 'Recursos Condicionados',
    ];
    $data['ds_exercicio_fr_reducao'] = $cod[$data['exercicio_fr_reducao']];
    return $data;
}

function tp_conta_corrente_filler(array $data): array {
    $cod = [
        1  => 'Caixa',
        2  => 'Banco Conta Movimento',
        3  => 'Banco Conta Aplicação',
        4  => 'Dep. Sentenças Judiciais',
        5  => 'Dep. Judiciais de Restos a Pagar',
    ];
    
    $data['ds_tp_conta_corrente'] = $cod[$data['tp_conta_corrente']];
    
    return $data;
}

function ds_classificacao_ctadisp_filler(array $data): array {
    $cod = [
        1  => 'Poder Executivo',
        2  => 'Poder Legislativo',
        3  => 'RPPS',
        9  => 'Outros',
    ];
    
    $data['ds_classificacao_ctadisp'] = $cod[$data['classificacao_ctadisp']];
    
    return $data;
}

function ds_detalhe_tce_filler(array $data): array {
//    $cod = [
//        1  => '',
//        2  => '',
//        3  => '',
//        9  => '',
//    ];
//    
//    $data['ds_detalhe_tce'] = $cod[$data['cd_detalhe_tce']];
    
    return $data;
}

function ds_co_filler(array $data): array {
    $cod = [
        0    => '',
        1001 => 'Identificação das despesas com manutenção e desenvolvimento do ensino',
        1002 => 'Identificação das despesas com ações e serviços públicos de saúde',
        1010 => 'Identificação das despesas custeadas com os recursos decorrentes da postergação do pagamento da dívida com a União em razão de calamidade pública.',
        1070 => 'Identificação do percentual aplicado no pagamento da remuneração dos profissionais da educação básica em efetivo exercício',
        1071 => 'Identificação do percentual aplicado na criação de matrículas em tempo integral (ETI) na educação básica',
        1072 => '"Identificação do percentual aplicado no pagamento da remuneração dos profissionais da educação básica em efetivo
exercício e na criação de matrículas em tempo integral (ETI) na educação básica"',
        1111 => 'Benefícios previdenciários - Poder Executivo – Fundo em Capitalização (Plano Previdenciário)',
        1121 => 'Benefícios previdenciários - Poder Legislativo – Fundo em Capitalização (Plano Previdenciário)',
        1122 => 'Benefícios previdenciários - Tribunal de Contas – Fundo em Capitalização (Plano Previdenciário)',
        1123 => 'Benefícios previdenciários - Tribunal de Contas dos Municípios – Fundo em Capitalização (Plano Previdenciário)',
        1124 => 'Benefícios previdenciários - Ministério Público de Contas – Fundo em Capitalização (Plano Previdenciário)',
        1125 => 'Benefícios previdenciários - Ministério Público de Contas dos Municípios – Fundo em Capitalização (Plano Previdenciário)',
        1131 => 'Benefícios previdenciários - Tribunal de Justiça – Fundo em Capitalização (Plano Previdenciário)',
        1132 => 'Benefícios previdenciários - Tribunal de Justiça Militar – Fundo em Capitalização (Plano Previdenciário)',
        1141 => 'Benefícios previdenciários - Ministério Público – Fundo em Capitalização (Plano Previdenciário)',
        1151 => 'Benefícios previdenciários - Defensoria Pública - Fundo em Capitalização (Plano Previdenciário)',
        2111 => 'Benefícios previdenciários - Poder Executivo - Fundo em Repartição (Plano Financeiro)',
        2121 => 'Benefícios previdenciários - Poder Legislativo - Fundo em Repartição (Plano Financeiro)',
        2122 => 'Benefícios previdenciários - Tribunal de Contas - Fundo em Repartição (Plano Financeiro)',
        2123 => 'Benefícios previdenciários - Tribunal de Contas dos Municípios - Fundo em Repartição (Plano Financeiro)',
        2124 => 'Benefícios previdenciários - Ministério Público de Contas - Fundo em Repartição (Plano Financeiro)',
        2125 => 'Benefícios previdenciários - Ministério Público de Contas dos Municípios - Fundo em Repartição (Plano Financeiro)',
        2131 => 'Benefícios previdenciários - Tribunal de Justiça - Fundo em Repartição (Plano Financeiro)',
        2132 => 'Benefícios previdenciários - Tribunal de Justiça Militar - Fundo em Repartição (Plano Financeiro)',
        2141 => 'Benefícios previdenciários - Ministério Público - Fundo em Repartição (Plano Financeiro)',
        2151 => 'Benefícios previdenciários - Defensoria Pública - Fundo em Repartição (Plano Financeiro)',
        2211 => 'Benefícios Previdenciários - Militares SPSM',
        2301 => 'Identificação das despesas com implementação e expansão de matrículas da educação profissional técnica de nível médio – Propag',
        2302 => 'Identificação dos investimentos em infraestrutura para universalização do ensino infantil – Propag',
        2303 => 'Identificação dos investimentos em infraestrutura para universalização da educação em tempo integral – Propag',
        2304 => 'Identificação dos investimentos em adaptação às mudanças climáticas – Propag',
        2305 => 'Identificação dos investimentos em universidades estaduais – Propag',
        2306 => 'Identificação dos investimentos em saneamento – Propag',
        2307 => 'Identificação dos investimentos em habitação – Propag',
        2308 => 'Identificação dos investimentos em transportes – Propag',
        2309 => 'Identificação dos investimentos em segurança pública – Propag',
        3101 => 'Identificação das transferências da União para enfrentamento à calamidade pública.',
        3110 => 'Identificação das Transferências da União decorrentes de emendas parlamentares individuais',
        3111 => 'Identificação das Transferências da União decorrentes de emendas parlamentares individuais - calamidade pública.',
        3120 => 'Identificação das Transferências da União decorrentes de emendas parlamentares de bancada',
        3121 => 'Identificação das Transferências da União decorrentes de emendas parlamentares de bancada - calamidade pública.',
        3130 => 'Identificação das Transferências da União decorrentes de emendas parlamentares de comissão.',
        3140 => 'Identificação das Transferências da União decorrentes de emendas parlamentares de relator.',
        3201 => 'Identificação das transferências do Estado para enfrentamento à calamidade pública.',
        3202 => 'Identificação das transferências de municípios e de demais instituições para enfrentamento à calamidade pública.',
        3210 => 'Identificação das Transferências dos Estados decorrentes de emendas parlamentares individuais',
        3211 => 'Identificação das Transferências dos Estados decorrentes de emendas parlamentares individuais - calamidade pública.',
        3220 => 'Identificação das Transferências dos Estados decorrentes de emendas parlamentares de bancada',
        3221 => 'Identificação das Transferências dos Estados decorrentes de emendas parlamentares de bancada - calamidade pública.',
        5001 => 'Identificação das receitas de compensação de precatórios com dívida ativa - Art. 105 ADCT - CF, de 1988',
    ];
    
    $data['ds_co'] = $cod[$data['co']];
    
    return $data;
}

function ds_funcao_filler(array $data): array {
    $cod = [
        1  => 'Legislativa',
        2  => 'Judiciária',
        3  => 'Essencial à Justiça',
        4  => 'Administração',
        5  => 'Defesa Nacional',
        6  => 'Segurança Pública',
        7  => 'Relações Exteriores',
        8  => 'Assistência Social',
        9  => 'Previdência Social',
        10 => 'Saúde',
        11 => 'Trabalho',
        12 => 'Educação',
        13 => 'Cultura',
        14 => 'Direitos e Cidadania',
        15 => 'Urbanismo',
        16 => 'Habitação',
        17 => 'Saneamento',
        18 => 'Gestão Ambiental',
        19 => 'Ciência e Tecnologia',
        20 => 'Agricultura',
        21 => 'Organização Agrária',
        22 => 'Indústria',
        23 => 'Comércio e Serviços',
        24 => 'Comunicações',
        25 => 'Energia',
        26 => 'Transporte',
        27 => 'Desporto e Lazer',
        28 => 'Encargos Especiais',
        99 => 'Reservas',
    ];
    
    $data['ds_funcao'] = $cod[$data['cd_funcao']];
    
    return $data;
}

function ds_subfuncao_filler(array $data): array {
    $cod = [
        31  => 'Ação Legislativa',
        32  => 'Controle Externo',
        61  => 'Ação Judiciária',
        62  => 'Defesa do Interesse Público no Processo Judiciário',
        91  => 'Defesa da Ordem Jurídica',
        92  => 'Representação Judicial e Extrajudicial',
        121 => 'Planejamento e Orçamento',
        122 => 'Administração Geral',
        123 => 'Administração Financeira',
        124 => 'Controle Interno',
        125 => 'Normatização e Fiscalização',
        126 => 'Tecnologia da Informação',
        127 => 'Ordenamento Territorial',
        128 => 'Formação de Recursos Humanos',
        129 => 'Administração de Receitas',
        130 => 'Administração de Concessões',
        131 => 'Comunicação Social',
        151 => 'Defesa Aérea',
        152 => 'Defesa Naval',
        153 => 'Defesa Terrestre',
        181 => 'Policiamento',
        182 => 'Defesa Civil',
        183 => 'Informação e Inteligência',
        211 => 'Relações Diplomáticas',
        212 => 'Cooperação Internacional',
        241 => 'Assistência à Pessoa Idosa',
        242 => 'Assistência à Pessoa com Deficiência',
        243 => 'Assistência à Criança e ao Adolescente',
        244 => 'Assistência Comunitária',
        245 => 'Serviços Socioassistenciais',
        246 => 'Segurança de Renda',
        271 => 'Previdência Básica',
        272 => 'Previdência do Regime Estatutário',
        273 => 'Previdência Complementar',
        274 => 'Previdência Especial',
        301 => 'Atenção Básica',
        302 => 'Assistência Hospitalar e Ambulatorial',
        303 => 'Suporte Profilático e Terapêutico',
        304 => 'Vigilância Sanitária',
        305 => 'Vigilância Epidemiológica',
        306 => 'Alimentação e Nutrição',
        331 => 'Proteção e Benefícios ao Trabalhador',
        332 => 'Relações de Trabalho',
        333 => 'Empregabilidade',
        334 => 'Fomento ao Trabalho',
        361 => 'Ensino Fundamental',
        362 => 'Ensino Médio',
        363 => 'Ensino Profissional',
        364 => 'Ensino Superior',
        365 => 'Educação Infantil',
        366 => 'Educação de Jovens e Adultos',
        367 => 'Educação Especial',
        368 => 'Educação Básica',
        391 => 'Patrimônio Histórico, Artístico e Arqueológico',
        392 => 'Difusão Cultural',
        421 => 'Custódia e Reintegração Social',
        422 => 'Direitos Individuais, Coletivos e Difusos',
        423 => 'Assistência aos Povos Indígenas',
        451 => 'Infra-estrutura Urbana',
        452 => 'Serviços Urbanos',
        453 => 'Transportes Coletivos Urbanos',
        481 => 'Habitação Rural',
        482 => 'Habitação Urbana',
        511 => 'Saneamento Básico Rural',
        512 => 'Saneamento Básico Urbano',
        541 => 'Preservação e Conservação Ambiental',
        542 => 'Controle Ambiental',
        543 => 'Recuperação de Áreas Degradadas',
        544 => 'Recursos Hídricos',
        545 => 'Meteorologia',
        571 => 'Desenvolvimento Científico',
        572 => 'Desenvolvimento Tecnológico e Engenharia',
        573 => 'Difusão do Conhecimento Científico e Tecnológico',
        601 => 'Promoção da Produção Vegetal',
        602 => 'Promoção da Produção Animal',
        603 => 'Defesa Sanitária Vegetal',
        604 => 'Defesa Sanitária Animal',
        605 => 'Abastecimento',
        606 => 'Extensão Rural',
        607 => 'Irrigação',
        608 => 'Promoção da Produção Agropecuária',
        609 => 'Defesa Agropecuária',
        631 => 'Reforma Agrária',
        632 => 'Colonização',
        661 => 'Promoção Industrial',
        662 => 'Produção Industrial',
        663 => 'Mineração',
        664 => 'Propriedade Industrial',
        665 => 'Normalização e Qualidade',
        691 => 'Promoção Comercial',
        692 => 'Comercialização',
        693 => 'Comércio Exterior',
        694 => 'Serviços Financeiros',
        695 => 'Turismo',
        721 => 'Comunicações Postais',
        722 => 'Telecomunicações',
        751 => 'Conservação de Energia',
        752 => 'Energia Elétrica',
        753 => 'Combustíveis Minerais',
        754 => 'Biocombustíveis',
        781 => 'Transporte Aéreo',
        782 => 'Transporte Rodoviário',
        783 => 'Transporte Ferroviário',
        784 => 'Transporte Aquaviário',
        785 => 'Transportes Especiais',
        811 => 'Desporto de Rendimento',
        812 => 'Desporto Comunitário',
        813 => 'Lazer',
        841 => 'Refinanciamento da Dívida Interna',
        842 => 'Refinanciamento da Dívida Externa',
        843 => 'Serviço da Dívida Interna',
        844 => 'Serviço da Dívida Externa',
        845 => 'Outras Transferências',
        846 => 'Outros Encargos Especiais',
        847 => 'Transferências para a Educação Básica',
        997 => 'Reserva do RPPS ',
        999 => 'Reserva de Contingência',
    ];
    
    $data['ds_subfuncao'] = $cod[$data['cd_subfuncao']];
    
    return $data;
}

function ds_cp_despesa_filler(array $data): array {
    $cod = [
        0   => 'Não se aplica',
        501 => '70% do Fundeb',
        502 => 'Superávit do Fundeb',
        901 => 'Coleta de Resíduos Sólidos Urbanos',
        902 => 'Transporte de Resíduos Sólidos',
        903 => 'Transporte de Resíduos Sólidos Urbanos',
        904 => 'Coleta, Transporte e Tratamento de Resíduos de Serviços de Saúde',
        905 => 'Limpeza de Vias Urbanas',
        906 => 'Coleta Seletiva de Resíduos Sólidos Urbanos',
    ];
    
    $data['ds_cp_despesa'] = $cod[$data['cp_despesa']];
    
    return $data;
}

function ds_forma_contratacao_filler(array $data): array {
    $cod = [
        'CHP' => 'Chamamento público',
        'CNC' => 'Concorrência',
        'CNS' => 'Concurso',
        'CNV' => 'Convite',
        'CPC' => 'Chamamento Público Credenciamento',
        'CPP' => 'Chamada Pública PNAE',
        'DPV' => 'Processo de Dispensa por pequeno valor',
        'PRD' => 'Processo de Dispensa (exceto pequeno valor)',
        'PRE' => 'Pregão Eletrônico',
        'PRI' => 'Processo de Inexigibilidade',
        'PRP' => 'Pregão Presencial',
        'RDC' => 'Regime Diferenciado de Contratação (Presencial)',
        'RDE' => 'Regime Diferenciado de Contratação (Eletrônico)',
        'RIN' => 'Regras internacionais',
        'RPO' => 'Adesão à Ata de Registro de Preços',
        'TMP' => 'Tomada de Preços',
        'PDE' => 'Processo de Dispensa Eletrônica',
        'CCP' => 'Concorrência Lei 14.133 Presencial',
        'CCE' => 'Concorrência Lei 14.133 Eletrônica',
        'PCE' => 'Pregão Lei 14.133 Eletrônico',
        'PCP' => 'Pregão Lei 14.133 Presencial',
        'NSA' => 'Não se aplica',
    ];
    
    $data['ds_forma_contratacao'] = $cod[mb_strtoupper($data['cd_forma_contratacao'])];
    
    return $data;
}

function ds_base_legal_filler(array $data): array {
    $cod = [
        0 => 'Não se aplica',
        1 => 'Lei 8.666/93',
        2 => 'Lei 12.462/2011',
        3 => 'Lei 13.019/2014',
        4 => 'Lei 9.637/1998 (O.S)',
        5 => 'Lei 9.790/1999 (OSCIP)',
        6 => 'Outra',
        7 => 'Lei 10.520 (Pregão)',
        8 => 'Lei 14.133/21',
    ];
    
    $data['ds_base_legal'] = $cod[$data['cd_base_legal']];
    
    return $data;
}

function ds_despesa_funcionario_filler(array $data): array {
    $cod = [
        'F' => 'Folha de pagamento',
        'I' => 'Indenizações não inclusas na folha de pagamento',
        'O' => 'Obrigações Patronais',
        'X' => 'Não se aplica',
    ];
    
    $data['ds_despesa_funcionario'] = $cod[mb_strtoupper($data['cd_despesa_funcionario'])];
    
    return $data;
}

function ds_tipo_contrato_filler(array $data): array {
    $cod = [
        'A' => 'Termo de Adesão',
        'C' => 'Contrato',
        'F' => 'Termo de Fomento',
        'G' => 'Contrato de Gestão',
        'N' => 'Nota de Empenho',
        'O' => 'Acordo de Cooperação',
        'P' => 'Termo de Parceria',
        'R' => 'Termo de Credenciamento',
        'T' => 'Termo de Colaboração',
        'U' => 'Termo de Permissão de Uso',
        'X' => 'Não se aplica',
    ];
    
    $data['ds_tipo_contrato'] = $cod[mb_strtoupper($data['cd_tipo_contrato'])];
    
    return $data;
}

function saldos_contabeis(array $data): array {
    
    $saldo_inicial = 0.0;
    $saldo_final = 0.0;
    $natureza_saldo_inicial = '';
    $natureza_saldo_final = '';
    
    switch ($data['conta_contabil'][0]){
        case '1':
        case '3':
        case '5':
        case '7':
            $saldo_inicial = round($data['saldo_anterior_devedor'] - $data['saldo_anterior_credor'], 2);
            if($saldo_inicial > 0.0){
                $natureza_saldo_inicial = 'D';
            }elseif ($saldo_inicial < 0.0) {
                $natureza_saldo_inicial = 'C';
            }else{
                $natureza_saldo_inicial = '';
            }
            break;
        case '2':
        case '4':
        case '6':
        case '8':
            $saldo_inicial = round($data['saldo_anterior_credor'] - $data['saldo_anterior_devedor'], 2);
            if($saldo_inicial > 0.0){
                $natureza_saldo_inicial = 'C';
            }elseif ($saldo_inicial < 0.0) {
                $natureza_saldo_inicial = 'D';
            }else{
                $natureza_saldo_inicial = '';
            }
            break;
    }
    
    switch ($data['conta_contabil'][0]){
        case '1':
        case '3':
        case '5':
        case '7':
            $saldo_final = round($saldo_inicial + $data['movimento_devedor'] - $data['movimento_credor'], 2);
            if($saldo_final > 0.0){
                $natureza_saldo_final = 'D';
            }elseif ($saldo_final < 0.0) {
                $natureza_saldo_final = 'C';
            }else{
                $natureza_saldo_final = '';
            }
            break;
        case '2':
        case '4':
        case '6':
        case '8':
            $saldo_final = round($saldo_inicial + $data['movimento_credor'] - $data['movimento_devedor'], 2);
            if($saldo_final > 0.0){
                $natureza_saldo_final = 'C';
            }elseif ($saldo_final < 0.0) {
                $natureza_saldo_final = 'D';
            }else{
                $natureza_saldo_final = '';
            }
            break;
    }
    
    $data['saldo_inicial'] = $saldo_inicial;
    $data['natureza_saldo_inicial'] = $natureza_saldo_inicial;
    $data['saldo_final'] = $saldo_final;
    $data['natureza_saldo_final'] = $natureza_saldo_final;
    
    return $data;
}

function ds_financeiro_permanente_filler(array $data): array {
    $cod = [
        '' => '',
        'P' => 'Permanente',
        'F' => 'Financeiro',
    ];
    
    $data['ds_financeiro_permanente'] = $cod[mb_strtoupper($data['financeiro_permanente'])];
    
    return $data;
}

function ds_natureza_informacao_filler(array $data): array {
    $cod = [
        'P' => 'Patrimonial',
        'O' => 'Orçamentária',
        'C' => 'Controle',
    ];
    
    $data['ds_natureza_informacao'] = $cod[mb_strtoupper($data['natureza_informacao'])];
    
    return $data;
}

function ds_deducao_filler(array $data): array {
    $cod = [
        0 => 'Não se aplica',
        101 => 'Renúncia de receita',
        102 => 'Restituição de receita',
        103 => 'Desconto concedido',
        105 => 'Dedução para o Fundeb',
        106 => 'Compensação',
        108 => 'Retificação',
        109 => 'Outras deduções',
        
    ];
    
    $data['ds_deducao'] = $cod[$data['cd_deducao']];
    
    return $data;
}

function calc_a_arrecadar_filler(array $data): array {
    $valor = round($data['previsao_atualizada_receita'] - $data['receita_realizada'], 2);
    $data['a_arrecadar'] = $valor;
    return $data;
}

function receita_filler(array $data): array {
    $data['arrecadado'] = round(array_sum(array_filter($data, function($k) {return str_starts_with($k, 'realizada_');}, ARRAY_FILTER_USE_KEY )), 2);
    
    $data['meta_jan'] = round($data['meta_1bim'] / 2, 2);
    $data['meta_fev'] = round($data['meta_1bim'] - $data['meta_jan'], 2);
    
    $data['meta_mar'] = round($data['meta_2bim'] / 2, 2);
    $data['meta_abr'] = round($data['meta_2bim'] - $data['meta_mar'], 2);
    
    $data['meta_mai'] = round($data['meta_3bim'] / 2, 2);
    $data['meta_jun'] = round($data['meta_3bim'] - $data['meta_mai'], 2);
    
    $data['meta_jul'] = round($data['meta_4bim'] / 2, 2);
    $data['meta_ago'] = round($data['meta_4bim'] - $data['meta_jul'], 2);
    
    $data['meta_set'] = round($data['meta_5bim'] / 2, 2);
    $data['meta_out'] = round($data['meta_5bim'] - $data['meta_set'], 2);
    
    $data['meta_nov'] = round($data['meta_6bim'] / 2, 2);
    $data['meta_dez'] = round($data['meta_6bim'] - $data['meta_nov'], 2);
    
    $data['meta_total'] = round($data['meta_1bim']+$data['meta_2bim']+$data['meta_3bim']+$data['meta_4bim']+$data['meta_5bim']+$data['meta_6bim'], 2);
    
    $data['a_arrecadar'] = round($data['meta_total'] - $data['arrecadado'], 2);
    
    $data['dif_jan'] = round($data['meta_jan'] - $data['realizada_jan'], 2);
    $data['dif_fev'] = round($data['meta_fev'] - $data['realizada_fev'], 2);
    $data['dif_mar'] = round($data['meta_mar'] - $data['realizada_mar'], 2);
    $data['dif_abr'] = round($data['meta_abr'] - $data['realizada_abr'], 2);
    $data['dif_mai'] = round($data['meta_mai'] - $data['realizada_mai'], 2);
    $data['dif_jun'] = round($data['meta_jun'] - $data['realizada_jun'], 2);
    $data['dif_jul'] = round($data['meta_jul'] - $data['realizada_jul'], 2);
    $data['dif_ago'] = round($data['meta_ago'] - $data['realizada_ago'], 2);
    $data['dif_set'] = round($data['meta_set'] - $data['realizada_set'], 2);
    $data['dif_out'] = round($data['meta_out'] - $data['realizada_out'], 2);
    $data['dif_nov'] = round($data['meta_nov'] - $data['realizada_nov'], 2);
    $data['dif_dez'] = round($data['meta_dez'] - $data['realizada_dez'], 2);
    
    if($data['fr'] == 0){
        $data['tp_nivel'] = 'S';
    } else {
        $data['tp_nivel'] = 'A';
    }
    
    return $data;
}

function bal_desp_filler(array $data): array {
    $data['dotacao_atualizada'] = round($data['dotacao_fixada'] + $data['atualizacao_monetaria'] + $data['credito_suplementar'] + $data['credito_especial'] + $data['credito_extraordinario'] - $data['reducao_dotacao'] + $data['transferencia'] + $data['transposicao'] + $data['remanejamento'], 2);
    
    $data['dotacao_disponivel'] = round($data['dotacao_atualizada'] - $data['limitado'] + $data['recomposto'], 2);
    
    $data['a_empenhar'] = round($data['dotacao_disponivel'] - $data['empenhado'], 2);
    
    $data['a_liquidar'] = round($data['empenhado'] - $data['liquidado'], 2);
    
    $data['empenhado_a_pagar'] = round($data['empenhado'] - $data['pago'], 2);
    $data['liquidado_a_pagar'] = round($data['liquidado'] - $data['pago'], 2);
    
    
    
    return $data;
}

function ds_tp_documento_filler(array $data): array {
    $cod = [
        0 => 'Sem número',
        1 => 'Empenho',
        2 => 'Nota Financeira',
        3 => 'Nota Fiscal',
        9 => 'Outros documentos',
    ];
    $data['ds_tp_documento'] = $cod[$data['tp_documento']];
    
    return $data;
}

function ds_identificador_dfc_filler(array $data): array {
    $cod = [
        'O' => 'Fluxo Operacional',
        'I' => 'Fluxo de Investimento',
        'F' => 'Fluxo de Financiamento',
    ];
    $data['ds_identificador_dfc'] = $cod[$data['cd_identificador_dfc']];
    
    return $data;
}

function ds_identificador_bf_filler(array $data): array {
    $cod = [
        1 => 'Transferências Recebidas ou Concedidas para a Execução Orçamentária',
        2 => 'Transferências Financeiras Recebidas ou Concedidas Independentes de Execução Orçamentária',
        3 => 'Transferências Recebidas ou Concedidas para Aporte de Recursos para o RPPS',
        4 => 'Resgate ou Transferência de Investimento e Aplicações Financeiras',
        5 => 'Bloqueio ou Desbloqueio de Caixa',
        6 => 'Outros Recebimentos ou Pagamentos Extraorçamentários',
        7 => 'Depósitos Restituíveis e Valores Vinculados',
    ];
    $data['ds_identificador_bf'] = $cod[$data['cd_identificador_bf']];
    
    return $data;
}

function ds_tp_credito_filler(array $data): array {
    $cod = [
        0 => 'Não se aplica',
        1 => 'Suplementar',
        2 => 'Especial',
        3 => 'Extraordinário',
    ];
    $data['ds_tp_credito'] = $cod[$data['tp_credito']];
    
    return $data;
}

function ds_origem_recurso_filler(array $data): array {
    $cod = [
        0 => 'Não se aplica',
        1 => 'Superávit financeiro',
        2 => 'Excesso de arrecadação',
        3 => 'Operações de crédito',
        4 => 'Auxílios e convênios',
        5 => 'Reduções/Suplementações na mesma entidade',
        6 => 'Reduções/Suplementações entre entidades',
    ];
    $data['ds_origem_recurso'] = $cod[$data['cd_origem_recurso']];
    
    return $data;
}

function ds_alteracao_orcamentaria_filler(array $data): array {
    $cod = [
        0 => 'Não se aplica',
        1 => 'Transferência',
        2 => 'Transposição',
        3 => 'Remanejamento',
    ];
    $data['ds_alteracao_orcamentaria'] = $cod[$data['cd_alteracao_orcamentaria']];
    
    return $data;
}

function classe_receita_filler(array $data): array {
    if($data['cd_deducao'] > 0) {
        $data['classe_receita'] = 'dedutora';
        return $data;
    } 
    switch ($data['cd_receita'][0]){
        case '7':
        case '8':
            $classe = 'intra';
            break;
        default:
            $classe = 'normal';
    }
    $data['classe_receita'] = $classe;
    return $data;
}

function tp_receita_filler(array $data): array {
    $data['tp_receita'] = (int) $data['cd_receita'][13];
    return $data;
}

function ds_tp_receita_filler(array $data): array {
    switch ($data['tp_receita']){
        case 1:
            $tp = 'Principal';
            break;
        case 2:
            $tp = 'MJM do principal';
            break;
        case 3:
            $tp = 'Dívida Ativa';
            break;
        case 4:
            $tp = 'MJM da Dívida Ativa';
            break;
        case 5:
            $tp = 'Multa do principal';
            break;
        case 6:
            $tp = 'Juros do principal';
            break;
        case 7:
            $tp = 'Multa da Dívida Ativa';
            break;
        case 8:
            $tp = 'Juros da Dívida Ativa';
            break;
        default:
            $tp = 'Agregadora';
    }
    $data['ds_tp_receita'] = $tp;
    return $data;
}
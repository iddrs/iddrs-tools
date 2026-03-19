<?php

namespace pad\converter\post;

use function support\db\db;
use function support\log\debug;
use function support\log\info;

function nm_orgao_uniorcam(int $remessa) {
    info('Preenchendo nm_orgao em uniorcam...');
    $sql = <<<SQL
            UPDATE uniorcam
            SET nm_orgao = orgao.nm_orgao
            FROM orgao
            WHERE uniorcam.cd_orgao = orgao.cd_orgao
            AND uniorcam.remessa = orgao.remessa
            AND uniorcam.exercicio = orgao.exercicio;
            AND uniorcam.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function ds_fr_cta_disp(int $remessa) {
    info('Preenchendo ds_fr em cta_disp...');
    $sql = <<<SQL
            UPDATE cta_disp
            SET ds_fr = fontes_recurso.ds_fr
            FROM fontes_recurso
            WHERE cta_disp.fr = fontes_recurso.fr
            AND cta_disp.remessa = fontes_recurso.remessa
            AND cta_disp.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_orgao_cta_disp(int $remessa) {
    info('Preenchendo nm_orgao em cta_disp...');
    $exercicio = (int) substr($remessa, 0, 4);
    $sql = <<<SQL
            UPDATE cta_disp
            SET nm_orgao = orgao.nm_orgao
            FROM orgao
            WHERE cta_disp.cd_orgao = orgao.cd_orgao
            AND cta_disp.remessa = orgao.remessa
            AND cta_disp.remessa = $remessa
            AND orgao.exercicio = $exercicio
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_uniorcam_cta_disp(int $remessa) {
    info('Preenchendo nm_uniorcam em cta_disp...');
    $exercicio = (int) substr($remessa, 0, 4);
    $sql = <<<SQL
            UPDATE cta_disp
            SET nm_uniorcam= uniorcam.nm_uniorcam
            FROM uniorcam
            WHERE cta_disp.cd_uniorcam = uniorcam.cd_uniorcam
            AND cta_disp.remessa = uniorcam.remessa
            AND cta_disp.remessa = $remessa
            AND uniorcam.exercicio = $exercicio
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_conta_contabil_cta_disp(int $remessa) {
    info('Preenchendo nm_conta_contabil em cta_disp...');
    $sql = <<<SQL
            UPDATE cta_disp
            SET nm_conta_contabil = bal_ver.nm_conta_contabil
            FROM bal_ver
            WHERE cta_disp.conta_contabil = bal_ver.conta_contabil
            AND cta_disp.remessa = bal_ver.remessa
            AND cta_disp.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_orgao_empenho(int $remessa) {
    info('Preenchendo nm_orgao em empenho...');
    $sql = <<<SQL
            UPDATE empenho
            SET nm_orgao = orgao.nm_orgao
            FROM orgao
            WHERE empenho.cd_orgao = orgao.cd_orgao
            AND empenho.remessa = orgao.remessa
            AND empenho.ano_empenho = orgao.exercicio;
            AND empenho.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_uniorcam_empenho(int $remessa) {
    info('Preenchendo nm_uniorcam em empenho...');
    $sql = <<<SQL
            UPDATE empenho
            SET nm_uniorcam= uniorcam.nm_uniorcam
            FROM uniorcam
            WHERE empenho.cd_uniorcam = uniorcam.cd_uniorcam
            AND empenho.remessa = uniorcam.remessa
            AND empenho.ano_empenho = uniorcam.exercicio
            AND empenho.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_programa_empenho(int $remessa) {
    info('Preenchendo nm_programa em empenho...');
    $sql = <<<SQL
            UPDATE empenho
            SET nm_programa = programa.nm_programa
            FROM programa
            WHERE empenho.cd_programa = programa.cd_programa
            AND empenho.remessa = programa.remessa
            AND empenho.ano_empenho = programa.exercicio
            AND empenho.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_projativ_empenho(int $remessa) {
    info('Preenchendo nm_projativ em empenho...');
    $sql = <<<SQL
            UPDATE empenho
            SET nm_projativ = projativ.nm_projativ
            FROM projativ
            WHERE empenho.cd_projativ = projativ.cd_projativ
            AND empenho.remessa = projativ.remessa
            AND empenho.ano_empenho = projativ.exercicio
            AND empenho.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function ds_rubrica_empenho(int $remessa) {
    info('Preenchendo ds_rubrica em empenho...');
    $sql = <<<SQL
            UPDATE empenho
            SET ds_rubrica = rubrica.ds_rubrica
            FROM rubrica
            WHERE empenho.cd_rubrica = rubrica.cd_rubrica
            AND empenho.remessa = rubrica.remessa
            AND empenho.ano_empenho = rubrica.exercicio
            AND empenho.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function credor_empenho(int $remessa) {
    info('Preenchendo dados do credor em empenho...');
    $sql = <<<SQL
            UPDATE empenho
            SET nm_credor = credor.nm_credor, cpf_credor = credor.cpf_credor, cnpj_credor = credor.cnpj_credor
            FROM credor
            WHERE empenho.cd_credor = credor.cd_credor
            AND empenho.remessa = credor.remessa
            AND empenho.remessa = $remessa
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function ds_fr_empenho(int $remessa) {
    info('Preenchendo ds_fr em empenho...');
    $sql = <<<SQL
            UPDATE empenho
            SET ds_fr = fontes_recurso.ds_fr
            FROM fontes_recurso
            WHERE empenho.fr = fontes_recurso.fr
            AND empenho.remessa = fontes_recurso.remessa
            AND empenho.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function empenho_liquidacao(int $remessa) {
    info('Preenchendo dados do empenho em liquidacao...');
    $sql = <<<SQL
            UPDATE liquidacao
            SET 
                entidade = empenho.entidade,
                cd_orgao = empenho.cd_orgao,
                nm_orgao = empenho.nm_orgao,
                cd_uniorcam = empenho.cd_uniorcam,
                nm_uniorcam = empenho.nm_uniorcam,
                cd_funcao = empenho.cd_funcao,
                ds_funcao = empenho.ds_funcao,
                cd_subfuncao = empenho.cd_subfuncao,
                ds_subfuncao = empenho.ds_subfuncao,
                cd_programa = empenho.cd_programa,
                nm_programa = empenho.nm_programa,
                cd_projativ = empenho.cd_projativ,
                nm_projativ = empenho.nm_projativ,
                cd_rubrica = empenho.cd_rubrica,
                ds_rubrica = empenho.ds_rubrica,
                cd_credor = empenho.cd_credor,
                nm_credor = empenho.nm_credor,
                cpf_credor = empenho.cpf_credor,
                cnpj_credor = empenho.cnpj_credor,
                cp_despesa = empenho.cp_despesa,
                ds_cp_despesa = empenho.ds_cp_despesa,
                registro_precos = empenho.registro_precos,
                nr_licitacao = empenho.nr_licitacao,
                ano_licitacao = empenho.ano_licitacao,
                cd_forma_contratacao = empenho.cd_forma_contratacao,
                ds_forma_contratacao = empenho.ds_forma_contratacao,
                cd_base_legal = empenho.cd_base_legal,
                ds_base_legal = empenho.ds_base_legal,
                cd_despesa_funcionario = empenho.cd_despesa_funcionario,
                ds_despesa_funcionario = empenho.ds_despesa_funcionario,
                licitacao_compartilhada = empenho.licitacao_compartilhada,
                cnpj_orgao_gerenciador = empenho.cnpj_orgao_gerenciador,
                exercicio_fr = empenho.exercicio_fr,
                ds_exercicio_fr = empenho.ds_exercicio_fr,
                fr = empenho.fr,
                ds_fr = empenho.ds_fr,
                co = empenho.co,
                ds_co = empenho.ds_co,
                cd_detalhe_tce = empenho.cd_detalhe_tce,
                ds_detalhe_tce = empenho.ds_detalhe_tce
            FROM empenho
            WHERE empenho.chave_empenho = liquidacao.chave_empenho
            AND empenho.remessa = liquidacao.remessa
            AND liquidacao.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_conta_contabil_pagamento(int $remessa) {
    info('Preenchendo nm_conta_contabil em pagamento...');
    $sql = <<<SQL
            UPDATE pagamento
            SET 
                nm_conta_contabil_debito = bal_ver.nm_conta_contabil
            FROM bal_ver
            WHERE pagamento.conta_contabil_debito = bal_ver.conta_contabil
            AND pagamento.remessa = bal_ver.remessa
            AND pagamento.remessa = $remessa
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
    $sql = <<<SQL
            UPDATE pagamento
            SET 
                nm_conta_contabil_credito = bal_ver.nm_conta_contabil
            FROM bal_ver
            WHERE pagamento.conta_contabil_credito = bal_ver.conta_contabil
            AND pagamento.remessa = bal_ver.remessa
            AND pagamento.remessa = $remessa
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function empenho_pagamento(int $remessa) {
    info('Preenchendo dados do empenho em pagamento...');
    $sql = <<<SQL
            UPDATE pagamento
            SET 
                entidade = empenho.entidade,
                cd_orgao = empenho.cd_orgao,
                nm_orgao = empenho.nm_orgao,
                cd_uniorcam = empenho.cd_uniorcam,
                nm_uniorcam = empenho.nm_uniorcam,
                cd_funcao = empenho.cd_funcao,
                ds_funcao = empenho.ds_funcao,
                cd_subfuncao = empenho.cd_subfuncao,
                ds_subfuncao = empenho.ds_subfuncao,
                cd_programa = empenho.cd_programa,
                nm_programa = empenho.nm_programa,
                cd_projativ = empenho.cd_projativ,
                nm_projativ = empenho.nm_projativ,
                cd_rubrica = empenho.cd_rubrica,
                ds_rubrica = empenho.ds_rubrica,
                cd_credor = empenho.cd_credor,
                nm_credor = empenho.nm_credor,
                cpf_credor = empenho.cpf_credor,
                cnpj_credor = empenho.cnpj_credor,
                cp_despesa = empenho.cp_despesa,
                ds_cp_despesa = empenho.ds_cp_despesa,
                registro_precos = empenho.registro_precos,
                nr_licitacao = empenho.nr_licitacao,
                ano_licitacao = empenho.ano_licitacao,
                cd_forma_contratacao = empenho.cd_forma_contratacao,
                ds_forma_contratacao = empenho.ds_forma_contratacao,
                cd_base_legal = empenho.cd_base_legal,
                ds_base_legal = empenho.ds_base_legal,
                cd_despesa_funcionario = empenho.cd_despesa_funcionario,
                ds_despesa_funcionario = empenho.ds_despesa_funcionario,
                licitacao_compartilhada = empenho.licitacao_compartilhada,
                cnpj_orgao_gerenciador = empenho.cnpj_orgao_gerenciador,
                exercicio_fr = empenho.exercicio_fr,
                ds_exercicio_fr = empenho.ds_exercicio_fr,
                fr = empenho.fr,
                ds_fr = empenho.ds_fr,
                co = empenho.co,
                ds_co = empenho.ds_co,
                cd_detalhe_tce = empenho.cd_detalhe_tce,
                ds_detalhe_tce = empenho.ds_detalhe_tce
            FROM empenho
            WHERE empenho.chave_empenho = pagamento.chave_empenho
            AND empenho.remessa = pagamento.remessa
            AND pagamento.remessa = $remessa
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
    
    $sql = <<<SQL
            UPDATE pagamento
            SET 
                cd_orgao_debito = empenho.cd_orgao,
                nm_orgao_debito = empenho.nm_orgao,
                cd_uniorcam_debito = empenho.cd_uniorcam,
                nm_uniorcam_debito = empenho.nm_uniorcam
            FROM empenho
            WHERE empenho.chave_empenho = pagamento.chave_empenho
            AND empenho.remessa = pagamento.remessa
            AND pagamento.remessa = $remessa
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
    
    $sql = <<<SQL
            UPDATE pagamento
            SET 
                cd_orgao_credito = empenho.cd_orgao,
                nm_orgao_credito = empenho.nm_orgao,
                cd_uniorcam_credito = empenho.cd_uniorcam,
                nm_uniorcam_credito = empenho.nm_uniorcam
            FROM empenho
            WHERE empenho.chave_empenho = pagamento.chave_empenho
            AND empenho.remessa = pagamento.remessa
            AND pagamento.remessa = $remessa
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function ds_fr_bal_ver(int $remessa) {
    info('Preenchendo ds_fr em bal_ver...');
    $sql = <<<SQL
            UPDATE bal_ver
            SET ds_fr = fontes_recurso.ds_fr
            FROM fontes_recurso
            WHERE bal_ver.fr = fontes_recurso.fr
            AND bal_ver.remessa = fontes_recurso.remessa
            AND bal_ver.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_orgao_bal_ver(int $remessa) {
    info('Preenchendo nm_orgao em bal_ver...');
    $sql = <<<SQL
            UPDATE bal_ver
            SET nm_orgao = orgao.nm_orgao
            FROM orgao
            WHERE bal_ver.cd_orgao = orgao.cd_orgao
            AND bal_ver.remessa = orgao.remessa
            AND bal_ver.remessa = $remessa
            SQL;    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_uniorcam_bal_ver(int $remessa) {
    info('Preenchendo nm_uniorcam em bal_ver...');
    $sql = <<<SQL
            UPDATE bal_ver
            SET nm_uniorcam = uniorcam.nm_uniorcam
            FROM uniorcam
            WHERE bal_ver.cd_uniorcam = uniorcam.cd_uniorcam
            AND bal_ver.remessa = uniorcam.remessa
            AND bal_ver.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_orgao_bal_rec(int $remessa) {
    info('Preenchendo nm_orgao em bal_rec...');
    $exercicio = (int) substr($remessa, 0, 4);
    $sql = <<<SQL
            UPDATE bal_rec
            SET nm_orgao = orgao.nm_orgao
            FROM orgao
            WHERE bal_rec.cd_orgao = orgao.cd_orgao
            AND bal_rec.remessa = orgao.remessa
            AND orgao.exercicio = $exercicio;
            AND bal_rec.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_uniorcam_bal_rec(int $remessa) {
    info('Preenchendo nm_uniorcam em bal_rec...');
    $exercicio = (int) substr($remessa, 0, 4);
    $sql = <<<SQL
            UPDATE bal_rec
            SET nm_uniorcam = uniorcam.nm_uniorcam
            FROM uniorcam
            WHERE bal_rec.cd_uniorcam = uniorcam.cd_uniorcam
            AND bal_rec.remessa = uniorcam.remessa
            AND bal_rec.remessa = $remessa
            AND uniorcam.exercicio = $exercicio
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function ds_fr_bal_rec(int $remessa) {
    info('Preenchendo ds_fr em bal_rec...');
    $sql = <<<SQL
            UPDATE bal_rec
            SET ds_fr = fontes_recurso.ds_fr
            FROM fontes_recurso
            WHERE bal_rec.fr = fontes_recurso.fr
            AND bal_rec.remessa = fontes_recurso.remessa
            AND bal_rec.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function ds_receita_receita(int $remessa) {
    info('Preenchendo ds_receita em receita...');
    $sql = <<<SQL
            UPDATE receita
            SET ds_receita = bal_rec.ds_receita
            FROM bal_rec
            WHERE receita.cd_receita = bal_rec.cd_receita
            AND receita.remessa = bal_rec.remessa
            AND receita.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_orgao_receita(int $remessa) {
    info('Preenchendo nm_orgao em receita...');
    $exercicio = (int) substr($remessa, 0, 4);
    $sql = <<<SQL
            UPDATE receita
            SET nm_orgao = orgao.nm_orgao
            FROM orgao
            WHERE receita.cd_orgao = orgao.cd_orgao
            AND receita.remessa = orgao.remessa
            AND receita.remessa = $remessa
            AND orgao.exercicio = $exercicio
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_uniorcam_receita(int $remessa) {
    info('Preenchendo nm_uniorcam em receita...');
    $exercicio = (int) substr($remessa, 0, 4);
    $sql = <<<SQL
            UPDATE receita
            SET nm_uniorcam= uniorcam.nm_uniorcam
            FROM uniorcam
            WHERE receita.cd_uniorcam = uniorcam.cd_uniorcam
            AND receita.remessa = uniorcam.remessa
            AND receita.remessa = $remessa
            AND uniorcam.exercicio = $exercicio
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function ds_fr_receita(int $remessa) {
    info('Preenchendo ds_fr em receita...');
    $sql = <<<SQL
            UPDATE receita
            SET ds_fr = fontes_recurso.ds_fr
            FROM fontes_recurso
            WHERE receita.fr = fontes_recurso.fr
            AND receita.remessa = fontes_recurso.remessa
            AND receita.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_orgao_bal_desp(int $remessa) {
    info('Preenchendo nm_orgao em bal_desp...');
    $exercicio = (int) substr($remessa, 0, 4);
    $sql = <<<SQL
            UPDATE bal_desp
            SET nm_orgao = orgao.nm_orgao
            FROM orgao
            WHERE bal_desp.cd_orgao = orgao.cd_orgao
            AND bal_desp.remessa = orgao.remessa
            AND orgao.exercicio = $exercicio
            AND bal_desp.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_uniorcam_bal_desp(int $remessa) {
    info('Preenchendo nm_uniorcam em bal_desp...');
    $exercicio = (int) substr($remessa, 0, 4);
    $sql = <<<SQL
            UPDATE bal_desp
            SET nm_uniorcam = uniorcam.nm_uniorcam
            FROM uniorcam
            WHERE bal_desp.cd_uniorcam = uniorcam.cd_uniorcam
            AND bal_desp.remessa = uniorcam.remessa
            AND bal_desp.remessa = $remessa
            AND uniorcam.exercicio = $exercicio
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_programa_bal_desp(int $remessa) {
    info('Preenchendo nm_programa em bal_desp...');
    $sql = <<<SQL
            UPDATE bal_desp
            SET nm_programa = programa.nm_programa
            FROM programa
            WHERE bal_desp.cd_programa = programa.cd_programa
            AND bal_desp.remessa = programa.remessa
            AND bal_desp.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_projativ_bal_desp(int $remessa) {
    info('Preenchendo nm_projativ em bal_desp...');
    $sql = <<<SQL
            UPDATE bal_desp
            SET nm_projativ = projativ.nm_projativ
            FROM projativ
            WHERE bal_desp.cd_projativ = projativ.cd_projativ
            AND bal_desp.remessa = projativ.remessa
            AND bal_desp.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function ds_elemento_bal_desp(int $remessa) {
    info('Preenchendo ds_elemento em bal_desp...');
    $exercicio = (int) substr($remessa, 0, 4);
    $sql = <<<SQL
            UPDATE bal_desp
            SET ds_elemento = rubrica.ds_rubrica
            FROM rubrica
            WHERE rubrica.cd_rubrica like concat(bal_desp.cd_elemento, '%')
            AND bal_desp.remessa = rubrica.remessa
            AND rubrica.exercicio = $exercicio
            AND bal_desp.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function ds_fr_bal_desp(int $remessa) {
    info('Preenchendo ds_fr em bal_desp...');
    $sql = <<<SQL
            UPDATE bal_desp
            SET ds_fr = fontes_recurso.ds_fr
            FROM fontes_recurso
            WHERE bal_desp.fr = fontes_recurso.fr
            AND bal_desp.remessa = fontes_recurso.remessa
            AND bal_desp.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_orgao_lancont(int $remessa) {
    info('Preenchendo nm_orgao em lancont...');
    $exercicio = (int) substr($remessa, 0, 4);
    $sql = <<<SQL
            UPDATE lancont
            SET nm_orgao = orgao.nm_orgao
            FROM orgao
            WHERE lancont.cd_orgao = orgao.cd_orgao
            AND lancont.remessa = orgao.remessa
            AND orgao.exercicio = $exercicio
            AND lancont.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_uniorcam_lancont(int $remessa) {
    info('Preenchendo nm_uniorcam em lancont...');
    $exercicio = (int) substr($remessa, 0, 4);
    $sql = <<<SQL
            UPDATE lancont
            SET nm_uniorcam = uniorcam.nm_uniorcam
            FROM uniorcam
            WHERE lancont.cd_uniorcam = uniorcam.cd_uniorcam
            AND lancont.remessa = uniorcam.remessa
            AND lancont.remessa = $remessa
            AND uniorcam.exercicio = $exercicio
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function ds_fr_lancont(int $remessa) {
    info('Preenchendo ds_fr em lancont...');
    $sql = <<<SQL
            UPDATE lancont
            SET ds_fr = fontes_recurso.ds_fr
            FROM fontes_recurso
            WHERE lancont.fr = fontes_recurso.fr
            AND lancont.remessa = fontes_recurso.remessa
            AND lancont.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_conta_contabil_lancont(int $remessa) {
    info('Preenchendo nm_conta_contabil em lancont...');
    $sql = <<<SQL
            UPDATE lancont
            SET 
                nm_conta_contabil = bal_ver.nm_conta_contabil
            FROM bal_ver
            WHERE lancont.conta_contabil = bal_ver.conta_contabil
            AND lancont.remessa = bal_ver.remessa
            AND lancont.remessa = $remessa
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function ds_fr_bver_enc(int $remessa) {
    info('Preenchendo ds_fr em bver_enc...');
    $sql = <<<SQL
            UPDATE bver_enc
            SET ds_fr = fontes_recurso.ds_fr
            FROM fontes_recurso
            WHERE bver_enc.fr = fontes_recurso.fr
            AND bver_enc.remessa = fontes_recurso.remessa
            AND bver_enc.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_orgao_bver_enc(int $remessa) {
    info('Preenchendo nm_orgao em bver_enc...');
    $sql = <<<SQL
            UPDATE bver_enc
            SET nm_orgao = orgao.nm_orgao
            FROM orgao
            WHERE bver_enc.cd_orgao = orgao.cd_orgao
            AND bver_enc.remessa = orgao.remessa
            AND bver_enc.remessa = $remessa
            SQL;    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_uniorcam_bver_enc(int $remessa) {
    info('Preenchendo nm_uniorcam em bver_enc...');
    $sql = <<<SQL
            UPDATE bver_enc
            SET nm_uniorcam = uniorcam.nm_uniorcam
            FROM uniorcam
            WHERE bver_enc.cd_uniorcam = uniorcam.cd_uniorcam
            AND bver_enc.remessa = uniorcam.remessa
            AND bver_enc.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_conta_contabil_rd_extra(int $remessa) {
    info('Preenchendo nm_conta_contabil em rd_extra...');
    $sql = <<<SQL
            UPDATE rd_extra
            SET 
                nm_conta_contabil = bal_ver.nm_conta_contabil
            FROM bal_ver
            WHERE rd_extra.conta_contabil = bal_ver.conta_contabil
            AND rd_extra.remessa = bal_ver.remessa
            AND rd_extra.remessa = $remessa
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_orgao_rd_extra(int $remessa) {
    info('Preenchendo nm_orgao em rd_extra...');
    $sql = <<<SQL
            UPDATE rd_extra
            SET nm_orgao = orgao.nm_orgao
            FROM orgao
            WHERE rd_extra.cd_orgao = orgao.cd_orgao
            AND rd_extra.remessa = orgao.remessa
            AND rd_extra.remessa = $remessa
            SQL;    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function nm_uniorcam_rd_extra(int $remessa) {
    info('Preenchendo nm_uniorcam em rd_extra...');
    $sql = <<<SQL
            UPDATE rd_extra
            SET nm_uniorcam = uniorcam.nm_uniorcam
            FROM uniorcam
            WHERE rd_extra.cd_uniorcam = uniorcam.cd_uniorcam
            AND rd_extra.remessa = uniorcam.remessa
            AND rd_extra.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function ds_fr_rd_extra(int $remessa) {
    info('Preenchendo ds_fr em rd_extra...');
    $sql = <<<SQL
            UPDATE rd_extra
            SET ds_fr = fontes_recurso.ds_fr
            FROM fontes_recurso
            WHERE rd_extra.fr = fontes_recurso.fr
            AND rd_extra.remessa = fontes_recurso.remessa
            AND rd_extra.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function ds_fr_credito(int $remessa) {
    info('Preenchendo ds_fr_credito em creditos...');
    $sql = <<<SQL
            UPDATE creditos
            SET ds_fr_credito = fontes_recurso.ds_fr
            FROM fontes_recurso
            WHERE creditos.fr_credito = fontes_recurso.fr
            AND creditos.remessa = fontes_recurso.remessa
            AND creditos.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function ds_fr_reducao(int $remessa) {
    info('Preenchendo ds_fr_reducao em creditos...');
    $sql = <<<SQL
            UPDATE creditos
            SET ds_fr_reducao = fontes_recurso.ds_fr
            FROM fontes_recurso
            WHERE creditos.fr_reducao = fontes_recurso.fr
            AND creditos.remessa = fontes_recurso.remessa
            AND creditos.remessa = $remessa
            SQL;
    
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function ementario_receita(int $remessa) {
    info('Montando ementário da receita...');
    debug('Criando tabela', ['ementario_receita']);
    $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS ementario_receita
            (
                remessa INTEGER,
                nro TEXT,
                cd_receita TEXT,
                ds_receita TEXT,
                classe_receita TEXT,
                tp_receita INTEGER,
                ds_tp_receita TEXT,
                tp_nivel TEXT,
                nr_nivel INTEGER,
                cd_deducao INTEGER,
                ds_deducao TEXT,
                exercicio_fr INTEGER,
                ds_exercicio_fr TEXT,
                fr INTEGER,
                ds_fr TEXT,
                co INTEGER,
                ds_co TEXT,
                cd_detalhe_tce INTEGER,
                ds_detalhe_tce TEXT
            )
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
    
    debug('Apagando dados antigos', ['ementario_receita']);
    $sql = <<<SQL
            DELETE FROM ementario_receita WHERE remessa = $remessa
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
    
    debug('Inserindo novos dados', ['ementario_receita']);
    $sql = <<<SQL
            INSERT INTO ementario_receita (
                remessa,
                nro,
                cd_receita,
                ds_receita,
                classe_receita,
                tp_receita,
                ds_tp_receita,
                tp_nivel,
                nr_nivel,
                cd_deducao,
                ds_deducao,
                exercicio_fr,
                ds_exercicio_fr,
                fr,
                ds_fr,
                co,
                ds_co,
                cd_detalhe_tce,
                ds_detalhe_tce
            )
            SELECT
                remessa,
                nro,
                cd_receita,
                ds_receita,
                classe_receita,
                tp_receita,
                ds_tp_receita,
                tp_nivel,
                nr_nivel,
                cd_deducao,
                ds_deducao,
                exercicio_fr,
                ds_exercicio_fr,
                fr,
                ds_fr,
                co,
                ds_co,
                cd_detalhe_tce,
                ds_detalhe_tce
            FROM bal_rec o
            WHERE o.remessa = $remessa;
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
    
    debug('Apagando receitas sintéticas', ['bal_rec']);
    $sql = <<<SQL
            DELETE FROM bal_rec WHERE remessa = $remessa AND tp_nivel LIKE 'S'
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
    
    debug('Apagando receitas sintéticas', ['receita']);
    $sql = <<<SQL
            DELETE FROM receita WHERE remessa = $remessa AND tp_nivel LIKE 'S'
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
}

function pcasp(int $remessa) {
    info('Montando pcasp...');
    debug('Criando tabela', ['pcasp']);
    $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS pcasp
            (
                remessa,
                conta_contabil TEXT,
                nm_conta_contabil TEXT,
                tp_nivel TEXT,
                nr_nivel INTEGER,
                escrituravel TEXT,
                natureza_informacao TEXT,
                ds_natureza_informacao TEXT,
                financeiro_permanente TEXT,
                ds_financeiro_permanente TEXT,
                exercicio_fr INTEGER,
                ds_exercicio_fr TEXT,
                fr INTEGER,
                ds_fr TEXT,
                co INTEGER,
                ds_co TEXT,
                cd_detalhe_tce INTEGER,
                ds_detalhe_tce TEXT
            )
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
    
    debug('Apagando dados antigos', ['pcasp']);
    $sql = <<<SQL
            DELETE FROM pcasp WHERE remessa = $remessa
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
    
    debug('Inserindo novos dados', ['pcasp']);
    $sql = <<<SQL
            INSERT INTO pcasp (
                remessa,
                conta_contabil,
                nm_conta_contabil,
                tp_nivel,
                nr_nivel,
                escrituravel,
                natureza_informacao,
                ds_natureza_informacao,
                financeiro_permanente,
                ds_financeiro_permanente,
                exercicio_fr,
                ds_exercicio_fr,
                fr,
                ds_fr,
                co,
                ds_co,
                cd_detalhe_tce,
                ds_detalhe_tce
            )
            SELECT
                remessa,
                conta_contabil,
                nm_conta_contabil,
                tp_nivel,
                nr_nivel,
                escrituravel,
                natureza_informacao,
                ds_natureza_informacao,
                financeiro_permanente,
                ds_financeiro_permanente,
                exercicio_fr,
                ds_exercicio_fr,
                fr,
                ds_fr,
                co,
                ds_co,
                cd_detalhe_tce,
                ds_detalhe_tce
            FROM bal_ver o
            WHERE o.remessa = $remessa;
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
    
    debug('Apagando contas escrituráveis', ['bal_ver']);
    $sql = <<<SQL
            DELETE FROM bal_ver WHERE remessa = $remessa AND escrituravel LIKE 'N'
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
    
    debug('Apagando contas escrituráveis', ['bver_enc']);
    $sql = <<<SQL
            DELETE FROM bver_enc WHERE remessa = $remessa AND escrituravel LIKE 'N'
            SQL;
    $stmt = db()->prepare($sql);
    $stmt->execute();
}
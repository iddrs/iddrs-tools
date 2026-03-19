<?php

namespace pad\converter;

use Coduo\PHPHumanizer\DateTimeHumanizer;
use Coduo\PHPHumanizer\NumberHumanizer;
use DateTimeImmutable;
use function mb_strlen;
use function mb_strtolower;
use function mb_substr;
use function pad\converter\post\credor_empenho;
use function pad\converter\post\ds_elemento_bal_desp;
use function pad\converter\post\ds_fr_bal_desp;
use function pad\converter\post\ds_fr_bal_rec;
use function pad\converter\post\ds_fr_bal_ver;
use function pad\converter\post\ds_fr_bver_enc;
use function pad\converter\post\ds_fr_credito;
use function pad\converter\post\ds_fr_cta_disp;
use function pad\converter\post\ds_fr_empenho;
use function pad\converter\post\ds_fr_lancont;
use function pad\converter\post\ds_fr_rd_extra;
use function pad\converter\post\ds_fr_receita;
use function pad\converter\post\ds_fr_reducao;
use function pad\converter\post\ds_receita_receita;
use function pad\converter\post\ds_rubrica_empenho;
use function pad\converter\post\ementario_receita;
use function pad\converter\post\empenho_liquidacao;
use function pad\converter\post\empenho_pagamento;
use function pad\converter\post\nm_conta_contabil_cta_disp;
use function pad\converter\post\nm_conta_contabil_lancont;
use function pad\converter\post\nm_conta_contabil_pagamento;
use function pad\converter\post\nm_conta_contabil_rd_extra;
use function pad\converter\post\nm_orgao_bal_desp;
use function pad\converter\post\nm_orgao_bal_rec;
use function pad\converter\post\nm_orgao_bal_ver;
use function pad\converter\post\nm_orgao_bver_enc;
use function pad\converter\post\nm_orgao_cta_disp;
use function pad\converter\post\nm_orgao_empenho;
use function pad\converter\post\nm_orgao_lancont;
use function pad\converter\post\nm_orgao_rd_extra;
use function pad\converter\post\nm_orgao_receita;
use function pad\converter\post\nm_orgao_uniorcam;
use function pad\converter\post\nm_programa_bal_desp;
use function pad\converter\post\nm_programa_empenho;
use function pad\converter\post\nm_projativ_bal_desp;
use function pad\converter\post\nm_projativ_empenho;
use function pad\converter\post\nm_uniorcam_bal_desp;
use function pad\converter\post\nm_uniorcam_bal_rec;
use function pad\converter\post\nm_uniorcam_bal_ver;
use function pad\converter\post\nm_uniorcam_bver_enc;
use function pad\converter\post\nm_uniorcam_cta_disp;
use function pad\converter\post\nm_uniorcam_empenho;
use function pad\converter\post\nm_uniorcam_lancont;
use function pad\converter\post\nm_uniorcam_rd_extra;
use function pad\converter\post\nm_uniorcam_receita;
use function pad\converter\post\pcasp;
use function str_starts_with;
use function support\db\db;
use function support\log\debug;
use function support\log\error;
use function support\log\info;
use function support\log\notice;
use function support\log\warning;

function main(string $destiny, array $sources): void {
    $start_time = new DateTimeImmutable();
    notice('Conversão dos *.txt do PAD iniciada...');
    info('Destino:', [$destiny]);
    info('Diretórios dos *.txt:', $sources);

    db("sqlite:$destiny"); //necessário para criar a conexão ao banco de dados

    $files = get_files($sources);

    $dropped = [];
    foreach ($files as $fsource) {
        notice('Processando', [$fsource]);
        $layout = get_layout($fsource);
        if($layout === []) continue;
        create_table($layout);
        $header = process_source_header($fsource);
        $basename = get_basename($fsource);
        if(!key_exists($basename, $dropped)){
            drop_remessa($layout[0], $header['remessa']);
            $dropped[$basename] = true;
        }
        process_source($fsource, $header);
    }
    
    notice('Executando pós processamento...');
    post($header['remessa']);

    notice('Conversão dos *.txt do PAD terminada.');
    $end_time = new DateTimeImmutable();
    info("Tempo decorrido", [DateTimeHumanizer::preciseDifference($start_time, $end_time, 'pt_BR')]);
    info('Memória máxima utilizada', [NumberHumanizer::binarySuffix(memory_get_peak_usage(true))]);
}

function post(int $remessa): void {
    nm_orgao_uniorcam($remessa);
    ds_fr_cta_disp($remessa);
    nm_orgao_cta_disp($remessa);
    nm_uniorcam_cta_disp($remessa);
    nm_conta_contabil_cta_disp($remessa);
    nm_orgao_empenho($remessa);
    nm_uniorcam_empenho($remessa);
    nm_programa_empenho($remessa);
    nm_projativ_empenho($remessa);
    ds_rubrica_empenho($remessa);
    credor_empenho($remessa);
    ds_fr_empenho($remessa);
    empenho_liquidacao($remessa);
    nm_conta_contabil_pagamento($remessa);
    empenho_pagamento($remessa);
    ds_fr_bal_ver($remessa);
    nm_orgao_bal_ver($remessa);
    nm_uniorcam_bal_ver($remessa);
    nm_orgao_bal_rec($remessa);
    nm_uniorcam_bal_rec($remessa);
    ds_fr_bal_rec($remessa);
    ds_receita_receita($remessa);
    nm_orgao_receita($remessa);
    nm_uniorcam_receita($remessa);
    ds_fr_receita($remessa);
    nm_orgao_bal_desp($remessa);
    nm_uniorcam_bal_desp($remessa);
    nm_programa_bal_desp($remessa);
    nm_projativ_bal_desp($remessa);
    ds_elemento_bal_desp($remessa);
    ds_fr_bal_desp($remessa);
    nm_orgao_lancont($remessa);
    nm_uniorcam_lancont($remessa);
    ds_fr_lancont($remessa);
    nm_conta_contabil_lancont($remessa);
    ds_fr_bver_enc($remessa);
    nm_orgao_bver_enc($remessa);
    nm_uniorcam_bver_enc($remessa);
    nm_conta_contabil_rd_extra($remessa);
    nm_orgao_rd_extra($remessa);
    nm_uniorcam_rd_extra($remessa);
    ds_fr_rd_extra($remessa);
    ds_fr_credito($remessa);
    ds_fr_reducao($remessa);
    ementario_receita($remessa);
    pcasp($remessa);
}

function detect_entidade(array $data): array {
    if(!key_exists('entidade', $data)) return $data;//Se não tem campo entidade, não precisa fazer nada
    if(mb_strlen($data['entidade']) > 0) return $data;//Se a entidade já estiver preenchida, só retorna
    
    if(key_exists('cd_orgao', $data)) {//testa pelo código do órgão
        if($data['cd_orgao'] == $_ENV['CD_ORGAO_RPPS']) {
            $data['entidade'] = 'fpsm';
        }else{
            $data['entidade'] = 'pm';
        }
    }elseif (key_exists('fr', $data)) {//testa pelo código da fr
        if($data['fr'] >=800 && $data['fr'] <= 804) {
            $data['entidade'] = 'fpsm';
        }else{
            $data['entidade'] = 'pm';
        }
    }elseif (key_exists('fr_credito', $data)) {//testa pelo código da fr (só para arquivo decreto.txt/tabela creditos
        if($data['fr_credito'] >=800 && $data['fr_credito'] <= 804) {
            $data['entidade'] = 'fpsm';
        }else{
            $data['entidade'] = 'pm';
        }
    }elseif (key_exists('fr_reducao', $data)) {//testa pelo código da fr (só para arquivo decreto.txt/tabela creditos
        if($data['fr_reducao'] >=800 && $data['fr_reducao'] <= 804) {
            $data['entidade'] = 'fpsm';
        }else{
            $data['entidade'] = 'pm';
        }
    }else{
        $data['entidade'] = 'pm';
    }
    return $data;
}

function get_basename(string $fsource): string {
    return basename(mb_strtolower($fsource), '.txt');
}

function get_layout(string $fsource): array {
    $basename = get_basename($fsource);
    
    static $layouts_loaded = [];
    if(key_exists($basename, $layouts_loaded)) {
        debug('Retornando layout previamente carregado', [$basename]);
        return $layouts_loaded[$basename];
    }

    $fnlayout = "\\pad\\converter\\layout\\$basename";
    if (!function_exists($fnlayout)) {
        warning('Nenhum layout encontrado', [$basename]);
        return [];
    }
    debug('Chamando função de layout', [$fnlayout]);
    $layouts_loaded[$basename] = call_user_func($fnlayout);
    return $layouts_loaded[$basename];
}

function process_source(string $fsource, array $header): void {

    $layout = get_layout($fsource);
    
    if($layout === []) return;

    $fhandle = fopen($fsource, 'r');
    if ($fhandle === false) {
        error('Não foi possível abrir o arquivo pra leitura', [$fsource]);
    }
    fgets($fhandle); //... e pula a primeira linha (de cabeçalho).

    debug('Processando linhas', [$fsource]);
    $counter = 0;
    while (!feof($fhandle)) {
        $raw = trim(fgets($fhandle));
        if (str_starts_with(mb_strtolower($raw), 'finalizador')) {
            break;
        }
        $data = parse_row($raw, $header, $layout[1]);
        $data = process_filler($data, $layout[2]);
        write_data($layout[0], $layout[1], $data);
        $counter++;
    }
    info('Linhas inseridas', [$counter]);
    fclose($fhandle);
}

function process_filler(array $data, array $fillers): array {
    
    foreach ($fillers as $f){
        $fnf = "\\pad\\converter\\filler\\$f";
        $data = call_user_func($fnf, $data);
    }
    
    return $data;
}

function drop_remessa(string $table, int $remessa): void {
    debug('Deletando remessa', [$table, $remessa]);
    db()->exec("DELETE FROM $table WHERE remessa = $remessa;");
}

function write_data(string $table, array $fields, array $data): void {
    foreach ($fields as $f){
        $flist[":{$f[0]}"] = $f[0];
        $bind[$f[0]] = $data[$f[0]];
    }
    $fmarkers = join(', ', array_keys($flist));
    $fnames = join(', ', $flist);
    $sql = "INSERT INTO $table ($fnames) VALUES ($fmarkers);";
    $stmt = db()->prepare($sql);
    $stmt->execute($bind);
}

function parse_row(string $raw, array $header, array $fields): array {
    $data = [];
    foreach ($fields as $f) {
        $id = $f[0];
        $start = $f[1];
        $lenght = $f[2];
        $transformers = $f[4];
        if ($id === 'remessa') {
            $value = $header['remessa'];
        }elseif ($id === 'entidade') {
            if($header['cnpj'] === $_ENV['CNPJ_CM']) {
                $value = 'cm';
            } else {
                $value = '';
            }
        } else {
            $value = mb_substr($raw, $start-1, $lenght);
            if (count($transformers) > 0) {
                $value = apply_transformer($value, $transformers);
            }
        }
        $data[$id] = $value;
    }
    $data = detect_entidade($data);
    return $data;
}

function apply_transformer(string $value, array $transformers) {
    foreach ($transformers as $t) {
        $fnt = "\\pad\\converter\\transformer\\$t";
        $value = call_user_func($fnt, $value);
    }
    return $value;
}

function create_table(array $layout): void {
    debug('Criando tabela se não existir', [$layout[0]]);

    foreach ($layout[1] as $col) {
        $col_def[] = "{$col[0]} {$col[3]}";
    }
    $col_def = join(',' . PHP_EOL, $col_def);

    $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS {$layout[0]}
            (
                $col_def
            )
     SQL;

    db()->exec($sql);
}

function process_source_header(string $fsource): array {
    $fhandle = fopen($fsource, 'r');
    if ($fhandle === false) {
        error('Não foi possível abrir o arquivo pra leitura', [$fsource]);
    }
    $raw = fgets($fhandle);
    $data = [
        'cnpj' => mb_substr($raw, 0, 14),
        'remessa' => (int) (mb_substr($raw, 26, 4) . mb_substr($raw, 24, 2)),
    ];
    fclose($fhandle);
    return $data;
}

function get_files(array $sources): array {
    $files = [];
    foreach ($sources as $dir) {
        if (!is_dir($dir)) {
            error('$source não é um diretório e será ignorado', [$dir]);
            exit;
        }
        $files = array_merge($files, glob("$dir*.{txt,TXT}", \GLOB_BRACE));
    }
    debug('Arquivos encontrados', [count($files)]);
    return $files;
}


<?php

namespace contab\tester;

use Coduo\PHPHumanizer\DateTimeHumanizer;
use Coduo\PHPHumanizer\NumberHumanizer;
use DateTimeImmutable;
use PDO;
use Twig\Environment;
use Twig\Extra\Intl\IntlExtension;
use Twig\Loader\FilesystemLoader;
use function support\db\db;
use function support\log\critical;
use function support\log\debug;
use function support\log\emergency;
use function support\log\info;
use function support\log\notice;
use function support\log\warning;

function main(string $dbPath, string $reportPath, int $remessa, string $entidade, string $perfil): void {
    $start_time = new DateTimeImmutable();
    notice('Teste dos registros contábeis iniciado...');
    info('Origem dos dados:', [$dbPath]);
    info('Relatório:', [$reportPath]);
    info('Remessa:', [$remessa]);
    info('Entidade:', [$entidade]);
    info('Perfil:', [$perfil]);
    
    $entidade = get_entidade($entidade);

    db("sqlite:$dbPath"); //necessário para criar a conexão ao banco de dados

    $profile = load_profile($perfil);
    
    $templates = get_template_processor();
    
    $result = [];// armazena o html dos resultados de cada teste.
    $success = 0;//contagem de testes que passam
    run_tests($profile, $remessa, $entidade, $templates, $result, $success);
    
    save_results($templates, $result, $reportPath, $profile, $remessa, $entidade, $success);
    
    notice('Teste dos registros contábeis terminado.');
    
    info('Testes realizados', [count($result)]);
    info('Testes que passaram', [$success, sprintf('%.2f%%', $success / count($result) * 100)]);
    info('Testes que falharam', [count($result) - $success, sprintf('%.2f%%', (count($result) - $success) / count($result) * 100)]);
    
    $end_time = new DateTimeImmutable();
    info("Tempo decorrido", [DateTimeHumanizer::preciseDifference($start_time, $end_time, 'pt_BR')]);
    info('Memória máxima utilizada', [NumberHumanizer::binarySuffix(memory_get_peak_usage(true))]);
}

function load_profile(string $profileName): array {
    notice('Carregando profile', [$profileName]);
    $profile = call_user_func("contab\\tester\\profile\\$profileName");
    debug('Profile carregado', [$profile['title']]);
    debug('Testes neste perfil', [count($profile['tests'])]);
    return $profile;
}

function get_template_processor(): Environment {
    notice('Preparando processador de templates...');
    $loader = new FilesystemLoader(__DIR__.'/templates');
    $twig = new Environment($loader,[
        'autoescape' => false,
    ]);
    $twig->addExtension(new IntlExtension());
    return $twig;
}

function test_name(string $file): string {
    return basename($file, '.php');
}

function run_tests(array $profile, int $remessa, string $entidade, Environment $templates, array &$result, int &$success): void {
    notice('Executando os testes...');
    foreach ($profile['tests'] as $testId) {
        runone($testId, $remessa, $entidade, $templates, $result, $success);
    }
    notice('Execução dos testes finalizada.');
}

function runone(string $testId, int $remessa, string $entidade, Environment $templates, array &$result, int &$success): void {
    $test = require "./app/contab/tester/tests/$testId.php";
    $testResult = $test($remessa, $entidade, $templates, $result);
    if($testResult) {
        info($testId, ['PASSOU']);
        $success++;
    } else {
        critical($testId, ['FALHOU']);
    }
}

function save_results(Environment $templates, array $result, string $filepath, array $profile, int $remessa, string $entidade, int $success): void {
    notice('Salvando resultados', [$filepath]);
    
    $total = count($profile['tests']);
    $fail = $total - $success;
    
    $html = $templates->render('report.twig', [
        'testResults' => $result,
        'title' => $profile['title'],
        'entidade' => $entidade,
        'remessa' => $remessa,
        'total_tests' => $total,
        'tests_success' => $success,
        'tests_fail' => $fail,
    ]);
    file_put_contents($filepath, $html);
}

function get_value_for_test(string $sql): float {
    $stmt = db()->query($sql);
    return (float) $stmt->fetch(PDO::FETCH_NUM)[0];
}

function get_entidade(string $entidade): string {
    switch (strtolower($entidade)){
        case 'pm':
            return 'pm';
        case 'cm':
            return 'cm';
        case 'fpsm':
        case 'rpps':
            return 'fpsm';
        case 'mun':
        case 'agregado':
            return '%';
        default :
            emergency('Entidade inválida!', [$entidade]);
            warning('Entidades permitidas', ['pm', 'cm', 'fpsm|rpps', 'mun|agregado']);
            exit;
    }
}

function get_valor_manual(string $entidade, int $remessa, string $key): float {
    $filepath = __DIR__."/store/manual/$remessa/$entidade.php";
    $data = require $filepath;
    return $data[$key];
}
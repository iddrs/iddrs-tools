<?php

namespace support\db;

use PDO;
use function support\log\debug;
use function support\log\emergency;

function db(?string $dsn = null): PDO {
    static $pdo = null;
    if (is_null($pdo)) {
        debug('Conectado ao banco de dados...', [$dsn]);
        if (is_null($dsn)) {
            emergency('DSN para conexão ao banco de dados de destino não pode ser nulo.');
            exit;
        }
        $pdo = new PDO($dsn);
    }
    return $pdo;
}

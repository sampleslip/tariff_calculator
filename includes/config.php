<?php
function parseEnv($filePath) {
    if (!file_exists($filePath)) {
        throw new Exception('.env file not found');
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $config = [];

    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0 || strpos(trim($line), ';') === 0) {
            continue;
        }

        $line = trim($line);
        if (empty($line)) {
            continue;
        }

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        if (preg_match('/^[A-Z_]+$/', $name)) {
            $config[$name] = $value;
        }
    }

    return $config;
}

function loadConfig() {
    $env = parseEnv(dirname(__DIR__) . '/.env');

    return [
        'regionLimits' => array_map('intval', explode(',', $env['REGION_LIMITS'])),
        'fuelPrices' => [
            'petrol' => (int)$env['PETROL_PRICE'],
            'gas' => (int)$env['GAS_PRICE'],
            'diesel' => (int)$env['DIESEL_PRICE']
        ],
        'tariffs' => [
            'petrol' => json_decode($env['PETROL_TARIFFS'], true),
            'gas' => json_decode($env['GAS_TARIFFS'], true),
            'diesel' => json_decode($env['DIESEL_TARIFFS'], true)
        ],
        'promosConfig' => json_decode($env['PROMOS_CONFIG'], true),
        'brandTypes' => json_decode($env['BRAND_TYPES'], true)
    ];
}
?>
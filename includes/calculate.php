<?php
header('Content-Type: application/json');

require_once 'config.php';

try {
    $config = loadConfig();

    $region = intval($_POST['region'] ?? 1);
    $pump = intval($_POST['pump'] ?? 100);
    $fuelType = $_POST['fuelType'] ?? 'petrol';
    $brand = $_POST['brand'] ?? '';
    $services = $_POST['services'] ?? [];
    $promoDiscount = floatval($_POST['promo'] ?? 0);

    if (!isset($config['regionLimits'][$region-1])) {
        throw new Exception('Invalid region');
    }

    if ($pump < 1 || $pump > $config['regionLimits'][$region-1]) {
        throw new Exception('Invalid pump volume');
    }

    if (!isset($config['fuelPrices'][$fuelType])) {
        throw new Exception('Invalid fuel type');
    }

    if (!empty($brand) && !in_array($fuelType, $config['brandTypes'][$brand] ?? [])) {
        throw new Exception('Brand doesn\'t support this fuel type');
    }

    $currentTariff = null;
    foreach ($config['tariffs'][$fuelType] as $tariff) {
        if ($pump <= $tariff['max']) {
            $currentTariff = $tariff;
            break;
        }
    }

    if (!$currentTariff) {
        throw new Exception('Failed to determine tariff');
    }

    $availablePromos = $config['promosConfig'][$currentTariff['name']]['values'] ?? [];
    $defaultPromo = $config['promosConfig'][$currentTariff['name']]['default'] ?? '';

    if ($promoDiscount > 0 && !in_array($promoDiscount, $availablePromos)) {
        $promoDiscount = 0;
    }

    $price = $config['fuelPrices'][$fuelType];
    $baseCost = $price * $pump;
    $tariffSave = $baseCost * $currentTariff['discount'] / 100;
    $promoSave = $baseCost * $promoDiscount / 100;
    $totalCost = $baseCost - $tariffSave - $promoSave;
    $totalSave = $tariffSave + $promoSave;
    $totalDiscount = $currentTariff['discount'] + $promoDiscount;

    $response = [
        'success' => true,
        'tariff' => $currentTariff,
        'availablePromos' => $availablePromos,
        'defaultPromo' => $defaultPromo,
        'monthlyCost' => (int)$totalCost,
        'totalDiscount' => $totalDiscount,
        'monthlySave' => (int)$totalSave,
        'yearlySave' => (int)($totalSave * 12)
    ];

} catch (Exception $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>
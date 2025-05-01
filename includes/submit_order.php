<?php

header('Content-Type: application/json');

$errors = [];
$response = ['success' => false];

try {
    $data = json_decode(file_get_contents('php://input'), true) ?? $_POST;

    $formData = $data['formData'] ?? [];
    $calculatorData = $data['calculatorData'] ?? [];

    $inn = $formData['inn'] ?? '';
    $phone = $formData['phone'] ?? '';
    $email = $formData['email'] ?? '';
    $tariff = $calculatorData['tariff'] ?? '';


    if (!preg_match('/^\d{12}$/', $inn)) {
        $errors['inn'] = 'ИНН должен содержать ровно 12 цифр';
    }

    if (!preg_match('/^\d{11}$/', $phone)) {
        $errors['phone'] = 'Телефон должен содержать ровно 11 цифр';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Введите корректный email';
    }

    if (!empty($errors)) {
        $response['errors'] = $errors;
        throw new Exception('Проверьте введенные данные');
    }

    $subject = 'Новая заявка на тариф ' . $tariff;

    $services = is_array($calculatorData['services'] ?? null)
        ? implode(', ', $calculatorData['services'])
        : '';

    $message = "
        <h1>Новая заявка на топливную карту</h1>
        
        <h2>Контактные данные:</h2>
        <p><strong>ИНН:</strong> $inn</p>
        <p><strong>Телефон:</strong> $phone</p>
        <p><strong>Email:</strong> $email</p>
        
        <h2>Выбранный тариф:</h2>
        <p><strong>Тариф:</strong> $tariff</p>
        
        <h2>Параметры расчета:</h2>
        <p><strong>Регион:</strong> " . urldecode($calculatorData['region'] ?? '') . "</p>
        <p><strong>Прокачка:</strong> " . ($calculatorData['pump'] ?? '') . " тонн</p>
        <p><strong>Тип топлива:</strong> " . ($calculatorData['fuelType'] ?? '') . "</p>
        <p><strong>Бренд:</strong> " . ($calculatorData['brand'] ?? '') . "</p>
        <p><strong>Услуги:</strong> $services</p>
        <p><strong>Промо-акция:</strong> " . urldecode($calculatorData['promo'] ?? '') . "</p>
        
        <h2>Экономия:</h2>
        <p><strong>Стоимость в месяц:</strong> " . str_replace('+', ' ', $calculatorData['monthlyCost'] ?? '') . "</p>
        <p><strong>Скидка:</strong> " . ($calculatorData['totalDiscount'] ?? '') . "</p>
        <p><strong>Экономия в месяц:</strong> " . str_replace('+', ' ', $calculatorData['monthlySave'] ?? '') . "</p>
        <p><strong>Экономия в год:</strong> " . str_replace('+', ' ', $calculatorData['yearlySave'] ?? '') . "</p>
        
        <p><em>Заявка получена: " . ($calculatorData['timestamp'] ?? date('Y-m-d H:i:s')) . "</em></p>
    ";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: no-reply@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    $to = "$email";

    $mailSent = mail($to, $subject, $message, $headers);

    $logMessage = $mailSent
        ? "Email sent successfully to $to"
        : "Failed to send email to $to";

    file_put_contents('order_log.txt', date('Y-m-d H:i:s') . " - $logMessage\n\n", FILE_APPEND);

    if (!$mailSent) {
        throw new Exception('Ошибка при отправке письма');
    }

    $response['success'] = true;
    $response['message'] = 'Спасибо! Успешно отправлено.';

} catch (Exception $e) {
    file_put_contents('order_log.txt', date('Y-m-d H:i:s') . " - Error: " . $e->getMessage() . "\n\n", FILE_APPEND);
    $response['message'] = $e->getMessage();
}

file_put_contents('order_log.txt', date('Y-m-d H:i:s') . " - Response:\n" . print_r($response, true) . "\n\n", FILE_APPEND);

echo json_encode($response, JSON_UNESCAPED_UNICODE);
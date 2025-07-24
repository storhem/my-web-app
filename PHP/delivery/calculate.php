<?php
header('Content-Type: application/json; charset=utf-8');

$city = $_POST['city'] ?? '';
$weight = $_POST['weight'] ?? '';

if (empty($city)) {
    echo json_encode(["price" => 0, "message" => "Не передан город доставки", "status" => "error"]);
    exit;
}

if (empty($weight) || !is_numeric($weight) || $weight <= 0) {
    echo json_encode(["price" => 0, "message" => "Укажите корректный вес", "status" => "error"]);
    exit;
}

// Простейшая фиктивная формула: 100 руб. за кг
$pricePerKg = 100;
$total = $pricePerKg * $weight;

echo json_encode([
    "price" => $total,
    "message" => "Стоимость доставки в город $city составит $total руб.",
    "status" => "OK"
], JSON_UNESCAPED_UNICODE);

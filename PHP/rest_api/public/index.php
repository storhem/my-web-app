<?php

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

$filepath = __DIR__ . '/../data/products.json';

// Загрузка данных из JSON
function loadProducts($filepath) {
    if (!file_exists($filepath)) return [];
    return json_decode(file_get_contents($filepath), true);
}

// Сохранение в JSON
function saveProducts($filepath, $products) {
    file_put_contents($filepath, json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// Получаем ID из URI
$id = $uri[2] ?? null;

if ($uri[0] !== 'api' || $uri[1] !== 'products') {
    http_response_code(404);
    echo json_encode(["error" => "Not Found"]);
    exit;
}

$products = loadProducts($filepath);

// Маршруты
switch ($method) {
    case 'GET':
        if ($id) {
            foreach ($products as $product) {
                if ($product['id'] == $id) {
                    echo json_encode($product, JSON_UNESCAPED_UNICODE);
                    exit;
                }
            }
            http_response_code(404);
            echo json_encode(["error" => "Товар не найден"]);
        } else {
            echo json_encode($products, JSON_UNESCAPED_UNICODE);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['name']) || !isset($data['price'])) {
            http_response_code(400);
            echo json_encode(["error" => "Недостаточно данных"]);
            exit;
        }
        $newId = count($products) ? max(array_column($products, 'id')) + 1 : 1;
        $data['id'] = $newId;
        $products[] = $data;
        saveProducts($filepath, $products);
        http_response_code(201);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        break;

    case 'PUT':
        if (!$id) {
            http_response_code(400);
            echo json_encode(["error" => "Не указан ID"]);
            exit;
        }
        $data = json_decode(file_get_contents("php://input"), true);
        $updated = false;
        foreach ($products as &$product) {
            if ($product['id'] == $id) {
                $product['name'] = $data['name'] ?? $product['name'];
                $product['price'] = $data['price'] ?? $product['price'];
                $updated = true;
                break;
            }
        }
        if ($updated) {
            saveProducts($filepath, $products);
            echo json_encode(["message" => "Товар обновлен"], JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Товар не найден"]);
        }
        break;

    case 'DELETE':
        if (!$id) {
            http_response_code(400);
            echo json_encode(["error" => "Не указан ID"]);
            exit;
        }
        $index = array_search($id, array_column($products, 'id'));
        if ($index !== false) {
            array_splice($products, $index, 1);
            saveProducts($filepath, $products);
            echo json_encode(["message" => "Товар удален"], JSON_UNESCAPED_UNICODE);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Товар не найден"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Метод не поддерживается"]);
}

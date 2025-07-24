<?php
header('Content-Type: application/json; charset=utf-8');

$fakeCities = [
    "Москва",
    "Санкт-Петербург",
    "Новосибирск",
    "Екатеринбург",
    "Казань",
    "Нижний Новгород",
    "Челябинск",
    "Самара",
    "Омск",
    "Ростов-на-Дону"
];

echo json_encode($fakeCities, JSON_UNESCAPED_UNICODE);

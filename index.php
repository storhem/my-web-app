<?php
$dataFile = 'data.json';

// Чтение праздников
$events = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];

// Добавление нового события
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $date = $_POST['date'] ?? '';

    if ($title && $date) {
        $events[] = ['title' => $title, 'date' => $date];
        file_put_contents($dataFile, json_encode($events, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Напоминалка о праздниках</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>Ближайшие события</h1>
    <ul>
        <?php foreach ($events as $event): ?>
            <li>
                <strong><?= htmlspecialchars($event['title']) ?></strong>
                — <?= date('d.m.Y', strtotime($event['date'])) ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <h2>Добавить событие</h2>
    <form method="post">
        <input type="text" name="title" placeholder="Название события" required>
        <input type="date" name="date" required>
        <button type="submit">Добавить</button>
    </form>
</div>

<script src="js/script.js"></script>
</body>
</html>

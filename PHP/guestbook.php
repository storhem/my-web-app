<?php
$file = 'guestbook.csv';

// Если форма отправлена
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $message = trim($_POST['message']);

    // Добавляем только если сообщение не пустое
    if (!empty($message)) {
        if ($name === '') {
            $name = 'Анонимно';
        }

        $date = date('d.m.Y H:i');
        $entry = [$date, htmlspecialchars($name), htmlspecialchars($message)];

        // Запись в CSV
        $f = fopen($file, 'a');
        fputcsv($f, $entry, ';', '"', '\\'); // исправлено
        fclose($f);
    }
}

// Читаем все записи
$messages = [];
if (file_exists($file)) {
    $f = fopen($file, 'r');
    while (($data = fgetcsv($f, 1000, ';', '"', '\\')) !== false) { // исправлено
        $messages[] = $data;
    }
    fclose($f);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 700px; margin: 20px auto; }
        h2 { margin-bottom: 10px; }
        .msg { border: 1px solid #333; padding: 10px; margin: 10px 0; border-radius: 4px; }
        .meta { font-size: 12px; color: #555; display: flex; justify-content: space-between; margin-bottom: 5px; }
        form { margin-top: 20px; }
        input, textarea { width: 100%; padding: 8px; margin-bottom: 10px; font-size: 14px; }
        textarea { height: 80px; resize: none; }
        button { padding: 8px 16px; font-size: 14px; cursor: pointer; }
    </style>
</head>
<body>
<h2>Гостевая книга</h2>
<p>Оставьте свой комментарий:</p>
<hr>

<?php if (!empty($messages)): ?>
    <?php foreach (array_reverse($messages) as $m): ?>
        <div class="msg">
            <div class="meta">
                <span><?= htmlspecialchars($m[0]) ?></span>
                <span><?= htmlspecialchars($m[1]) ?></span>
            </div>
            <p><?= nl2br(htmlspecialchars($m[2])) ?></p>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Сообщений пока нет. Будьте первым!</p>
<?php endif; ?>

<hr>
<form method="post">
    <input type="text" name="name" placeholder="Имя">
    <textarea name="message" placeholder="Ваше сообщение" required></textarea>
    <button type="submit">Отправить</button>
</form>
</body>
</html>

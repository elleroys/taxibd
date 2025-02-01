<?php
$host = 'localhost';      // Хост бази даних
$dbname = 'taxiserv';     // Назва бази даних
$username = 'root';       // Ім'я користувача бази даних
$password = '';           // Пароль користувача бази даних

try {
    // Підключення до бази даних через PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Включення режиму винятків
} catch (PDOException $e) {
    die("Помилка підключення до бази даних: " . $e->getMessage());
}
?>
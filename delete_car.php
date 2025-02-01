<?php
require '../config.php';

if (!isset($_GET['id'])) {
    header("Location: cars.php");
    exit;
}

$car_id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM cars WHERE car_id = ?");
    $stmt->execute([$car_id]);
    header("Location: cars.php");
    exit;
} catch (PDOException $e) {
    die("Помилка при видаленні клієнта: " . $e->getMessage());
}
?>
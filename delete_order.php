<?php
require '../config.php';

if (!isset($_GET['id'])) {
    header("Location: orders.php");
    exit;
}

$order_id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM orders WHERE order_id = ?");
    $stmt->execute([$order_id]);
    header("Location: orders.php");
    exit;
} catch (PDOException $e) {
    die("Помилка при видаленні клієнта: " . $e->getMessage());
}
?>
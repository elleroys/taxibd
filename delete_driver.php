<?php
require '../config.php';

if (!isset($_GET['id'])) {
    header("Location: drivers.php");
    exit;
}

$driver_id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM drivers WHERE driver_id = ?");
    $stmt->execute([$driver_id]);
    header("Location: drivers.php");
    exit;
} catch (PDOException $e) {
    die("Помилка при видаленні клієнта: " . $e->getMessage());
}
?>
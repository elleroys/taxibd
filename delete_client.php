<?php
require '../config.php';

if (!isset($_GET['id'])) {
    header("Location: clients.php");
    exit;
}

$client_id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM clients WHERE client_id = ?");
    $stmt->execute([$client_id]);
    header("Location: clients.php");
    exit;
} catch (PDOException $e) {
    die("Помилка при видаленні клієнта: " . $e->getMessage());
}
?>
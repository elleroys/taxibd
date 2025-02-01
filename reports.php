<?php
require '../bs/header.php';
require '../config.php';

// Звіт про кількість клієнтів
$stmt = $pdo->query("SELECT COUNT(*) AS total_clients FROM clients");
$total_clients = $stmt->fetch(PDO::FETCH_ASSOC);

// Звіт про кількість замовлень
$stmt = $pdo->query("SELECT COUNT(*) AS total_orders FROM orders");
$total_orders = $stmt->fetch(PDO::FETCH_ASSOC);

// Звіт про середній рейтинг водіїв
$stmt = $pdo->query("SELECT AVG(driver_rating) AS avg_rating FROM drivers");
$avg_rating = $stmt->fetch(PDO::FETCH_ASSOC);
?>

    <h2>Звіти</h2>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title">Кількість клієнтів</h5>
        </div>
        <div class="card-body">
            <p class="card-text">Загальна кількість клієнтів: <strong><?= $total_clients['total_clients'] ?></strong></p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title">Кількість замовлень</h5>
        </div>
        <div class="card-body">
            <p class="card-text">Загальна кількість замовлень: <strong><?= $total_orders['total_orders'] ?></strong></p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title">Середній рейтинг водіїв</h5>
        </div>
        <div class="card-body">
            <p class="card-text">Середній рейтинг: <strong><?= number_format($avg_rating['avg_rating'], 2) ?></strong></p>
        </div>
    </div>

<?php require '../bs/footer.php'; ?>
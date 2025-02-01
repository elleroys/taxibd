<?php
require '../bs/header.php';
require '../config.php';

// Перегляд списку замовлень
$stmt = $pdo->query("SELECT * FROM orders");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <h2>Замовлення</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Клієнт</th>
            <th>Водій</th>
            <th>Автомобіль</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $order['order_id'] ?></td>
                <td><?= $order['client_id'] ?></td>
                <td><?= $order['driver_id'] ?></td>
                <td><?= $order['car_id'] ?></td>
                <td>
                    <a href="edit_order.php?id=<?= $order['order_id'] ?>" class="btn btn-warning btn-sm">Редагувати</a>
                    <a href="delete_order.php?id=<?= $order['order_id'] ?>" class="btn btn-danger btn-sm">Видалити</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="add_order.php" class="btn btn-success">Додати замовлення</a>

<?php require '../bs/footer.php'; ?>
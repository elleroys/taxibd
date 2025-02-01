<?php
require '../bs/header.php';
require '../config.php';

// Перегляд списку водіїв
$stmt = $pdo->query("SELECT * FROM drivers");
$drivers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <h2>Водії</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Ім'я</th>
            <th>Ліцензія</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($drivers as $driver): ?>
            <tr>
                <td><?= $driver['driver_id'] ?></td>
                <td><?= $driver['first_name'] ?></td>
                <td><?= $driver['license_number'] ?></td>
                <td>
                    <a href="edit_driver.php?id=<?= $driver['driver_id'] ?>" class="btn btn-warning btn-sm">Редагувати</a>
                    <a href="delete_driver.php?id=<?= $driver['driver_id'] ?>" class="btn btn-danger btn-sm">Видалити</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="add_driver.php" class="btn btn-success">Додати водія</a>

<?php require '../bs/footer.php'; ?>
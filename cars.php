<?php
require '../bs/header.php';
require '../config.php';

// Перегляд списку автомобілів
$stmt = $pdo->query("SELECT * FROM cars");
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <h2>Автомобілі</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Модель</th>
            <th>Марка</th>
            <th>Номерний знак</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cars as $car): ?>
            <tr>
                <td><?= $car['car_id'] ?></td>
                <td><?= $car['model'] ?></td>
                <td><?= $car['brand'] ?></td>
                <td><?= $car['license_plate'] ?></td>
                <td>
                    <a href="edit_car.php?id=<?= $car['car_id'] ?>" class="btn btn-warning btn-sm">Редагувати</a>
                    <a href="delete_car.php?id=<?= $car['car_id'] ?>" class="btn btn-danger btn-sm">Видалити</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="add_car.php" class="btn btn-success">Додати автомобіль</a>

<?php require '../bs/footer.php'; ?>
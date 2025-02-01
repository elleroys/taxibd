<?php
require '../bs/header.php';
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_id = $_POST['client_id'];
    $driver_id = $_POST['driver_id'];
    $car_id = $_POST['car_id'];

    $stmt = $pdo->prepare("INSERT INTO orders (client_id, driver_id, car_id) VALUES (?, ?, ?)");
    $stmt->execute([$client_id, $driver_id, $car_id]);
    header("Location: orders.php");
    exit;
}
?>

    <h2>Додати замовлення</h2>
    <form method="POST" class="mb-4">
        <div class="mb-3">
            <label for="client_id" class="form-label">Клієнт ID</label>
            <input type="text" name="client_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="driver_id" class="form-label">Водій ID</label>
            <input type="text" name="driver_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="car_id" class="form-label">Автомобіль ID</label>
            <input type="text" name="car_id" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>

<?php require '../bs/footer.php'; ?>
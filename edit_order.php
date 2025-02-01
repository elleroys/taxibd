<?php
require '../bs/header.php';
require '../config.php';

// Перевірка, чи передано ID замовлення
if (!isset($_GET['id'])) {
    header("Location: orders.php");
    exit;
}

$order_id = $_GET['id'];

// Отримання даних замовлення для заповнення форми
$stmt = $pdo->prepare("SELECT * FROM orders WHERE order_id = ?");
$stmt->execute([$order_id]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$order) {
    die("Замовлення не знайдено.");
}

// Отримання списку клієнтів, водіїв та автомобілів для випадаючих списків
$clients = $pdo->query("SELECT client_id, first_name, last_name FROM clients")->fetchAll(PDO::FETCH_ASSOC);
$drivers = $pdo->query("SELECT driver_id, first_name, last_name FROM drivers")->fetchAll(PDO::FETCH_ASSOC);
$cars = $pdo->query("SELECT car_id, brand, model FROM cars")->fetchAll(PDO::FETCH_ASSOC);

// Обробка форми оновлення
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_id = $_POST['client_id'];
    $driver_id = $_POST['driver_id'];
    $car_id = $_POST['car_id'];
    $departure_point = $_POST['departure_point'];
    $destination_point = $_POST['destination_point'];
    $distance_km = $_POST['distance_km'];
    $luggage_count = $_POST['luggage_count'];
    $luggage_size = $_POST['luggage_size'];
    $trip_cost = $_POST['trip_cost'];
    $order_status = $_POST['order_status'];

    // Оновлення даних замовлення
    $stmt = $pdo->prepare("UPDATE orders SET client_id = ?, driver_id = ?, car_id = ?, departure_point = ?, destination_point = ?, distance_km = ?, luggage_count = ?, luggage_size = ?, trip_cost = ?, order_status = ? WHERE order_id = ?");
    $stmt->execute([$client_id, $driver_id, $car_id, $departure_point, $destination_point, $distance_km, $luggage_count, $luggage_size, $trip_cost, $order_status, $order_id]);

    // Перенаправлення на сторінку замовлень
    header("Location: orders.php");
    exit;
}
?>

    <h2>Редагувати замовлення</h2>
    <form method="POST" class="mb-4">
        <div class="mb-3">
            <label for="client_id" class="form-label">Клієнт</label>
            <select name="client_id" class="form-control" required>
                <?php foreach ($clients as $client): ?>
                    <option value="<?= $client['client_id'] ?>" <?= $client['client_id'] == $order['client_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($client['first_name'] . ' ' . $client['last_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="driver_id" class="form-label">Водій</label>
            <select name="driver_id" class="form-control" required>
                <?php foreach ($drivers as $driver): ?>
                    <option value="<?= $driver['driver_id'] ?>" <?= $driver['driver_id'] == $order['driver_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($driver['first_name'] . ' ' . $driver['last_name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="car_id" class="form-label">Автомобіль</label>
            <select name="car_id" class="form-control" required>
                <?php foreach ($cars as $car): ?>
                    <option value="<?= $car['car_id'] ?>" <?= $car['car_id'] == $order['car_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($car['brand'] . ' ' . $car['model']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="departure_point" class="form-label">Місце відправлення</label>
            <input type="text" name="departure_point" class="form-control" value="<?= htmlspecialchars($order['departure_point']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="destination_point" class="form-label">Місце призначення</label>
            <input type="text" name="destination_point" class="form-control" value="<?= htmlspecialchars($order['destination_point']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="distance_km" class="form-label">Відстань (км)</label>
            <input type="number" name="distance_km" class="form-control" value="<?= htmlspecialchars($order['distance_km']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="luggage_count" class="form-label">Кількість багажу</label>
            <input type="number" name="luggage_count" class="form-control" value="<?= htmlspecialchars($order['luggage_count']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="luggage_size" class="form-label">Розмір багажу</label>
            <input type="text" name="luggage_size" class="form-control" value="<?= htmlspecialchars($order['luggage_size']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="trip_cost" class="form-label">Вартість поїздки</label>
            <input type="number" name="trip_cost" class="form-control" value="<?= htmlspecialchars($order['trip_cost']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="order_status" class="form-label">Статус замовлення</label>
            <select name="order_status" class="form-control" required>
                <option value="Pending" <?= $order['order_status'] == 'Pending' ? 'selected' : '' ?>>Очікує</option>
                <option value="Completed" <?= $order['order_status'] == 'Completed' ? 'selected' : '' ?>>Завершено</option>
                <option value="Cancelled" <?= $order['order_status'] == 'Cancelled' ? 'selected' : '' ?>>Скасовано</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Оновити</button>
        <a href="orders.php" class="btn btn-secondary">Скасувати</a>
    </form>

<?php require '../bs/footer.php'; ?>
<?php
require '../bs/header.php';
require '../config.php';

// Перевірка, чи передано ID клієнта
if (!isset($_GET['id'])) {
    header("Location: cars.php");
    exit;
}

$car_id = $_GET['id'];

// Отримання даних клієнта для заповнення форми
$stmt = $pdo->prepare("SELECT * FROM cars WHERE car_id = ?");
$stmt->execute([$car_id]);
$car = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$car) {
    die("Клієнт не знайдений.");
}

// Обробка форми оновлення
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $license_plate = $_POST['license_plate'];
    $color = $_POST['color'];

    // Оновлення даних клієнта
    $stmt = $pdo->prepare("UPDATE clients SET license_plate = ? ,$color = ? WHERE car_id = ?");
    $stmt->execute([$license_plate, $color]);

    // Перенаправлення на сторінку клієнтів
    header("Location: clients.php");
    exit;
}
?>

    <h2>Редагувати клієнта</h2>
    <form method="POST" class="mb-4">
        <div class="mb-3">
            <label for="first_name" class="form-label">Номер</label>
            <input type="text" name="first_name" class="form-control" value="<?= htmlspecialchars($car['license_plate']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Колір</label>
            <input type="text" name="last_name" class="form-control" value="<?= htmlspecialchars($car['color']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Оновити</button>
        <a href="clients.php" class="btn btn-secondary">Скасувати</a>
    </form>

<?php require '../bs/footer.php'; ?>
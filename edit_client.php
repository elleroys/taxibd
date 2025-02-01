<?php
require '../bs/header.php';
require '../config.php';

// Перевірка, чи передано ID клієнта
if (!isset($_GET['id'])) {
    header("Location: clients.php");
    exit;
}

$client_id = $_GET['id'];

// Отримання даних клієнта для заповнення форми
$stmt = $pdo->prepare("SELECT * FROM clients WHERE client_id = ?");
$stmt->execute([$client_id]);
$client = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$client) {
    die("Клієнт не знайдений.");
}

// Обробка форми оновлення
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    // Оновлення даних клієнта
    $stmt = $pdo->prepare("UPDATE clients SET first_name = ?, last_name = ?, phone_number = ?, email = ? WHERE client_id = ?");
    $stmt->execute([$first_name, $last_name, $phone_number, $email, $client_id]);

    // Перенаправлення на сторінку клієнтів
    header("Location: clients.php");
    exit;
}
?>

    <h2>Редагувати клієнта</h2>
    <form method="POST" class="mb-4">
        <div class="mb-3">
            <label for="first_name" class="form-label">Ім'я</label>
            <input type="text" name="first_name" class="form-control" value="<?= htmlspecialchars($client['first_name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Прізвище</label>
            <input type="text" name="last_name" class="form-control" value="<?= htmlspecialchars($client['last_name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Телефон</label>
            <input type="text" name="phone_number" class="form-control" value="<?= htmlspecialchars($client['phone_number']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($client['email']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Оновити</button>
        <a href="clients.php" class="btn btn-secondary">Скасувати</a>
    </form>

<?php require '../bs/footer.php'; ?>
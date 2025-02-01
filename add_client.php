<?php
require '../bs/header.php';
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("INSERT INTO clients (first_name, last_name, phone_number, email) VALUES (?, ?, ?, ?)");
    $stmt->execute([$first_name, $last_name, $phone_number, $email]);
    header("Location: clients.php");
    exit;
}
?>

    <h2>Додати клієнта</h2>
    <form method="POST" class="mb-4">
        <div class="mb-3">
            <label for="first_name" class="form-label">Ім'я</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Прізвище</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Телефон</label>
            <input type="text" name="phone_number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>

<?php require '../bs/footer.php'; ?>
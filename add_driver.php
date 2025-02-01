<?php
require '../bs/header.php';
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $license = $_POST['license'];

    $stmt = $pdo->prepare("INSERT INTO drivers (name, license) VALUES (?, ?)");
    $stmt->execute([$name, $license]);
    header("Location: drivers.php");
    exit;
}
?>

    <h2>Додати водія</h2>
    <form method="POST" class="mb-4">
        <div class="mb-3">
            <label for="name" class="form-label">Ім'я</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="license" class="form-label">Ліцензія</label>
            <input type="text" name="license" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>

<?php require '../bs/footer.php'; ?>
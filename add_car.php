<?php
require '../bs/header.php';
require '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $model = $_POST['model'];
    $year = $_POST['year'];
    $plate = $_POST['plate'];

    $stmt = $pdo->prepare("INSERT INTO cars (model, year, plate) VALUES (?, ?, ?)");
    $stmt->execute([$model, $year, $plate]);
    header("Location: cars.php");
    exit;
}
?>

    <h2>Додати автомобіль</h2>
    <form method="POST" class="mb-4">
        <div class="mb-3">
            <label for="model" class="form-label">Модель</label>
            <input type="text" name="model" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Рік</label>
            <input type="text" name="year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="plate" class="form-label">Номерний знак</label>
            <input type="text" name="plate" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>

<?php require '../bs/footer.php'; ?>
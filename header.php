<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Адмін-панель</title>
    <!-- Підключення Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Адмін-панель</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="../orders/orders.php">Замовлення</a></li>
                <li class="nav-item"><a class="nav-link" href="../clients/clients.php">Клієнти</a></li>
                <li class="nav-item"><a class="nav-link" href="../drivers/drivers.php">Водії</a></li>
                <li class="nav-item"><a class="nav-link" href="../cars/cars.php">Автомобілі</a></li>
                <li class="nav-item"><a class="nav-link" href="../reports/reports.php">Звіти</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-4">
<?php
require '../bs/header.php';
require '../config.php';

// Отримання списку клієнтів
$stmt = $pdo->query("SELECT * FROM clients");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <h2>Клієнти</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Ім'я</th>
            <th>Прізвище</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Дата реєстрації</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= htmlspecialchars($client['client_id']) ?></td>
                <td><?= htmlspecialchars($client['first_name']) ?></td>
                <td><?= htmlspecialchars($client['last_name']) ?></td>
                <td><?= htmlspecialchars($client['phone_number']) ?></td>
                <td><?= htmlspecialchars($client['email']) ?></td>
                <td><?= htmlspecialchars($client['registration_date']) ?></td>
                <td>
                    <a href="edit_client.php?id=<?= $client['client_id'] ?>" class="btn btn-warning btn-sm">Редагувати</a>
                    <a href="delete_client.php?id=<?= $client['client_id'] ?>" class="btn btn-danger btn-sm">Видалити</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="add_client.php" class="btn btn-success">Додати клієнта</a>

<?php require '../bs/footer.php'; ?>
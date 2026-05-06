<?php
declare(strict_types=1);

require_once('db.php');

$pdo = getConnection();

$getData = $pdo->query('SELECT 
     loans.id, clients.name, clients.last_name, 
     loans.amount, loans.interest, loans.term_days, 
     loans.status, loans.created_at
     FROM loans
     JOIN clients ON loans.client_id = clients.id
     ORDER BY loans.created_at DESC'
);

$loans = $getData->fetchAll();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LoansList</title>
</head>
<body>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Client</th>
        <th>Amount</th>
        <th>Percentage</th>
        <th>Need to pay</th>
        <th>Term</th>
        <th>Status</th>
        <th>Date</th>
    </tr>

    <?php foreach ($loans as $loan): ?>
        <tr>
            <td><?= $loan['id'] ?></td>
            <td><?= $loan['name'] . ' ' . $loan['last_name'] ?></td>
            <td><?= $loan['amount'] ?></td>
            <td><?= $loan['interest'] ?>%</td>
            <td><?= round($loan['amount'] * (1 + $loan['interest'] / 100), 2) ?></td>
            <td><?= $loan['term_days'] ?></td>
            <td><?= $loan['status'] ?></td>
            <td><?= $loan['created_at'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>

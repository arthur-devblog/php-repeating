<?php
declare(strict_types=1);

require_once 'db.php';

$pdo = getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $client_id = $_POST['client_id'];
    $amount = $_POST['amount'];
    $interest = $_POST['interest'];
    $term_days = $_POST['term_days'];

    $insert = $pdo->prepare('INSERT INTO loans (client_id, amount, interest, term_days)
    VALUES (:client_id, :amount, :interest, :term_days)');

    $insert->execute([
       'client_id' => $client_id,
       'amount' => $amount,
       'interest' => $interest,
       'term_days' => $term_days
    ]);
    echo "Loan added";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loans</title>
</head>
<body>
<form method="POST" action="addLoan.php">
    <input type="number" name="client_id" placeholder="Client ID">
    <input type="number" name="amount"    placeholder="Loan amount">
    <input type="number" name="interest"  placeholder="Percentage">
    <input type="number" name="term_days" placeholder="term in days">
    <button type="submit">Add loan</button>
</form>
</body>
</html>

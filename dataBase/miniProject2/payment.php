<?php
declare(strict_types=1);

require_once ('db.php');

$pdo = getConnection();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $loan_id = $_POST['loan_id'];
    $amount = $_POST['amount'];

    try {
        $pdo->beginTransaction();

        $update1 = $pdo->prepare("INSERT INTO payments (loan_id, amount) VALUES (:loan_id, :amount)");
        $update1->execute([':loan_id' => $loan_id, ':amount' => $amount]);

        $update2 = $pdo->prepare("UPDATE loans SET status = 'paid' WHERE id = :loan_id");
        $update2->execute([':loan_id' => $loan_id, ':amount' => $amount]);

        $pdo->commit();

    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
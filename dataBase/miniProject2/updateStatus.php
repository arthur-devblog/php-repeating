<?php
declare(strict_types=1);

require_once('db.php');
$pdo = getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $loan_id = $_POST['loan_id'];
    $status = $_POST['status'];

    $allowedStatus = ['pending', 'approved', 'rejected', 'paid'];
    if (!in_array($status, $allowedStatus)) {
        echo "Invalid status";
        exit();
    }

    $update = $pdo->prepare("UPDATE loans SET status = :status WHERE id = :id");
    $update->execute([':status' => $status, ':id' => $loan_id]);
    echo "Status updated";
}
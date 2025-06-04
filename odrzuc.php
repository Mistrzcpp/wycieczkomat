<?php
include "./partial/db-connection.php";
@session_start();
$docId = $_POST['id'][0];
/*
$stmt = $conn->prepare("SELECT status FROM wnioski w WHERE w.id = :docId");
$stmt->bindParam(":docId", $docId);
try {
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'error';
}*/

$stmt = $conn->prepare("UPDATE wnioski w SET status = 1 WHERE w.id = :docId");
$stmt->bindParam(":docId", $docId);


try {
    $stmt->execute();
    echo 'ok';
} catch (PDOException $e) {
    echo 'error';
}

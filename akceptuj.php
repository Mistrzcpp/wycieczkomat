<?php
include "./partial/db-connection.php";
@session_start();
$docId = $_POST['id'][0];



if (!empty($_SESSION['dyrektor'])) {
    $id = 5;
} else if (!empty($_SESSION['sekretariat'])) {
    $id = 4;
} else if (!empty($_SESSION['kadry'])) {
    $id = 3;
} else if (!empty($_SESSION['nauczyciel'])) {
    $id = 2;
}

$stmt = $conn->prepare("UPDATE wnioski w SET status = :id WHERE w.id = :docId");
$stmt->bindParam(":id", $id);
$stmt->bindParam(":docId", $docId);


try {
    $stmt->execute();
    echo 'ok';
} catch (PDOException $e) {
    echo 'error';
}

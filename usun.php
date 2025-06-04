<?php
    include "./partial/db-connection.php"; 
    $id = $_POST['id'][0];
    $query = "DELETE FROM wnioski WHERE id = {$id}";
    $stmt = $conn -> prepare($query);
    try{
        $stmt -> execute();
        header("Location: usunieto.php");
    }catch (PDOException $e){
        header("Location: blad.php");
    }
?>
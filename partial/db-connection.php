<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=wycieczkomat", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e){
        header("Location: blad.php");
        exit();
    }
?>
<?php
    include "./partial/db-connection.php";
    if(isset($_GET['id'])){
        $docId = $_GET['id'];
    }
    else{
        header("Location: ./blad.php");
    }
    $userId = $_SESSION['user_id'];
    $query = "
        SELECT 
            w.id,
            w.telefon,
            w.klasa,
            w.liczba_uczniow,
            w.miejsce,
            w.program,
            w.cel,
            w.korzysci,
            w.informacje_dodatkowe,
            concat(u.imie, \" \", u.nazwisko) kierownik,
            date_format(w.data_od, '%Y-%m-%d') dataOd, 
            date_format(w.data_od, '%H:%i') godzinaOd,
            date_format(w.data_do, '%Y-%m-%d') dataDo, 
            date_format(w.data_do, '%H:%i') godzinaDo,
            (SELECT group_concat(cel_id SEPARATOR ' ') FROM wybrane_cele wc WHERE wc.wniosek_id = w.id) cele,
            (SELECT group_concat(forma_id SEPARATOR ' ') FROM wybrane_formy wf WHERE wf.wniosek_id = w.id) formy,
            (SELECT group_concat(concat(u.imie, \" \", u.nazwisko) SEPARATOR \", \") FROM opiekunowie o JOIN uzytkownicy u ON u.id = o.uzytkownik_id WHERE o.wniosek_id = w.id ) opiekunowie
        FROM wnioski w 
        JOIN uzytkownicy u ON u.id = w.kierownik_id
        WHERE w.kierownik_id = {$userId} AND w.id = {$docId}";
    $stmt = $conn -> prepare($query);
    try{
        $stmt -> execute();
        $result = $stmt -> fetch(PDO::FETCH_ASSOC);
        $stmt = $conn -> prepare("SELECT opis FROM cele_wycieczki");
        $stmt -> execute();
        $cele = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        $stmt = $conn -> prepare("SELECT opis FROM formy_wycieczki");
        $stmt -> execute();
        $formy = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        header("Location: ./blad.php");
    }
    if(empty($result)){
        header("Location: ./blad.php");
    }
    $wybraneFormy = explode(" ", $result['formy']);
    $formyArr = [];
    foreach($formy as $index => $f){
        if(in_array($index+1, $wybraneFormy)){
            $prefix =  "■ ";
        }
        else{
            $prefix = "☐ ";
        }
        array_push($formyArr, "<span class=\"formy\">{$prefix}".$f["opis"]."</span>");
    }
    $wybraneCele = explode(" ", $result['cele']);
    $celeArr = [];
    foreach($cele as $index => $c){
        if(in_array($index+1, $wybraneCele)){
            $prefix =  "■ ";
        }
        else{
            $prefix = "☐ ";
        }
        array_push($celeArr, "<span class=\"cele\">{$prefix}".$c["opis"]."</span>");
    }

    
?>
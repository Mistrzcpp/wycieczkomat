<?php
    session_start();
    include './partial/db-connection.php';
    $name = $_POST['name'];
    if(!strlen($name) == 0){
        $sql = "SELECT  u.id, u.imie, u.nazwisko FROM uzytkownicy u WHERE concat_ws(' ', u.imie, u.nazwisko) LIKE '%".$name."%' LIMIT 10";
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
    }
    else{
        exit;
    }
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $r){
        echo '<button type="button" class="btn btn-outline-secondary my-2 mx-1 names" id="'.$r['id'].'">'.$r['imie'].' '.$r['nazwisko'].'</button>';
    }    
?>
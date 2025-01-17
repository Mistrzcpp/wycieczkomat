<?php
    include "./partial/db-connection.php";
    @session_start();
    $search = trim($_POST['search']);
    if(strlen($search) > 0){
        $whereClause = "w.data_zmiany_statusu LIKE '%{$search}%' OR
        w.data_utworzenia LIKE '%{$search}%' OR
        w.telefon LIKE '%{$search}%' OR
        w.klasa LIKE '%{$search}%' OR
        w.liczba_uczniow LIKE '%{$search}%' OR
        w.data_od LIKE '%{$search}%' OR
        w.data_do LIKE '%{$search}%' OR
        w.miejsce LIKE '%{$search}%' OR
        w.program LIKE '%{$search}%' OR
        w.cel LIKE '%{$search}%' OR
        w.korzysci LIKE '%{$search}%' OR
        w.informacje_dodatkowe LIKE '%{$search}%' OR
        (SELECT group_concat(opis SEPARATOR ' ')
        FROM wybrane_cele wc
        JOIN cele_wycieczki cw ON cw.id = wc.cel_id
        WHERE wc.wniosek_id = w.id 
        ) LIKE '%{$search}%' OR
        (SELECT group_concat(opis SEPARATOR ' ')
        FROM wybrane_formy wf 
        JOIN formy_wycieczki fw ON fw.id = wf.forma_id
        WHERE wf.wniosek_id = w.id 
        ) LIKE '%{$search}%'";
    }
    else{
        $id = $_SESSION['user_id'];
        $whereClause = "w.kierownik_id = {$id}";
    }
    $query = 
        "SELECT 
            w.id,
            w.data_zmiany_statusu,
            w.data_utworzenia,
            w.telefon,
            w.klasa,
            w.liczba_uczniow,
            w.data_od,
            w.data_do,
            w.miejsce,
            w.program,
            w.cel,
            w.korzysci,
            w.informacje_dodatkowe
            ,(SELECT GROUP_CONCAT(CONCAT(u.imie, ' ', u.nazwisko) SEPARATOR ' ')
            FROM opiekunowie o 
            JOIN uzytkownicy u ON u.id = o.uzytkownik_id
            WHERE o.wniosek_id = w.id 
            ) AS opiekunowie
            ,(SELECT group_concat(opis SEPARATOR ' ')
            FROM wybrane_cele wc
            JOIN cele_wycieczki cw ON cw.id = wc.cel_id
            WHERE wc.wniosek_id = w.id 
            ) AS wybrane_cele
            ,(SELECT group_concat(opis SEPARATOR ' ')
            FROM wybrane_formy wf 
            JOIN formy_wycieczki fw ON fw.id = wf.forma_id
            WHERE wf.wniosek_id = w.id 
            ) AS wybrane_formy
        FROM wnioski w 
        WHERE {$whereClause}
        ORDER BY w.data_utworzenia DESC";
    
    $stmt = $conn -> prepare($query);
    try{
        $stmt -> execute();
    }catch(PDOException $e){
        header("Location: blad.php");
    }
    
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    if(empty($result)){
        echo "<center><p>Brak wniosków</p></center>";
        exit();
    }
    $colorsArr = ["#fbe7c6", "#b4f8c8", "#a0e7e5", "#ffaebc", "#d4f1f4", "#75e6da"];
    foreach($result as $r){
        $id = $r['id'];
        $dest = $r['miejsce'];
        $dateFrom = $r['data_od'];
        $class = $r['klasa'];
        $color = $colorsArr[array_rand($colorsArr)];
        echo "
            <div class=\"shadow rounded col-12 col-sm-6 col-md-4 col-lg-3 m-2 pulse shine p-3 d-flex flex-column trip\" style=\"background-color: {$color} !important\" id=\"{$id}\">
                <span class=\"tripHeader\">{$dest}</span>
                <span>{$dateFrom}</span>
                <span>{$class}</span>
                <div>
                    <button type=\"button\" class=\"btn btn-primary p-2\">Podgląd</button>
                    <button type=\"button\" class=\"btn btn-primary p-2\">Edytuj</button>
                </div>
            </div> 
        ";
    }
?>
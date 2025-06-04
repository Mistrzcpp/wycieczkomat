<?php
include "./partial/db-connection.php";
@session_start();
$search = trim($_POST['search']);
$id = $_SESSION['user_id'];
if (strlen($search) > 0) {
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
        ) LIKE '%{$search}%' OR
        u.imie LIKE '%{$search}%' OR
        u.nazwisko LIKE '%{$search}%'";
} else {
    $whereClause = "1=1";
}
$query =
    "SELECT 
            w.id,
            w.status,
            w.data_zmiany_statusu,
            w.data_utworzenia,
            w.telefon,
            w.klasa,
            w.liczba_uczniow,
            w.data_od,
            w.data_do,
            w.godzina_od,
            w.godzina_do,
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
        JOIN uzytkownicy u ON u.id = w.kierownik_id
        WHERE {$whereClause}
        ORDER BY w.data_utworzenia DESC";

$stmt = $conn->prepare($query);
try {
    $stmt->execute();
} catch (PDOException $e) {
    header("Location: blad.php");
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (empty($result)) {
    echo "<center><p>Brak wniosków</p></center>";
    exit();
}
//$colorsArr = ["#fbe7c6", "#b4f8c8", "#a0e7e5", "#ffaebc", "#d4f1f4", "#75e6da"];
foreach ($result as $r) {
    $id = $r['id'];
    $dest = $r['miejsce'];
    $dateFrom = explode(" ", $r['data_od']);
    $date = $dateFrom[0];
    $hour = $r['godzina_od'];
    if ($date == "0000-00-00") $date = "";
    if (is_null($hour)) $hour = "";
    $class = $r['klasa'];
    //$color = $colorsArr[array_rand($colorsArr)];
    $status = $r['status'];
    if ($status == 1) {
        $color = "#a0e7e5";
    } else if ($status == 2 || $status == 3 || $status == 4) {
        $color = "#ffea61";
    } else if ($status == 5) {
        $color = "#41ab5d";
    } else if ($status == 6) {
        $color = "#ff7f7f";
    } else {
        $color = "#ffffff";
    }
    echo "
            <div class=\"col-md-6 col-lg-3\">
                <div class=\"shadow rounded m-2 pulse shine p-3 d-flex flex-column trip\" style=\"background-color: {$color} !important\" id=\"{$id}\">
                    <div class=\"headerDiv\">
                        <p class=\"tripHeader\">{$dest}</p>
                    </div>
                    <div class=\"tripMain\">
                        <div>
                            <span>Data:</span>
                            <span>{$date}</span>
                        </div>
                        <div>
                            <span>Godzina:</span>
                            <span>{$hour}</span>
                        </div>
                        <div>
                            <span>Klasa:</span>
                            <span>{$class}</span>
                        </div>
                    </div>
                </div> 
            </div>
        ";
}

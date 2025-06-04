<?php
include "./partial/header.php";
include "./podglad-backend.php";
?>
<link id="page-css" rel="stylesheet" href="./assets/podglad.css">
<link id="pdf-css" href="assets/pdf.css" rel="stylesheet" type="text/css" disabled>

<main class="row m-0" id="main">
    <div class="rounded mx-0 mt-3 p-3 col-lg-8 " id="page">
        <div class="m-0 row d-flex justify-content-center">
            <div class="m-0 p-0 col-lg-10 d-flex" id="header">
                <div>
                    <span id="wniosek">WNIOSEK - WYCIECZKA</span>
                </div>
                <div>
                    <img class="szkola" src="./img/sp311.png">
                    <img class="szkola" src="./img/lo11.png">
                    <img class="szkola" src="./img/tie9.png">
                </div>
            </div>
            <table class="col-lg-10">
                <tr>
                    <th id="kierownikTh">Kierownik wycieczki/<br>telefon</th>
                    <td colspan="5" id="kierownik"><?php echo $result["kierownik"] . " tel. " . $result["telefon"] ?></td>
                </tr>
                <tr>
                    <th id="klasaTh">Klasa</th>
                    <th id="liczbaTh">Liczba uczniów</th>
                    <th id="dataTh">Data wycieczki</th>
                    <th id="godzinyTh">Godziny</th>
                    <th id="miejsceTh">Miejsce docelowe wycieczki</th>
                </tr>
                <tr>
                    <td id="klasa"><?php echo $result['klasa'] ?></td>
                    <td id="liczbaUczniow"><?php echo $result['liczba_uczniow'] ?></td>
                    <td id="data">
                        <?php
                        echo "<span>" . str_replace("-", ".", $result['dataOd']) . " </span><span>" . str_replace("-", ".", $result['dataDo'] . "</span>")
                        ?></td>
                    <td id="godzina"><?php echo $result['godzina_od'] . $result['godzina_do'] ?></td>
                    <td id="miejsce"><?php echo $result['miejsce'] ?></td>
                </tr>
                <tr>
                    <th id="opiekunowieTh">Proponowani opiekunowie<br>(imiona i nazwiska<br>nauczycieli)</th>
                    <td colspan="5" id="opiekunowie"><?php echo $result['opiekunowie'] ?></td>
                </tr>
                <tr>
                    <th id="programTh">Program wycieczki</th>
                    <td colspan="5" id="program"><?php echo $result['program'] ?></td>
                </tr>
                <tr>
                    <th id="celOpisTh">Cel wycieczki (opis)</th>
                    <td colspan="5" id="celOpis"><?php echo $result['cel'] ?></td>
                </tr>
                <tr>
                    <th id="korzysciTh">Przewidywane korzyści i osiągnięcia uczniów</th>
                    <td colspan="5" id="korzysci"><?php echo $result['korzysci'] ?></td>
                </tr>
                <tr id="break"></tr>
                <tr>
                    <th id="celTh">Cel wycieczki</th>
                    <td colspan="5" id="cel">
                        <div><?php foreach ($celeArr as $c) echo $c ?></div>
                    </td>
                </tr>
                <tr>
                    <th id="formaTh">Forma wycieczki</th>
                    <td colspan="5" id="forma">
                        <div><?php foreach ($formyArr as $f) echo $f ?></div>
                    </td>
                </tr>
                <tr>
                    <th id="infTh">Informacje dodatkowe<br>(w przypdaku<br>wycieczki wyjazdowej)</th>
                    <td colspan="5" id="informacje"><?php echo $result['informacje_dodatkowe'] ?></td>
                </tr>
            </table>
            <div class="d-flex mx-0 px-0 col-lg-10 " id="footer">
                <div class="d-flex flex-column" id="kierownikFooter">
                    <span>Data i podpis kierownika wycieczki</span>
                    <span class="kropki">...................................................................................</span>
                </div>
                <div class="d-flex flex-column" id="zgodaFooter">
                    <span>Wyrażam zgodę</span>
                    <span class="kropki">...................................................................................</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3 mt-3">
        <div class="rounded d-flex flex-column justify-content-center pt-4 px-2" id="sideBar">
            <?php
            if ((!empty($_SESSION['dyrektor']) && !empty($_SESSION['nauczyciel'])) && $result['kierownik_id'] == $_SESSION['user_id']) {
                echo '<button type="button" class="btn btn-success" id="akceptuj">Akceptuj</button>';
                echo '<button type="button" class="btn btn-primary" id="edytuj">Edytuj</button>';
                echo '<button type="button" class="btn btn-danger" id="odrzuc">Odrzuć</button>';
                echo '<button type="button" class="btn btn-danger" id="usun">Usuń</button>';
            } else if (!empty($_SESSION['dyrektor'])) {
                if ($result['status'] != 7) {
                    echo '<button type="button" class="btn btn-success" id="akceptuj">Akceptuj</button>';
                    echo '<button type="button" class="btn btn-danger" id="odrzuc">Odrzuć</button>';
                } else {
                    echo '<button type="button" class="btn btn-danger" id="odrzuc">Odrzuć</button>';
                }
            } else if (!empty($_SESSION['sekretariat'])) {
                if ($result['status'] == 3) {
                    echo '<button type="button" class="btn btn-success" id="akceptuj">Akceptuj</button>';
                    echo '<button type="button" class="btn btn-danger" id="odrzuc">Odrzuć</button>';
                } else {
                    echo '<button type="button" class="btn btn-danger" id="odrzuc">Odrzuć</button>';
                }
            } else if (!empty($_SESSION['kadry'])) {
                if ($result['status'] == 2) {
                    echo '<button type="button" class="btn btn-success" id="akceptuj">Akceptuj</button>';
                    echo '<button type="button" class="btn btn-danger" id="odrzuc">Odrzuć</button>';
                } else {
                    echo '<button type="button" class="btn btn-danger" id="odrzuc">Odrzuć</button>';
                }
            } else if (!empty($_SESSION['nauczyciel'])) {
                if ($result['status'] == 1) {
                    echo '<button type="button" class="btn btn-success" id="akceptuj">Akceptuj</button>';
                    echo '<button type="button" class="btn btn-primary" id="edytuj">Edytuj</button>';
                    echo '<button type="button" class="btn btn-danger" id="usun">Usuń</button>';
                } else {
                    echo '<button type="button" class="btn btn-danger" id="usun">Usuń</button>';
                }
            }
            ?>
            <button type="button" class="btn btn-warning" id="drukuj">Drukuj</button>

        </div>
    </div>
</main>
<script src="./assets/podglad.js">
    <?php include "./partial/footer.php" ?>
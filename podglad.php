<?php 
    include "./partial/header.php";
    include "./podglad-backend.php";
?>
<link rel="stylesheet" href="./assets/podglad.css">
<main class="row d-flex align-items-center m-0 flex-column">
    <div class="rounded mx-0 mt-3 p-3 col-lg-8 row d-flex justify-content-center" id="page">
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
                <td colspan="5" id="kierownik"><?php echo $result["kierownik"]." tel. ".$result["telefon"]?></td>
            </tr>
            <tr>
                <th id="klasaTh">Klasa</th>
                <th id="liczbaTh">Liczba uczniów</th>
                <th id="dataTh">Data wycieczki</th>
                <th id="godzinyTh">Godziny</th>
                <th id="miejsceTh">Miejsce docelowe wycieczki</th>
            </tr>
            <tr>
                <td id="klasa"><?php echo $result['klasa']." ".$result['szkola'] ?></td>
                <td id="liczbaUczniow"><?php echo $result['liczba_uczniow'] ?></td>
                <td id="data">
                    <?php 
                        echo "<span>".str_replace("-",".",$result['dataOd'])." </span><span>".str_replace("-",".",$result['dataDo']."</span>")
                    ?></td>
                <td id="godzina"><?php echo $result['godzinaOd'].$result['godzinaDo']?></td>
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
            <tr>
                <th id="celTh">Cel wycieczki</th>
                <td colspan="5" id="cel"><div><?php foreach($celeArr as $c) echo $c?></div></td>
            </tr>
            <tr>
                <th id="formaTh">Forma wycieczki</th>
                <td colspan="5" id="forma"><div><?php foreach($formyArr as $f) echo $f?></div></td>
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
</main>
<script src="./assets/podglad.js">
<?php include "./partial/footer.php"?>
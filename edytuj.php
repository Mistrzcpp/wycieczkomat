<?php include "./podglad-backend.php"; ?>
<link id="page-css" rel="stylesheet" href="dodaj-wniosek.css">
<link id="page-css" rel="stylesheet" href="./assets/podglad.css">

<main class="row m-0" id="main">
    <div class="rounded mx-0 mt-3 p-3 col-lg-8" id="page">
        <form action="edit.php" method="POST">
            <?php echo '<input name="docId" type="hidden" value="' . $_POST['id'][0] . '">' ?>
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
                        <td colspan="5" id="kierowniktd">
                            <?php echo '<input type="text" class="input-field" id="kierownik" placeholder="Imie i nazwisko" value="' . $_SESSION['name'] . ' ' . $_SESSION['surname'] . '"disabled/>' ?>
                            <?php echo '<input type="text" name="telefon" class="input-field" id="telefon" placeholder="Telefon" maxlength="9" value="' . $result['telefon'] . '">' ?>
                        </td>
                    </tr>
                    <tr>
                        <th id="klasaTh">Klasa</th>
                        <th id="liczbaTh">Liczba uczniów</th>
                        <th id="dataTh">Data wycieczki</th>
                        <th id="godzinyTh">Godziny</th>
                        <th id="miejsceTh">Miejsce docelowe wycieczki</th>
                    </tr>
                    <tr>
                        <td id="klasa">
                            <?php echo '<input type="text" name="klasa" class="input-field" placeholder="Wpisz klasę" value="' . $result['klasa'] . '">' ?>
                        </td>
                        <td id="liczbaUczniow">
                            <?php echo '<input type="number" name="liczbaUczniow" class="input-field" min="0" placeholder="..." value="' . $result['liczba_uczniow'] . '">' ?>
                        </td>
                        <td id="data">
                            <?php echo '<input type="date" name="dataOd" class="input-field" value="' . substr($result['dataOd'], 0, 10) . '">' ?>
                            <p>do</p>
                            <?php echo '<input type="date" name="dataDo" class="input-field" value="' . substr($result['dataDo'], 0, 10) . '">' ?>
                        </td>
                        <td id="godzina">
                            <?php echo '<input type="time" name="godzinaOd" class="input-field" value="' . substr($result['godzina_od'], 0, 5) . '">' ?>
                            <p>do</p>
                            <?php echo '<input type="time" name="godzinaDo" class="input-field" value="' . substr($result['godzina_do'], 0, 5) . '">' ?>
                        </td>
                        <td id="miejsce">
                            <?php echo '<input type="text" name="miejsce" class="input-field" placeholder="Miejsce wycieczki" value="' . $result['miejsce'] . '">' ?>
                        </td>
                    </tr>
                    <tr>
                        <th id="opiekunowieTh">Proponowani opiekunowie<br>(imiona i nazwiska<br>nauczycieli)</th>
                        <td colspan="5">
                            <?php echo '<input type="hidden" id="OpiekunowieId" name="OpiekunowieId" value="' . $result["opiekunowieId"] . '">' ?>
                            <?php echo '<input type="text" id="opiekunowie" name="opiekunowie" class="input-field" placeholder="Imiona i nazwiska opiekunów" data-bs-toggle="modal" data-bs-target="#exampleModal" value="' . $result['opiekunowie'] . '" readonly>' ?>
                        </td>
                    </tr>
                    <tr>
                        <th id="programTh">Program wycieczki</th>
                        <td colspan="5" id="program">
                            <?php echo '<textarea name="program" class="input-field" placeholder="Opis programu wycieczki">' . $result['program'] . '</textarea>' ?>
                        </td>
                    </tr>
                    <tr>
                        <th id="celOpisTh">Cel wycieczki (opis)</th>
                        <td colspan="5" id="celOpis">
                            <?php echo '<textarea name="celOpis" class="input-field" placeholder="Opis celu wycieczki">' . $result['cel'] . '</textarea>' ?>
                        </td>
                    </tr>
                    <tr>
                        <th id="korzysciTh">Przewidywane korzyści i osiągnięcia uczniów</th>
                        <td colspan="5" id="korzysci">
                            <?php echo '<textarea name="korzysci" class="input-field" placeholder="Korzyści i osiągnięcia uczniów">' . $result['korzysci'] . '</textarea>' ?>
                        </td>
                    </tr>
                    <tr>
                        <th id="celTh">Cel wycieczki</th>
                        <td colspan="5" id="cel">
                            <ul class="mt-2 list-group">
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="c1" name="c1">
                                    <label class="form-check-label" for="c1">Poznawanie kraju, jego środowiska przyrodniczego, tradycji, zabytków kultury i historii</label>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="c2" name="c2">
                                    <label class="form-check-label" for="c2">Poznawanie kultury i języka innych państw</label>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="c3" name="c3">
                                    <label class="form-check-label" for="c3">Poszerzanie wiedzy z różnych dziedzin życia społecznego, gospodarczego i kulturalnego</label>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="c4" name="c4">
                                    <label class="form-check-label" for="c4">Wspomaganie rodziny i szkoły w procesie wychowania</label>
                                </li>
                                <li class="list-group-item d-flex">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="c5" name="c5">
                                    <label style="margin-left: 4px;" class="form-check-label" for="c5">Upowszechnienie wśród uczniów zasad ochrony środowiska naturalnego oraz wiedzy o składnikach i funkcjonowaniu rodzimego środowiska przyrodniczego, a także umiejętności korzystania z zasobów przyrody</label>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="c6" name="c6">
                                    <label class="form-check-label" for="c6">Upowszechnianie zdrowego stylu życia i aktywności fizycznej oraz podnoszenie sprawności fizycznej</label>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="c7" name="c7">
                                    <label class="form-check-label" for="c7">Poprawę stanu zdrowia uczniów pochodzących z terenów zagrożonych ekologicznie</label>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="c8" name="c8">
                                    <label class="form-check-label" for="c8">Przeciwdziałanie zachowaniom ryzykownym, w szczególności w ramach profilaktyki uniwersalnej</label>
                                </li>
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="c9" name="c9">
                                    <label class="form-check-label" for="c9">Poznawanie zasad bezpiecznego zachowania się w różnych sytuacjach</label>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th id="formaTh">Forma wycieczki</th>
                        <td colspan="5" id="forma">
                            <ul class="mt-2 list-group">
                                <li class="list-group-item d-flex">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="f1" name="f1">
                                    <label style="margin-left: 4px;" class="form-check-label" for="f1"><b>Wycieczki przedmiotowe</b> - inicjowane i realizowane przez nauczycieli w celu uzupełnienia obowiązującego programu nauczania, w ramach jednego lub kilku przedmiotów</label>
                                </li>
                                <li class="list-group-item d-flex">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="f2" name="f2">
                                    <label style="margin-left: 4px;" class="form-check-label" for="f2"><b>Wycieczki krajoznawczo-turystyczne</b> - w których udział nie wymaga od uczniów przygotowania kondycyjnego i umiejętności posługiwania się specjalistycznym sprzętem, organizowanych w celu nabywania wiedzy o otaczającym środowisku i umiejętności zastosowania tej wiedzy w praktyce</label>
                                </li>
                                <li class="list-group-item d-flex">
                                    <input class="form-check-input me-1" type="checkbox" value="" id="f3" name="f3">
                                    <label style="margin-left: 4px;" class="form-check-label" for="f3"><b>Specjalistyczne wycieczki krajoznawczo-turystyczne</b> - w których udział wymaga od uczniów przygotowania kondycyjnego, sprawnościowego i umiejętności posługiwania się specjalistycznym sprzętem, a program wycieczki przewiduje intensywną aktywność turystyczną, fizyczną lub długodystansowość na szlakach turystycznych</label>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th id="infTh">Informacje dodatkowe<br>(w przypadku<br>wycieczki wyjazdowej)</th>
                        <td colspan="5" id="informacje">
                            <?php echo '<textarea name="informacje" class="input-field" placeholder="Informacje dodatkowe">' . $result['informacje_dodatkowe'] . '</textarea>' ?>
                        </td>
                    </tr>
                </table>
                <div id="save">
                    <button type="submit" class="btn btn-success" id="saveButton">Zapisz wniosek</button>
                </div>
                <div class="d-flex mx-0 px-0 col-lg-10" id="footer">
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
    </form>
</main>
<!--Modal window-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Opiekunowie</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="selected-items mb-2" id="selectedPeople">
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Imię Nazwisko" aria-label="" aria-describedby="" id="searchInput">
                    <button class="btn btn-outline-primary" type="button" id="button-search">Wyszukaj</button>
                </div>
                <div id="results">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeButton">Zamknij</button>
                    <button type="button" class="btn btn-success" id="saveButtonModal">Zapisz</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        const cele = <?php echo json_encode($wybraneCele); ?>;
        cele.forEach(cel => {
            const checkbox = document.getElementById('c' + cel);
            if (checkbox) {
                checkbox.checked = true;
            }
        });
        const formy = <?php echo json_encode($wybraneFormy); ?>;
        formy.forEach(forma => {
            const checkbox = document.getElementById('f' + forma);
            if (checkbox) {
                checkbox.checked = true;
            }
        });
    </script>
    <script src="./assets/validation.js"></script>
    <script src="./assets/dodaj-wniosek.js"></script>
    <?php include "./partial/footer.php" ?>
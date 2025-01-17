<?php include './partial/header.php' ?>
<script src="./assets/validation.js"></script>
<script src="./assets/dodaj-wniosek.js"></script>
<link rel="stylesheet" href="./assets/dodaj-wniosek.css">

<main class="row d-flex justify-content-center m-0">
    <div class="col-7 shadow rounded my-5" id="inputsList">
        <div class="d-flex justify-content-center">
            <span class="my-4" id="addHeader">Wniosek wycieczki</span> 
        </div> 
        <form action="add-new.php" method="POST">
            <input type="hidden" id="OpiekunowieId" name="OpiekunowieId">
            <div class="row">
                <div class="form-floating mb-3 col ps-0" style="margin-left: 12px;">
                    <?php echo '<input type="text" class="form-control" id="kierownik" placeholder="" value="'.$_SESSION['name'].' '.$_SESSION['surname'].'"disabled/>'?>
                    <label for="kierownik">Kierownik</label>
                </div>
                <div class="mb-3 col ps-0 input-group">
                    <span class="input-group-text">+48</span>
                    <div class="form-floating">
                        <input type="text" class="form-control" id="telefon" placeholder="" name="phone" maxlength="9" />
                        <label for="telefon">Telefon</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-floating mb-3 col-2 ps-0" style="margin-left: 12px;">
                    <input type="text" class="form-control" id="klasa" placeholder="" name="class" maxlength="3">
                    <label for="klasa">Klasa</label>
                </div>
                <div class="form-floating mb-3 col-2 ps-0">
                    <input type="text" class="form-control" id="liczbaUczniow" placeholder="" name="numberOfStudents">
                    <label for="liczbaUczniow">Liczba uczniów</label>
                </div>
                <div class="form-floating mb-3 col ps-0">
                    <input type="datetime-local" class="form-control" id="dataOd" placeholder="" name="dateFrom">
                    <label for="dataOd">Data od</label>
                </div>
                <div class="form-floating mb-3 col ps-0">
                    <input type="datetime-local" class="form-control" id="dataDo" placeholder=""  name="dateTo">
                    <label for="dataDo">Data do</label>
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="miejsce" placeholder=""  name="place" maxlength="200">
                <label for="miejsce">Miejsce</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="opiekunowie" placeholder="" data-bs-toggle="modal" data-bs-target="#exampleModal" readonly>
                <label for="opiekunowie">Proponowani opiekunowie</label>
            </div>
            <div class="form-floating mb-3">
                <textarea type="text" class="form-control" id="program" placeholder="" name="program" maxlength="2000"></textarea>
                <label for="program">Program</label>
            </div>
            <div class="form-floating mb-3">
                <textarea type="text" class="form-control" id="cel" placeholder="" name="purpose" maxlength="2000"></textarea>
                <label for="cel">Cel wycieczki</label>
            </div>
            <div class="form-floating mb-3">
                <textarea type="text" class="form-control" id="korzysci" placeholder="" name="benefits" maxlength="2000"></textarea>
                <label for="korzysci"style="white-space: break-spaces;">Przewidywane korzyści i osiągnięcia uczniów</label>
            </div>
            <label style="margin-left: 10px;font-size: 17;" for="list-group"><b>Cele wycieczki</b></label>
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
                    <input class="form-check-input me-1" type="checkbox" value="" id="c8"  name="c8">
                    <label class="form-check-label" for="c8">Przeciwdziałanie zachowaniom ryzykownym, w szczególności w ramach profilaktyki uniwersalnej</label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="checkbox" value="" id="c9" name="c9">
                    <label class="form-check-label" for="c9">Poznawanie zasad bezpiecznego zachowania się w różnych sytuacjach</label>
                </li>
            </ul>
            <label style="margin-left: 10px;font-size: 17;" class="mt-3" for="list-group"><b>Formy wycieczki</b></label>
            <ul class="mt-2 list-group">
                <li class="list-group-item d-flex">
                    <input class="form-check-input me-1" type="checkbox" value="" id="f1"  name="f1">
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
            <div class="form-floating mt-3">
                <textarea type="text" class="form-control" id="informacje" placeholder="" name="information"></textarea>
                <label for="informacje">Informacje dodatkowe</label>
            </div>
            <div class="d-flex justify-content-center row">
                <a href="#top" style="display: contents;"><button type="submit" class="btn btn-success mt-4 col-6" id="saveButton">Zapisz wniosek</button></a>
            </div>
        </form>
    </div>
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
</main>
<?php include './partial/footer.php' ?>

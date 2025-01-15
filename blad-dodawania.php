<?php include './partial/header.php'?>
    <script>
        $("#AddNewTab").addClass("active");
        $("#YoursTab").removeClass("active");
        $("#BrowseTab").removeClass("active");
    </script>
    <div class="d-flex justify-content-center mt-4">
        <div class="alert alert-danger col-9 text-center" role="alert">
            Błąd danych we wniosku. Sprawdź dane i <a href="dodaj-wniosek.php" class="alert-link">dodaj wniosek</a> jeszcze raz.
        </div>
    </div>
<?php include './partia/footer.php'?>
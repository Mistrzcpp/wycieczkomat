<?php include './partial/header.php'?>
    <script>
        $("#AddNewTab").addClass("active");
        $("#YoursTab").removeClass("active");
        $("#BrowseTab").removeClass("active");
    </script>
    <div class="d-flex justify-content-center mt-4">
        <div class="alert alert-success col-9 text-center" role="alert">
            Pomyślnie dodano nowy wniosek. Aby zobaczyć swoje wnioski <a href="dodaj-wniosek.php" class="alert-link">kliknij tutaj.</a>
        </div>
    </div>
<?php include './partial/footer.php'?>
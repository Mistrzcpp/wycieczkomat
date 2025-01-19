<?php include './partial/header.php' ?>
<link rel="stylesheet" href="./assets/twoje-wnioski.css">
<link rel="stylesheet" href="./assets/pulse-anim.css">
<link rel="stylesheet" href="./assets/shine-anim.css">
<script src="./assets/twoje-wnioski.js"></script>

<main class="row d-flex justify-content-center m-0 align-items-center flex-column">
    <div class="col-7 shadow rounded my-5 p-0" id="searchDiv">
        <div class="input-group">
            <input type="text" class="form-control py-3" placeholder="Wyszukaj" id="searchBar"/>
            <button class="btn btn-outline-primary py-3 m-0" type="button" id="searchButton">Wyszukaj</button>
        </div>
    </div>
    <div class="shadow rounded col-9 row py-3 mx-2 d-flex justify-content-center" id="searchResults">
    </div>
</main>

<?php include './partial/footer.php' ?>

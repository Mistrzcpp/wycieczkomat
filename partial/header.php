<html>

<head>
    <title>Wycieczkomat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <link href="./assets/header.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.3.5/purify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

</head>

<body>
    <nav id="top">
        <div style="border: none;" class="nav nav-tabs custom-nav px-3 pb-0 pt-2" id="nav-tab" role="tablist">
            <?php
            @session_start();
            /*echo !empty($_SESSION['nauczyciel']) ? "nauczyciel" : "";
            echo !empty($_SESSION['dyrektor']) ? "dyrektor" : "";
            echo !empty($_SESSION['kadry']) ? "kadry" : "";
            echo !empty($_SESSION['sekretariat']) ? "sekretariat" : "";*/
            if (!empty($_SESSION['nauczyciel'])) {
                echo '<a class="mb-0 nav-link pb-3" id="AddNewTab" role="tab" aria-controls="nav-home" aria-selected="false" href="dodaj-wniosek.php">Dodaj Nowy Wniosek</a>';
                echo '<a class="mb-0 nav-link active" id="YoursTab"  role="tab" aria-controls="nav-profile" aria-selected="true" href="twoje-wnioski.php">Twoje Wnioski</a>';
            }
            if (!empty($_SESSION['dyrektor']) || !empty($_SESSION['kadry']) || !empty($_SESSION['sekretariat'])) {
                echo '<a class="mb-0 nav-link" id="BrowseTab" role="tab" aria-controls="nav-contact" aria-selected="false" href="przegladaj-wnioski.php">Przeglądaj Wnioski</a>';
            } ?>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item-dropdown">
                    <a class="m-0 px-2 nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./img/account_icon.svg" width="40" height="40" />
                        <span style="color:white;font-size:16px">Cześć, <?php
                                                                        echo $_SESSION['name']; ?>!</span>
                    </a>
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item" href="logout.php" style="color: red;">Wyloguj</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
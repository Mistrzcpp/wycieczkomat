<html>
    <head>
        <title>Wycieczkomat</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet"/>
    </head>
    <body>
        <nav>
            <div class="nav nav-tabs custom-nav px-3 pt-2" id="nav-tab" role="tablist">
                <?php 
                    session_start(); 
                    if(isset($_SESSION['nauczyciel'])){
                        echo '<a class="nav-link pb-3" id="AddNewTab" role="tab" aria-controls="nav-home" aria-selected="false" href="dodaj-wniosek.php">Dodaj Nowy Wniosek</a>';
                        echo '<a class="nav-link active" id="YoursTab"  role="tab" aria-controls="nav-profile" aria-selected="true" href="twoje-wnioski.php">Twoje Wnioski</a>';
                    }?>
                <?php 
                    if(isset($_SESSION['dyrektor']) || isset($_SESSION['kadry']) || isset($_SESSION['sekretariat'])){
                        echo '<a class="nav-link" id="BrowseTab" role="tab" aria-controls="nav-contact" aria-selected="false" href="przegladaj-wnioski.php">Przeglądaj Wnioski</a>';
                    }?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item-dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="./resources/account_icon.svg" width="40" height="40"/>
                            <span style="color:white;font-size:16px">Cześć, <?php
                                echo $_SESSION['name']; ?>!</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Zmień hasło</a></li>
                            <li><a class="dropdown-item" href="logout.php" style="color: red;">Wyloguj</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

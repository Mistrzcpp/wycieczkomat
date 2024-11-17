<?php
    session_start();
    $validationErr = false;
    $id = $_SESSION['user_id'];
    $name = $_SESSION['name'];
    $surname = $_SESSION['surname'];
    $phone = $_POST['phone'];
    if(strlen($phone) > 15) $validationErr = true;
    $class = $_POST['class'];
    if(strlen($class) > 3) $validationErr = true;
    $numberOf = $_POST['numberOfStudents'];
    if(!ctype_digit($numberOf)) $validationErr = true;
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $place = $_POST['place'];
    if(strlen($place) > 200) $validationErr = true;
    $program = $_POST['program'];
    if(strlen($program) > 2000) $validationErr = true;
    $purpose = $_POST['purpose'];
    if(strlen($purpose) > 2000) $validationErr = true;
    $benefits = $_POST['benefits'];
    if(strlen($benefits) > 2000) $validationErr = true;
    $information = $_POST['information'];
    if(strlen($information) > 2000) $validationErr = true;
    $purposeArr = array();
    $formsArr = array();
    if(isset($_SESSION['c1'])) $purposeArr[] = 1;
    if(isset($_SESSION['c2'])) $purposeArr[] = 2;
    if(isset($_SESSION['c3'])) $purposeArr[] = 3;
    if(isset($_SESSION['c4'])) $purposeArr[] = 4;
    if(isset($_SESSION['c5'])) $purposeArr[] = 5;
    if(isset($_SESSION['c6'])) $purposeArr[] = 6;
    if(isset($_SESSION['c7'])) $purposeArr[] = 7;
    if(isset($_SESSION['c8'])) $purposeArr[] = 8;
    if(isset($_SESSION['c9'])) $purposeArr[] = 9;
    if(isset($_SESSION['f1'])) $formsArr[] = 1;
    if(isset($_SESSION['f2'])) $formsArr[] = 2;
    if(isset($_SESSION['f3'])) $formsArr[] = 3;

    if($validationErr){
        include "partial/header.php";
        echo '
        <script>
            $("#AddNewTab").addClass("active");
            $("#YoursTab").removeClass("active");
            $("#BrowseTab").removeClass("active");
        </script>
        <div class="d-flex justify-content-center mt-4">
            <div class="alert alert-danger col-9 text-center" role="alert">
                Błąd danych we wniosku. Sprawdź dane i <a href="dodaj-wniosek.php" class="alert-link">dodaj wniosek</a> jeszcze raz.
            </div>
        </div>';
        include "partial/footer.php";
    }

    //polaczenie z baza
    try{
        $conn = new PDO("mysql:host=localhost;dbname=wycieczkomat", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e){
        echo "Databse connection failed: ".$e->getMessage();
        exit();
    }
    $stmt = $conn->prepare("SELECT * FROM uzytkownicy u WHERE u.login=:login");
    $stmt -> bindParam(":login", $login);
    $stmt -> execute();

?>
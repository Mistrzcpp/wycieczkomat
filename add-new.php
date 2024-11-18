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
    $dateFrom = str_replace("T", " ", $dateFrom);
    $dateTo = $_POST['dateTo'];
    $dateTo = str_replace("T", " ", $dateTo);
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
    if(isset($_POST['c1'])) $purposeArr[] = 1;
    if(isset($_POST['c2'])) $purposeArr[] = 2;
    if(isset($_POST['c3'])) $purposeArr[] = 3;
    if(isset($_POST['c4'])) $purposeArr[] = 4;
    if(isset($_POST['c5'])) $purposeArr[] = 5;
    if(isset($_POST['c6'])) $purposeArr[] = 6;
    if(isset($_POST['c7'])) $purposeArr[] = 7;
    if(isset($_POST['c8'])) $purposeArr[] = 8;
    if(isset($_POST['c9'])) $purposeArr[] = 9;
    if(isset($_POST['f1'])) $formsArr[] = 1;
    if(isset($_POST['f2'])) $formsArr[] = 2;
    if(isset($_POST['f3'])) $formsArr[] = 3;

    if($validationErr){
        header("Location: blad-dodawania.php");
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
    $stmt = $conn->prepare("
        INSERT INTO 
	        wnioski (kierownik_id,telefon,klasa,liczba_uczniow,data_od,data_do,miejsce,program,cel,korzysci,informacje_dodatkowe)
        VALUES
	        (:id,:phone,:class,:numberOf,:dateFrom,:dateTo,:place,:program,:purpose,:benefits,:information);");
    $stmt -> bindParam(":id", $id);
    $stmt -> bindParam(":phone", $phone);
    $stmt -> bindParam(":class", $class);
    $stmt -> bindParam(":numberOf", $numberOf);
    $stmt -> bindParam(":dateFrom", $dateFrom);
    $stmt -> bindParam(":dateTo", $dateTo);
    $stmt -> bindParam(":place", $place);
    $stmt -> bindParam(":program", $program);
    $stmt -> bindParam(":purpose", $purpose);
    $stmt -> bindParam(":benefits", $benefits);
    $stmt -> bindParam(":information", $information);
    $stmt -> execute();

    $stmt = $conn->prepare("SELECT id FROM wnioski WHERE kierownik_id=:id ORDER BY data_utworzenia DESC LIMIT 1");
    $stmt -> bindParam(":id", $id);
    $stmt -> execute();
    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    $document_id = $result['id'];

    if(!empty($purposeArr)){
        $query = "";
        foreach($purposeArr as $p){
            $query .= " (".$document_id.", ".$p."),";
        }
        $query = substr_replace($query, '', -1);
        $stmt = $conn->prepare("INSERT INTO wybrane_cele (wniosek_id, cel_id) VALUES".$query);
        $stmt -> execute();
    }

    header("Location: dodano.php");

?>
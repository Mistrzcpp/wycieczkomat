<?php
include "./partial/db-connection.php";
@session_start();
$docId = $_POST['docId'];
if (!isset($docId)) {
    header("Location: blad.php");
}

$validationErr = false;
$id = $_SESSION['user_id'];
$name = $_SESSION['name'];
$surname = $_SESSION['surname'];

$phone = $_POST['telefon'];
if (empty($phone)) $phone = null;
if (strlen($phone) > 15) $validationErr = true;

$class = $_POST['klasa'];
if (empty($class)) $class = null;

$school = $_POST['szkola'];
if ($school == 0) $school = null;

$numberOf = $_POST['liczbaUczniow'];
if (empty($numberOf)) $numberOf = null;
if (!ctype_digit($numberOf) && $numberOf > 100) $validationErr = true;

$dateFrom = $_POST['dataOd'];
if (empty($dateFrom)) $dateFrom = null;
$dateTo = $_POST['dataDo'];
if (empty($dateTo)) $dateTo = null;

$hourFrom = $_POST['godzinaOd'];
if (empty($hourFrom)) $hourFrom = null;
$hourTo = $_POST['godzinaDo'];
if (empty($hourTo)) $hourTo = null;
if ($startDate > $endDate) $validationErr = true;

$place = $_POST['miejsce'];
if (empty($place)) $place = null;
if (strlen($place) > 200) $validationErr = true;

$program = $_POST['program'];
if (empty($program)) $program = null;
if (strlen($program) > 2000) $validationErr = true;

$purpose = $_POST['celOpis'];
if (empty($purpose)) $purpose = null;
if (strlen($purpose) > 2000) $validationErr = true;

$benefits = $_POST['korzysci'];
if (empty($benefits)) $benefits = null;
if (strlen($benefits) > 2000) $validationErr = true;

$information = $_POST['informacje'];
if (empty($information)) $information = null;
if (strlen($information) > 2000) $validationErr = true;

$purposeArr = array();
$formsArr = array();
if (isset($_POST['c1'])) $purposeArr[] = 1;
if (isset($_POST['c2'])) $purposeArr[] = 2;
if (isset($_POST['c3'])) $purposeArr[] = 3;
if (isset($_POST['c4'])) $purposeArr[] = 4;
if (isset($_POST['c5'])) $purposeArr[] = 5;
if (isset($_POST['c6'])) $purposeArr[] = 6;
if (isset($_POST['c7'])) $purposeArr[] = 7;
if (isset($_POST['c8'])) $purposeArr[] = 8;
if (isset($_POST['c9'])) $purposeArr[] = 9;
if (isset($_POST['f1'])) $formsArr[] = 1;
if (isset($_POST['f2'])) $formsArr[] = 2;
if (isset($_POST['f3'])) $formsArr[] = 3;
$opiekunowieArr = array();
if (isset($_POST['OpiekunowieId'])) {
    $temp = $_POST['OpiekunowieId'];
    $opiekunowieArr = explode(' ', $temp);
}

if ($validationErr) {
    header("Location: blad-dodawania.php");
}

$stmt = $conn->prepare("
        UPDATE wnioski w SET 
        data_utworzenia = NOW(), 
        telefon = :phone, 
        klasa = :class, 
        liczba_uczniow = :numberOf, 
        data_od = :dateFrom, 
        data_do = :dateTo, 
        godzina_od = :hourFrom, 
        godzina_do = :hourTo, 
        miejsce = :place, 
        program = :program, 
        cel = :purpose, 
        korzysci = :benefits, 
        informacje_dodatkowe = :information
        WHERE w.id = :id");
$stmt->bindParam(":id", $docId);
$stmt->bindParam(":phone", $phone);
$stmt->bindParam(":class", $class);
$stmt->bindParam(":numberOf", $numberOf);
$stmt->bindParam(":dateFrom", $dateFrom);
$stmt->bindParam(":dateTo", $dateTo);
$stmt->bindParam(":hourFrom", $hourFrom);
$stmt->bindParam(":hourTo", $hourTo);
$stmt->bindParam(":place", $place);
$stmt->bindParam(":program", $program);
$stmt->bindParam(":purpose", $purpose);
$stmt->bindParam(":benefits", $benefits);
$stmt->bindParam(":information", $information);

$_SESSION['id'] = $docId;
$_SESSION['phone'] = $phone;
$_SESSION['class'] = $class;
$_SESSION['numberOf'] = $numberOf;
$_SESSION['dateFrom'] = $dateFrom;
$_SESSION['dateTo'] = $dateTo;
$_SESSION['hourFrom'] = $hourFrom;
$_SESSION['hourTo'] = $hourTo;
$_SESSION['place'] = $place;
$_SESSION['program'] = $program;
$_SESSION['purpose'] = $purpose;
$_SESSION['benefits'] = $benefits;
$_SESSION['information'] = $information;

try {
    $stmt->execute();
} catch (PDOException $e) {
    header("Location: blad-dodawania.php");
}
//////////////////

$stmt = $conn->prepare("DELETE FROM wybrane_cele WHERE wniosek_id = :docId");
$stmt->bindParam(":docId", $docId);
try {
    $stmt->execute();
} catch (PDOException $e) {
    header("Location: blad.php");
}

$document_id = $docId;
if (!empty($purposeArr)) {
    $query = "";
    foreach ($purposeArr as $p) {
        $query .= " ({$document_id},{$p}),";
    }
    $query = substr_replace($query, '', -1);
    try {
        $stmt = $conn->prepare("INSERT INTO wybrane_cele (wniosek_id, cel_id) VALUES" . $query);
        $stmt->execute();
    } catch (PDOException $e) {
        header("Location: blad-dodawania.php");
    }
}
///////////////////

$stmt = $conn->prepare("DELETE FROM wybrane_formy WHERE wniosek_id = :docId");
$stmt->bindParam(":docId", $docId);
try {
    $stmt->execute();
} catch (PDOException $e) {
    header("Location: blad.php");
}

if (!empty($formsArr)) {
    $query = "";
    foreach ($formsArr as $f) {
        $query .= " ({$document_id},{$f}),";
    }
    $query = substr_replace($query, '', -1);
    try {
        $stmt = $conn->prepare("INSERT INTO wybrane_formy (wniosek_id, forma_id) VALUES" . $query);
        $stmt->execute();
    } catch (PDOException $e) {
        header("Location: blad-dodawania.php");
    }
}
////////////////////

$stmt = $conn->prepare("DELETE FROM opiekunowie WHERE wniosek_id = :docId");
$stmt->bindParam(":docId", $docId);
try {
    $stmt->execute();
} catch (PDOException $e) {
    header("Location: blad.php");
}

if (!empty($opiekunowieArr)) {
    $query = "";
    foreach ($opiekunowieArr as $o) {
        $query .= " ({$o},{$document_id}),";
    }
    $query = substr_replace($query, '', -1);
    try {
        $stmt = $conn->prepare("INSERT INTO opiekunowie (uzytkownik_id, wniosek_id) VALUES" . $query);
        $stmt->execute();
    } catch (PDOException $e) {
        header("Location: blad-dodawania.php");
    }
}
///////////////////////

header('Location: twoje-wnioski.php');

<?php
    function loginError(){
        $_SESSION['login_error'] = true;
        header("Location: index.php");
        exit();
    }
    //połączenie z bazą danych
    try{
        $conn = new PDO("mysql:host=localhost;dbname=wycieczkomat", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch(PDOException $e){
        echo "Databse connection failed: ".$e->getMessage();
        exit();
    }
    //wczytanie danych logowania
    session_start();
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    if(strlen($login)<3 || strlen($password)<8 || strlen($login)>30 || strlen($password)>20){
        loginError();
    }
    //zapytanie do bazy
    $stmt = $conn->prepare("SELECT * FROM uzytkownicy u WHERE u.login=:login");
    $stmt -> bindParam(":login", $login);
    $stmt -> execute();
    if($stmt->rowCount() != 1){
        loginError();
    }
    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    //weryfikacja hasla
    if(!password_verify($password, $result['haslo'])){
        loginError();
    }
    //stanowiska
    $stmt = $conn -> prepare("SELECT u.imie, s.nazwa FROM przypisane_stanowiska ps JOIN stanowiska s ON ps.stanowisko_id=s.id JOIN uzytkownicy u ON ps.uzytkownik_id=u.id WHERE uzytkownik_id=:id;");
    $stmt -> bindParam("id", $result['id']);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    foreach($result as $r){
        if($r['nazwa'] == 'nauczyciel')
            $_SESSION['nauczyciel'] = true;
        if($r['nazwa'] == 'kadry')
            $_SESSION['kadry'] = true;
        if($r['nazwa'] == 'sekretariat')
            $_SESSION['sekretariat'] = true;
        if($r['nazwa'] == 'dyrektor')
            $_SESSION['dyrektor'] = true;
    }
    $_SESSION['name'] = $result[0]['imie'];    
    if(isset($_SESSION['nauczyciel']))
        header("Location: twoje-wnioski.php");
    else
        header("Location: przegladaj-wnioski.php");

?>
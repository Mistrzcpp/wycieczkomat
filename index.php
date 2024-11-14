<html>
    <head>
        <title>Wycieczkomat</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="d-flex justify-content-center mt-5">
            <div class="d-flex flex-column align-items-center" style="box-shadow: 0px 0px 10px 0px #00000025; padding: 40px; border-radius: 10px; padding-left:50px; padding-right:50px">
                <h1 style="margin-bottom: 40px;font-size: 26px;color: #255fc5;">Wycieczkomat</h1>
                <form action="login.php" method="POST">
                    <input style="width: 250px;" type="text" class="form-control py-2 mb-3" placeholder="Login" name="login">
                    <input type="password" class="form-control py-2" placeholder="Hasło" name="password">
                    <?php
                        session_start();
                        if(isset($_SESSION['login_error'])){
                            echo '<p style="color:red; font-size:14px; margin-top:10px;">Niepoprawne dane</p>';
                        }
                    ?>
                    <div class="d-flex justify-content-end mt-5">
                        <button style="padding: 7px 20 7px 20 !important;" type="submit" class="btn btn-success float-right p-2">Zaloguj</button>
                    </div>
                </form>
            </div>
        </div>
    


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </body>
</html>
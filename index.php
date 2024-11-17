<html>
    <head>
        <title>Wycieczkomat</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>
        <div class="d-flex justify-content-center mt-5">
            <div class="d-flex flex-column align-items-center" style="box-shadow: 0px 0px 10px 0px #00000025; padding: 40px; border-radius: 10px; padding-left:50px; padding-right:50px">
                <h1 style="margin-bottom: 40px;font-size: 26px;color: #4d577b;">Wycieczkomat</h1>
                <form action="login.php" method="POST">
                    <?php
                        session_start();
                        if(isset($_SESSION['login_error'])){
                            echo '<div class="form-floating mb-3">
                                <input style="width: 250px;" type="text" class="form-control is-invalid" id="floatingInput" placeholder="" name="login">
                                <label for="floatingInput">Login</label>
                            </div>
                            <div class="form-floating">
                                <input style="width: 250px;" type="password" class="form-control is-invalid" id="floatingPassword" placeholder="" name="password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="invalid-feedback" style="display:block">Niepoprawne dane</div>';
                        }
                        else{
                            echo '<div class="form-floating mb-3">
                                <input style="width: 250px;" type="text" class="form-control" id="floatingInput" placeholder="" name="login">
                                <label for="floatingInput">Login</label>
                            </div>
                            <div class="form-floating">
                                <input style="width: 250px;" type="password" class="form-control" id="floatingPassword" placeholder="" name="password">
                                <label for="floatingPassword">Password</label>
                            </div>';
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
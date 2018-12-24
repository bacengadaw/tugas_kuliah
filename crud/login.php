<?php

    require_once "core/init.php";


    require_once "core/init.php";
    if( isset($_SESSION['penjual']) ) {
        header('Location: index.php');
    }

    if( isset($_POST['login']) ) {
        
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if(!empty(trim($email)) && !empty(trim($pass))) {
            
            
            if(login_cek_nama($email)) {
             
                if (cek_data($email, $pass)) {
                    $_SESSION['penjual'] = $email;
                    header('Location: index.php');
                }else{
                    echo "<script>
                    alert('data kamu ada yang salah');
                    </script>";
                }

            }else {
                echo"<!-- <script> alert('email kamu belum terdaftar di database'); </script>";
            }

        }else {
            echo "<!-- <script> alert('form pengisian tidak boleh kosong'); </script> -->";
        }
    }

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Magang.com</title>
        <link rel="icon" href="view/1.png">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="view/login/css/style.css">
    </head>
    <body>
        <div class="cont">
            <div class="demo">
                <div class="login">
                    <div class="login__check"></div>
                    <div class="login__form">

                    <form action="login.php" method="POST">
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <input type="email" class="login__input name" placeholder="email" name="email">
                        </div>
                        <div class="login__row">
                            <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
                            </svg>
                            <input type="password" class="login__input pass" placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="login__submit" name="login">Sign in</button>
                        <p class="login__signup">Don't have an acount? &nbsp;<a href="register.php">Sign Up</a></p>
                    </form>

                    </div>
                </div>
            
            </div>
        </div>

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="view/login/js/index.js"></script>
    </body>
</html>
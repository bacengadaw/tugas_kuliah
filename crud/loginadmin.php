<?php 

    session_start();

    $db = new mysqli("localhost", "root", "baceng", "magang");


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

                    <form method="post">
                        <div class="login__row">
                            <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
                                <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
                            </svg>
                            <input type="text" class="login__input name" placeholder="user" name="username">
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
                    <?php 

                if (isset($_POST['login'])) {
                    $ambil = $db->query("SELECT * FROM admin WHERE username='$_POST[username]' AND password = '$_POST[password]'");
                    $data =  $ambil->num_rows;

                    if ($data==1) {
                       // $_SESSION['admin'] = $data->fetch_assoc();
                       echo "<script>alert('kamu berhasil login');</script>";
                       echo "<script>location = 'indexadmin.php';</script>";

                    }else {
                        echo "<script>alert('kamu gagal login');</script>";
                    }
                }




                ?>
                    </div>
                </div>
                
            </div>
        </div>

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="view/login/js/index.js"></script>
    </body>
</html>
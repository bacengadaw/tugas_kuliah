<?php

    require_once "core/init.php";


    require_once "core/init.php";
    if( isset($_SESSION['user']) ) {
        header('Location: index.php');
    }

    if( isset($_POST['login']) ) {
        
        $email = $_POST['email'];
        $pass = $_POST['password'];

        if(!empty(trim($email)) && !empty(trim($pass))) {
            
            
            if(login_cek_nama($email)) {
             
                if (cek_data($email, $pass)) {
                    $_SESSION['user'] = $email;
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
<html lang="en" >
  <head>
    <meta charset="UTF-8">
    <title>Animated login form</title>
    <link rel="stylesheet" type="text/css" href="login/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
  </head>
  <body>
    <div class="wrapper">
    <form class="login" method="post" enctype="multpart/form-data">
      <p class="title">Log in</p>
      <input type="email" placeholder="email" name="email">
      <i class="fa fa-user"></i>
      <input type="password" placeholder="Password" name="password" />
      <i class="fa fa-key"></i>
      <a href="#">Forgot your password?</a>
      <!-- <button name="login" type="submit"> -->
        <span class="state"><button type="submit" name="login">Login</button></span>
      <!-- </button> -->
    </form>
      
    <footer>
      <a href="register.php">klik disini untuk mendaftar</a>
    </footer>
    <footer>
      <a target="blank" href="http://boudra.me/">boudra.me</a>
    </footer>
    </p>
    </div>
    
    <!-- <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/index.js"></script> -->
  </body>
</html>

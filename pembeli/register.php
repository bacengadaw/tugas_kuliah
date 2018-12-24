<?php 

    require_once "core/init.php";

    if( isset($_SESSION['user']) ) {
        header('Location: index.php');
    }

    if( isset($_POST['submit']) ) {

        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];


        if(!empty(trim($nama)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($pass))) {
            
            if (register_cek_nama($email) ) {
            //memasukan ke database
                if(register_user($nama, $username, $email, $pass)) {
                    echo "<script> alert('kamu berhasil daftar'); </script>";
                } else {
                    echo "<script> alert('kamu gagal daftar'); </script>";
                }
            }else {
                echo "<script> alert('email kamu sudah terdaftar jadi kamu tidak bisa daftar'); </script>";
            }

        }else {
            echo "<script> alert('form tidak boleh kosong'); </script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Materialize SignUp form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <link rel="stylesheet" href="register/css/style.css">
</head>
<body>
  <div class="container">
      <div class="row">
      <form class="col s12" id="reg-form" action="register.php" method="post">
        <div class="row">
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" name="nama">
            <label for="first_name">First Name</label>
          </div>
          <div class="input-field col s6">
            <input id="last_name" type="text" class="validate" name="username">
            <label>Username</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="email" type="email" class="validate" name="email">
            <label for="email">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="password" type="password" class="validate" name="password">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <div class="gender-male">
              <label for="male"><a href="login.php" title="">login disini bila punya akun</a></label>
            </div>
            <div class="gender-female">
            </div>
          </div>

          <div class="input-field col s6">
            <button class="btn btn-large btn-register waves-effect waves-light" type="submit" name="submit">Register
              <i class="material-icons right">done</i>
            </button>
          </div>
        </div>
      </form>
    </div>
    <a title="Login" class="ngl btn-floating btn-large waves-effect waves-light red"><i class="material-icons">input</i></a>
  </div>
    <script src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js'></script>
  <script  src="register/js/index.js"></script>
  </body>
</html>

<?php 

    require_once "core/init.php";

    if( isset($_SESSION['penjual']) ) {
        header('Location: index.php');
    }

    if( isset($_POST['submit']) ) {

        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

            // pengujian saja
        // die($nama .' '. $username .''. $email .''. $pass);

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
<html>
    <head>
        <title>Magang.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="view/register/style.css">
        <link rel="icon" href="view/1.png">
        <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    </head>
    <body>
        <!-- main -->
        <div class="main-w3layouts wrapper">
            <h1>Creative SignUp Form</h1>
            <div class="main-agileinfo">
                <div class="agileits-top">
                    <form action="#" method="post">
                        <input class="text" type="text" name="nama" placeholder="Username" required="">
                        <input class="text email" type="text" name="username" placeholder="Username" required="">
                        <input class="text" type="email" name="email" placeholder="email" required="">
                        <input class="text w3lpass" type="password" name="password" placeholder="Confirm Password" required="">
                        <div class="wthree-text">
                            <label class="anim">
                                <input type="checkbox" class="checkbox" required="">
                                <span>I Agree To The Terms & Conditions</span>
                            </label>
                            <div class="clear"> </div>
                        </div>
                        <input type="submit" name = "submit" value="SIGNUP">
                    </form>
                    <p>Don't have an Account? <a href="login.php"> Login Now!</a></p>
                    <!-- <p>kembali ke halaman utama <a href="../belajar/tugas/index.html">Home</a> </p> -->
                </div>
            </div>
            <!-- copyright -->
            <div class="colorlibcopy-agile">
                <p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
            </div>
            <!-- //copyright -->
            <ul class="colorlib-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </body>
</html>
<?php

    function register_user($nama, $username, $email, $pass) {
        global $link;


        //mencegah sql injection
        $pass = password_hash($pass, PASSWORD_DEFAULT); 
        //memasukan data ke table
        $sql = "INSERT INTO magang1 (nama, username, email, password) VALUES ('$nama', '$username', '$email', '$pass')";

        $query = mysqli_query($link, $sql);

        if($query) {
            return true;
        } else {
            return false;
        }

        
    }


    //menguji nama kembar

    function register_cek_nama($email) {
        global $link;
        $nama = mysqli_real_escape_string($link, $email);

        $query = "SELECT * FROM magang1 WHERE email = '$email'";

        if( $result = mysqli_query($link, $query) ) {
            if(mysqli_num_rows($result) == 0) return true;
            else return false;
        }

    }


    // untuk login
    function cek_data($email, $pass) {
        global $link;


            //mencegah sql injection
            $email = mysqli_real_escape_string($link, $email);
            $pass = mysqli_real_escape_string($link, $pass);

            $query = "SELECT password FROM magang1 WHERE email = '$email'";
            $result = mysqli_query($link, $query);
            // hasilnya kita menggunkan fetch assoc ini
            $hash = mysqli_fetch_assoc($result)['password'];

            if ( password_verify($pass, $hash) ) {
                // die('berhasil');
                return true;
            }else {
                // die('gagal');
                return false;
            }
    }

    // menguji email ada atau enggak di database
        
    function login_cek_nama($email) {
        global $link;
        $email = mysqli_real_escape_string($link, $email);

        $query = "SELECT * FROM magang1 WHERE email = '$email'";

        if( $result = mysqli_query($link, $query) ) {
            if(mysqli_num_rows($result) != 0) return true;
            else return false;
        }

    }
    

?>
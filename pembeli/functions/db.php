<?php

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "baceng";
    $db_name = "magang";


    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if(!$link) {
        die('ada yang error' . mysqli_connect_error());
    }

?>
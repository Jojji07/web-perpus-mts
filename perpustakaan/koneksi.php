<?php
    $host="localhost";
    $username="root";
    $password="";
    $db="db_perpus";
    $koneksi = mysqli_connect("$host", "$username", "$password","$db");
     if (mysqli_connect_errno())
     {
        echo "Failed to connect to Database : " .mysqli_connect_errno();
     }

?>	


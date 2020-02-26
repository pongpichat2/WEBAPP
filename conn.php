<?php 
    $Serverbd = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "webdb";

    $conn = new mysqli($Serverbd, $user, $pass, $dbname);

    mysqli_set_charset($conn, "utf8");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } //จบการทำงาน
    
?>
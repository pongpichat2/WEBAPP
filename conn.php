<?php 
    $Serverbd = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "webdb";

    $conn = new mysqli($Serverbd, $user, $pass, $dbname);

    mysqli_set_charset($conn, "utf8");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } //จบการทำงาน
    
?>
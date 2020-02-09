<?php
    //session_start();
    $name =  $_POST["NAMEA"];
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $confirmpass = $_POST["ConfirmPassword"];
    $Age = $_POST["Age"];


    //require("conn.php");
    
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
    

    
    //เพิ่มข้อมูล
    $sql = "INSERT INTO register (NAME, Username, PASSWORD, ConfirmPassword, Age)
                    Value ('$name', '$username', '$password', '$confirmpass', '$Age')";

    if ($_POST["Password"] != $_POST["ConfirmPassword"] ){
        echo "รหัสไม่เข้ากัน";
        exit();
    }

                     
    if ($conn->query($sql) === TRUE) {
        header("Location:index.html");
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
?>



<?php
    session_start();
    $name =  $_POST["NAMEA"];
    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $confirmpass = $_POST["ConfirmPassword"];
    $Status = $_POST["Status"];

   


    $Serverbd = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "nook";

    // connent php DB
    $conn = new mysqli($Serverbd, $user, $pass, $dbname);

    

    
    //Check connent
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);} //จบการทำงาน

    //เพิ่มข้อมูล
    $sql = "INSERT INTO registera (NAME, Username, PASSWORD, ConfirmPassword, Status)
                    Value ('$name', '$username', '".md5($password)."', '$confirmpass', '$Status')";

    if ($_POST["Password"] != $_POST["ConfirmPassword"] ){
        echo "รหัสไม่เข้ากัน";
        exit();
    }

                     
    if ($conn->query($sql) === TRUE) {
        header("Location:login.html");
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
?>



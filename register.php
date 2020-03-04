<?php
    $name =  $_REQUEST["NAMEA"];
    $username = $_REQUEST["Username"];
    $password = $_REQUEST["Password"];
    $room = $_REQUEST["IDRoom"];
    $status = $_REQUEST["Selectstatus"];


    require("conn.php");
    
    
    
    //เพิ่มข้อมูล
    $sql = "INSERT INTO register (NAME, Username, PASSWORD, IDRoom, Status)
                    Value ('$name', '$username', '$password', '$room', '$status')";



                     
    if ($conn->query($sql) == TRUE) {
        
        header("Location:index.html");
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
?>



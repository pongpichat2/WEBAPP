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
    
    $sql1 = "INSERT INTO room (IDRoom) Value ('$room')";



                     
    if ($conn->query($sql) == TRUE) {
        if($conn->query($sql1) == TRUE){
        header("Location:index.html");}
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
?>



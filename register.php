<?php
    $name =  $_REQUEST["NAMEA"];
    $username = $_REQUEST["Username"];
    $password = $_REQUEST["Password"];
    $room = $_REQUEST["IDRoom"];
    $status = $_REQUEST["Selectstatus"];


    require("conn.php");
    
    
    
   
    //เช็คข้อมูลซ้ำ
    
    
    $Checkmember2 = "SELECT * FROM register WHERE IDRoom ='$room'";
    $query2 = mysqli_query($conn, $Checkmember2);
    $result2 = mysqli_num_rows($query2);
    if($result2 > 0){
        echo "<script>";
        echo"alert('มี Room ซ้ำค้าบ!!!!');";
        echo "window.history.back();";
        echo "</script>"; 
    }

    $Checkmember = "SELECT * FROM register";
    $query = mysqli_query($conn, $Checkmember);
    $result = mysqli_num_rows($query);
    if($result > 0){
        //เพิ่มข้อมูล
        $sql = "INSERT INTO register (NAME, Username, PASSWORD, IDRoom, Status)
                        Value ('$name', '$username', '$password', '$room', '$status')";
        
        $sql1 = "INSERT INTO room (IDRoom) Value ('$room')";
        if ($conn->query($sql) == TRUE) {
            if($conn->query($sql1) == TRUE){
            header("Location:adduser.php");
        }
        } 
        
    }
?>



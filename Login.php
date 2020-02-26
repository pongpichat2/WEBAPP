<?php
    require("conn.php");
    session_start();
    
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    
    //เช็ค ข้อมูลในDatabase ใน ATB1 Username and Password
    $sql = "SELECT * FROM register WHERE Username= '".$username."' AND PASSWORD = '".$password."' limit 1";

    //ถ้าเจอ
    $result = mysqli_query($conn, $sql );
    
    
    if (mysqli_num_rows($result)>0){
        
            $_SESSION['username'] = $username;
            header("Location:Mungmee.php");
            
    }
    else{
        echo "เข้าไม่ได้";
    }
?>


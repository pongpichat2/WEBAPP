<?php
    require("conn.php");
    //session_start();
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    
    
    

    //เช็ค ข้อมูลในDatabase ใน ATB1 Username and Password
    $query = "SELECT * FROM register WHERE Username= '".$username."' AND PASSWORD = '".$password."' limit 1";

    //ถ้าเจอ
    $result = mysqli_query($conn, $query );
    $objResult = mysqli_fetch_array($result);
    

    if (mysqli_num_rows($result)==1){
        
         //เก็บตัวแปล username ไว้ใน SESSION
        if(!$objResult){
            echo "Username and Password Incorrect !";
        }
        else{
            //$_SESSION['Username'] = $objResult['Username'];
           // $_SESSION['Status'] = $objResult['Status'];

            //session_write_close();
            header("Location:Mungmee.html");
            


        }
        
        
    }
    else{
        echo "เข้าไม่ได้";
        
    }

?>


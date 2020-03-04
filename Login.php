<?php
    require("conn.php");
    session_start();
    
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    
    //เช็ค ข้อมูลในDatabase ใน ATB1 Username and Password
    $sql = "SELECT * FROM register WHERE Username= '".$username."' AND PASSWORD = '".$password."' limit 1";

    //ถ้าเจอ
    $result = mysqli_query($conn, $sql );
    $objResult = mysqli_fetch_array($result);
    
    if (mysqli_num_rows($result) == 1){
        
            $row = mysqli_fetch_assoc($result);

            $_SESSION['username'] = $username;
            $_SESSION['name'] = $objResult['NAME'];
            if ($objResult["Status"] == "user"){ 
            header("Location:HUser.php");}
            else{
                header("Location:HAdmin.php");
            }
            
    }
    else{
        echo "เข้าไม่ได้";
        echo "<br>";
        echo "<a href='index.html'>Go to Login</a>";
    }
?>


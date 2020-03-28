<?php
    require("conn.php");
    session_start();
    
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    
    //เช็ค ข้อมูลในDatabase ใน ATB1 Username and Password
    $sql = "SELECT * FROM register WHERE Username= '".$username."' AND PASSWORD = '".$password."' limit 1";

    //ถ้าเจอ
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1){
        
            $row = mysqli_fetch_assoc($result);

            $_SESSION['username'] = $username;
            $_SESSION['name'] = $row['NAME'];
            $_SESSION['IDRoom'] = $row['IDRoom'];
            $_SESSION['Status'] = $row['Status'];
            if ($row["Status"] == "user"){ 
                header("Location:HUser.php");}
            else{
                header("Location:HAdmin.php");
            }
            
    }
    else{
        echo "<script>";
         echo "alert('รหัสผ่านผิด !!!');";
         echo "window.location='index.html';";
        echo "</script>";
    }
?>


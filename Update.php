<?php 
require("conn.php");
$Update ="";
$IDRoom = "";
$UserID = "";
$name = "";
$username ="";
$status = "";

if(isset($_GET['Update'])) $Update = $_GET['Update'];
if(isset($_GET['UserID'])) $UserID = $_GET['UserID'];
if(isset($_GET['NAME'])) $name = $_GET['NAME'];
if(isset($_GET['Username'])) $username = $_GET['Username'];
if(isset($_GET['IDRoom'])) $IDRoom = $_GET['IDRoom'];
if(isset($_GET['status'])) $status = $_GET['status'];

if($Update == 'Edit'){
    $sql = "UPDATE register SET ";

    if ($status == 'จ่ายแล้ว'){
        $sql .= "NAME = '$name', Username ='$username', IDRoom = '$IDRoom', SPrice = '2' WHERE UserID = '$UserID'";
        
    }
    else if ($status == 'ค้างจ่าย'){
        $sql .= "NAME = '$name', Username ='$username', IDRoom = '$IDRoom', SPrice = '1' WHERE UserID = '$UserID'";
    }
    else{
        header("Location: HAdmin.php");
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: HAdmin.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if($Update == 'Delete'){
    $sql = "DELETE FROM register WHERE UserID = '$UserID'";

    if (mysqli_query($conn, $sql)) {
        header("Location: HAdmin.php");
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>
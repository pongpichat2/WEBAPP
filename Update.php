<?php 
require("conn.php");
$Update ="";
$IDRoom = "";
$UserID = "";
$name = "";
$username ="";

if(isset($_GET['Update'])) $Update = $_GET['Update'];
if(isset($_GET['UserID'])) $UserID = $_GET['UserID'];
if(isset($_GET['NAME'])) $name = $_GET['NAME'];
if(isset($_GET['Username'])) $username = $_GET['Username'];
if(isset($_GET['IDRoom'])) $IDRoom = $_GET['IDRoom'];

if($Update == 'Edit'){
    $sql = "UPDATE register SET NAME = '$name', Username ='$username', IDRoom = '$IDRoom' WHERE UserID = '$UserID'";

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
<?php
require("conn.php");

$Update ="";
$billNo ="";
if(isset($_GET['Update'])) $Update = $_GET['Update'];
if(isset($_GET['bill'])) $billNo = $_GET['bill'];

if($Update == 'Delete'){
    $sql = "DELETE FROM billsum WHERE BillNo = '$billNo'";
    echo $sql;
    if (mysqli_query($conn, $sql)) {
        header("Location:Accrued.php");
    } 
    else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>
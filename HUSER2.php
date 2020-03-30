<?php 
        session_start();
        require("conn.php");

        if(!isset($_SESSION['username'])) {
            header("Location:index.html");
        }
        $idroom = $_SESSION['IDRoom'];
        $user = $_SESSION['username'];
        $pass = $_SESSION['pass'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Gotu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/HomeU2.css">
    <title>Mungmee</title>
<script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "300px";
            document.getElementById("main").style.marginLeft = "300px";
            }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
            }
            
</script>
<style>
    .sidepanel h2{
        color: floralwhite;
        margin-left: 20px;
    }
</style>

</head>

<body>
    <button class="openbtn" onclick="openNav()">☰</button>

    <?php 
    $roomID = "";
    if(isset($_GET['roomID'])) $roomID = $_GET['roomID'];

    echo  $_SESSION['room'];
    ?>

    <div id="mySidebar" class="sidepanel">
        <h1>NAME : <?php echo $_SESSION['name'];?></h1>
        <form action="" method="get">
        <h2>ROOM : <select name="roomID" class="IDRoom">
                    <?php 
                        $sql = "SELECT * FROM register WHERE Username= '$user' AND PASSWORD = '$pass'";
                        $result = mysqli_query($conn, $sql);
                        
                     
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<option  class= 'option'value=" . $_SESSION['room'].">" .$_SESSION['room'] ."</option>";
                            }
                        }
                     
                        ?></select>&nbsp;&nbsp;&nbsp;<input type="submit" value="View" class="Bview">
        </form>
                </select></h2>
        <a href="#" class="closebtn" onclick="closeNav()">×</a>  
        <a href="HUser.php">เช็คค่าหอ</a>
        <a href="payment.php">PAYMENT</a>
        <a href="Logout.php" >Log Out</a>
    </div>

    <?php
    $roomID = "";
    if(isset($_GET['roomID'])) $roomID = $_GET['roomID'];

    $_SESSION['room'] = $roomID ;
    $sql = "SELECT * FROM billsum WHERE IDRoom = '$roomID'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            $sqlsum = "SELECT SUM(priceR) AS 'sumRoom' FROM billsum WHERE IDRoom = '$roomID'";
            $Resum = mysqli_query($conn, $sqlsum);
            $row = mysqli_fetch_assoc($Resum);
            $row['sumRoom'];

            $sqlsum1 = "SELECT SUM(eletric) AS 'sumEle' FROM billsum WHERE IDRoom = '$roomID'";
            $Resum1 = mysqli_query($conn, $sqlsum1);
            $row1 = mysqli_fetch_assoc($Resum1);
            $row1['sumEle'];
            
            $sqlsum2 = "SELECT SUM(water) AS 'sumWater' FROM billsum WHERE IDRoom = '$roomID'";
            $Resum2 = mysqli_query($conn, $sqlsum2);
            $row2 = mysqli_fetch_assoc($Resum2);
            $row2['sumWater'];

            $sumfull = $row['sumRoom']+ (($row1['sumEle']*7)+($row2['sumWater']*9));

            $_SESSION['SUMFU'] = $sumfull;



        }
    ?>

    <div class ="Billpay">
        <h2>ยอดที่ต้องชำระ</h2>
        <h3>ค่าห้อง &nbsp;&nbsp;:&nbsp; <input type="text" value="<?php echo $row['sumRoom']; ?>" readonly> บาท.</h3>
        <b>+</b>
        <h3>ค่าไฟ &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <input type="text" value="<?php echo $row1['sumEle']*7 ?> = <?php echo $row1['sumEle'];?>หน่วย x 7" readonly> บาท.</h3>
        <b>+</b>
        <h3>ค่าน้ำ &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <input type="text" value="<?php echo $row2['sumWater']*9 ?> = <?php echo $row2['sumWater'];?>หน่วย x 9" readonly> บาท.</h3>
        <b>=</b>
        <h3>รวม &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <input type="text"  class ="Sumpay" value="<?php echo $sumfull ?>" readonly> บาท.</h3><br>

        <a href="payment.php"><button name ="buttonpay">Payment</button></a>
    </div>
</body>
</html>
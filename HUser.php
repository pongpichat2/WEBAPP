<?php 
        session_start();
        require("conn.php");

        if(!isset($_SESSION['username'])) {
            header("Location:index.html");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Gotu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/HomeU1.css">
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

    <div id="mySidebar" class="sidepanel">
        <h1>NAME : <?php echo $_SESSION['name'];?></h1>
        <h2>ROOM : <?php echo $_SESSION['IDRoom'];?></h2>
        <a href="#" class="closebtn" onclick="closeNav()">×</a>  
        <a href="HUser.php">เช็คค่าหอ</a>
        <a href="payment.php">PAYMENT</a>
        <a href="Logout.php" >Log Out</a>
    </div>

    <?php
        $Room = $_SESSION['IDRoom'];
        $sql = "SELECT * FROM room WHERE IDRoom = $Room";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $sum1 = $row['priceR'] + $row['eletric']*7 + $row['water']*15;

            $_SESSION['SUM'] = $sum1;
        }
        
    ?>

    <div class ="Billpay">
        <h2>เดือน : <?php echo $row['Month']; echo"&nbsp;&nbsp;"; echo" ปี:&nbsp;";  echo $row['Year'];?></h2>
        <h3>ค่าห้อง &nbsp;&nbsp;:&nbsp; <input type="text" value="<?php echo $row['priceR'] ?>" readonly> บาท.</h3>
        <b>+</b>
        <h3>ค่าไฟ &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <input type="text" value="<?php echo $row['eletric']*7 ?> = <?php echo $row ['eletric']?>หน่วย x 7" readonly> บาท.</h3>
        <b>+</b>
        <h3>ค่าน้ำ &nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <input type="text" value="<?php echo $row['water']*15 ?> = <?php echo $row ['water']?>หน่วย x 15" readonly> บาท.</h3>
        <b>=</b>
        <h3>รวม &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; <input type="text"  class ="Sumpay" value="<?php echo $sum1 ?>" readonly> บาท.</h3><br>

        <a href="payment.php"><button name ="buttonpay" onclick="myFunction()">Payment</button></a>
    </div>
</body>
</html>
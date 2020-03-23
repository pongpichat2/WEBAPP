<?php 
    require("conn.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Gotu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/AddPrice3.css">

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


    </head>
<body>
    <button class="openbtn" onclick="openNav()">☰</button>
    <div id="mySidebar" class="sidepanel">
        <h1>NAME :  <?php echo $_SESSION['name'];?></h1>
        <h2>STATUS : <?php echo $_SESSION['Status'];?></h2>
        <a href="#" class="closebtn" onclick="closeNav()">×</a>
        <a href="HAdmin.php">Home</a>  
        <a href="adduser.php">เพิ่มสมาชิก</a>
        <a href="#">ค่าหอ</a>
        <a href="#">Contact</a>
        <a href="Logout.php" >Log Out</a>
    </div>
    
    <?php
        
    ?>
    
    <div class="containerADD">
        <div class="textData">
            <form action="" method="get">
                <br>
                <h1>เพิ่มค่าหอ</h1><br>
                <h3 class="RoomNO">ROOM NO. :<select name="IDroom" class="IDRoom">
                    <?php 
                        $sql = "SELECT * FROM room ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<option class= 'option'value=" . $row["IDRoom"].">" .$row["IDRoom"] ."</option>";
                            }
                        }
                        ?>
                </select></h3>
                <h3>ค่าห้อง : <input type="text" name ='Rprice' class="text1">&nbsp;บาท</h3>
                <h3>ค่าไฟ &nbsp;&nbsp;: <input type="text" name ='eletric'class="text1">&nbsp;หน่วย</h3>
                <h3>ค่าน้ำ &nbsp;&nbsp;: <input type="text" name ='water'class="text1">&nbsp;หน่วย</h3>
                <h3>เดือน &nbsp;&nbsp;: <select name="Month" id="" class="Month">
                    <option value="มกราคม">มกราคม</option>
                    <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                    <option value="มีนาคม">มีนาคม</option>
                    <option value="เมษายน">เมษายน</option>
                    <option value="พฤษภาคม">พฤษภาคม</option>
                    <option value="มิถุนายน">มิถุนายน</option>
                    <option value="กรกฎาคม">กรกฎาคม</option>
                    <option value="สิงหาคม">สิงหาคม</option>
                    <option value="กันยายน">กันยายน</option>
                    <option value="ตุลาคม">ตุลาคม</option>
                    <option value="พฤศจิกายน">พฤศจิกายน</option>
                    <option value="ธันวาคม">ธันวาคม</option>
                </select> 
                &nbsp;&nbsp; ปี : <input type="text" class="year" name="year"></h3><br><br>
                <input type="Submit" value="ADD" class="ADDSubmit">
                <input type="reset" value="RESET" class="Reset">
            </form>
        </div>
    </div>

    <?php
    //ADD ค่าหอพัก
        $IDRoom = "";
        $Rprice = "";
        $eletric = "";
        $water = "";
        $month = "";
        $year = "";

        if(isset($_GET["IDroom"])) $IDRoom = $_GET["IDroom"];
        if(isset($_GET["Rprice"])) $Rprice = $_GET["Rprice"];
        if(isset($_GET["eletric"])) $eletric = $_GET["eletric"];
        if(isset($_GET["water"])) $water = $_GET["water"];
        if(isset($_GET["Month"])) $month = $_GET["Month"];
        if(isset($_GET["year"])) $year = $_GET["year"];

        $sqlUpDate = "UPDATE room SET priceR = '$Rprice', eletric = '$eletric', water = '$water', Month = '$month', Year = '$year' ";
        $sqlUpDate .= "WHERE IDRoom = $IDRoom";

      

        $result = mysqli_query($conn, $sqlUpDate);
    ?>
    
    
</body>
</html>
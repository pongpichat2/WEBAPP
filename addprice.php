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
    <link rel="stylesheet" href="CSS/AddPrice5.css">

    <script>
        var room = document.getElementById("IDRoom").value;
         function openNav() {
            document.getElementById("mySidebar").style.width = "300px";
            document.getElementById("main").style.marginLeft = "300px";
            }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
            }
        
        //เช็คค่าติดลบ
        function checkdata(){
            if(Number(document.formADD.Rprice.value) < 0){
                alert('ห้ามกรอกค่าห้องติด - ค๊าบบบ!!');
                document.formADD.Rprice.focus();
                return false;
            }
            else if(Number(document.formADD.eletric.value) < 0){
                alert('ห้ามกรอกค่าไฟติด - ค๊าบบบ!!');
                document.formADD.eletric.focus();
                return false;}
            else if(Number(document.formADD.water.value) < 0){
                alert('ห้ามกรอกค่าน้ำติด - ค๊าบบบ!!');
                document.formADD.water.focus();
                return false;}
            else if(Number(document.formADD.year.value) < 0){
                alert('ห้ามกรอกปีติด - ค๊าบบบ!!');
                document.formADD.year.focus();
                return false;}
        }


    </script>


    </head>
<body>
    <button class="openbtn" onclick="openNav()">☰</button>
    <div id="mySidebar" class="sidepanel">
        <h1>NAME :  <?php echo $_SESSION['name'];?></h1>
        <h2>STATUS : <?php echo $_SESSION['Status'];?></h2>
        <a href="#" class="closebtn" onclick="closeNav()">×</a>
        <a href="HAdmin.php">รายชื่อผู้เช่า</a>  
        <a href="adduser.php">เพิ่มสมาชิก</a>
        <a href="Accrued.php">ยอดค้าง</a>
        <a href="addprice.php">ค่าเช่าประจำเดือน</a>
        <a href="Logout.php" >Log Out</a>
    </div>
    
    
    <div class="containerADD">
        <div class="textData">
            <form action="" method="get" name="formADD" onsubmit="return checkdata();">
                <br>
                <h1>เพิ่มค่าหอ</h1><br>
                <h3 class="RoomNO">ROOM NO. : <select name="IDroom" class="IDRoom" >
                    <?php 
                        $sql = "SELECT * FROM room";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<option  class= 'option'value=" . $row["IDRoom"].">" .$row["IDRoom"] ."</option>";
                            }
                        }
                        ?>
                </select></h3>
                <h3>ค่าห้อง : <input type="text" id="Rprice" name ='Rprice' class="text1" pattern="[0-9]{1-5}" title="กรุณาใส่จำนวนเงิน" required>&nbsp;บาท</h3>
                <h3>ค่าไฟ &nbsp;&nbsp;: <input type="text" name ='eletric'class="text1" pattern="[0-9]{1-5}" title="กรุณาใส่จำนวนหน่วยค่าไฟ" required>&nbsp;หน่วย</h3>
                <h3>ค่าน้ำ &nbsp;&nbsp;: <input type="text" name ='water'class="text1"pattern="[0-9]{1-5}" title="กรุณาใส่จำนวนหน่วยค่าน้ำ" required>&nbsp;หน่วย</h3>
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
                &nbsp;&nbsp; ปี : <input type="text" class="year" name="year" placeholder="พ.ศ." required></h3><br><br>
                <input type="submit" value="ADD" class="ADDSubmit" >
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
        // settype($_GET["Rprice"], "integer");
        // settype($_GET["eletric"], "integer");
        // settype($_GET["water"], "integer");
        
        $SPrice = "1";

        if(isset($_GET["IDroom"])) $IDRoom = $_GET["IDroom"];
        if(isset($_GET["Rprice"])) $Rprice = $_GET["Rprice"];
        if(isset($_GET["eletric"])) $eletric = $_GET["eletric"];
        if(isset($_GET["water"])) $water = $_GET["water"];
        if(isset($_GET["Month"])) $month = $_GET["Month"];
        if(isset($_GET["year"])) $year = $_GET["year"];

        $sqlUpDate = "INSERT INTO billsum (IDRoom, priceR, eletric , water , Month, Year) value ('$IDRoom', '$Rprice', '$eletric', '$water', '$month', '$year')";
        // $sqlUpDate = "UPDATE room SET priceR = '$Rprice', eletric = '$eletric', water = '$water', Month = '$month', Year = '$year' ";
        // $sqlUpDate .= "WHERE IDRoom = '$IDRoom'";

        $sqlUpDateRe = "UPDATE register SET SPrice = '$SPrice' WHERE IDRoom = '$IDRoom'"; 

        if ($conn->query($sqlUpDate) == TRUE) {
            if($conn->query($sqlUpDateRe) == TRUE){
            }
         } 
        else {
            
        }
    ?>
    
    
</body>
</html>
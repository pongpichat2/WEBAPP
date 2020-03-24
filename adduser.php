<?php
    session_start();
    require("conn.php");

    // if no session then back to login.php
    if(!isset($_SESSION['username'])) {
        header("Location:index.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/ADUser2.css">
    <link href="https://fonts.googleapis.com/css?family=Gotu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <title>Add Renter</title>

    <script>
        function confirmSubmit(){
            return confirm("คุณต้องการยืนยันใช่ไหม ???");
        }
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
        <a href="HAdmin.php">รายชื่อผู้เช่า</a>  
        <a href="#">เพิ่มสมาชิก</a>
        <a href="addprice.php">ค่าหอ</a>
        <a href="Logout.php" >Log Out</a>
    </div>

    <form action="register.php" method="GET" >
        <div class="container">
            
            <h1>เพิ่มสมาชิก</h1>
            <input type="text" name="NAMEA"  placeholder="Name" required class="label-input"> <br>
            <input type="text" name="Username" placeholder="Username" required class="label-input"> <br>
            <input type="password" name="Password" placeholder="Password" required class="label-input"> <br>
            <input type="text" name="IDRoom" placeholder="Room" required class="label-input"> <br>
            <select name="Selectstatus" id=""class="label-input">
                <option value="user" >ผู้เช่า</option>
                <option value="admin" >ผู้ดูแล</option>
            </select><br>
            <input type="submit" class="boxsubmit" value="Submit" onclick="return confirmSubmit()"></input><br><br>
            
        </div>
    </form>
    
   
</body>
</html>
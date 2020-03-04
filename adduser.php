<?php
    session_start();
    require("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/adduser.css">
    <link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet">
    <title>Register</title>

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
        <a href="#" class="closebtn" onclick="closeNav()">×</a>  
        <a href="#">เพิ่มผู้เช่า</a>
        <a href="#">ค่าหอ</a>
        <a href="#">Contact</a>
        <a href="index.html" >Log Out</a>
    </div>

    <form action="register.php" method="GET" >
        <div class="container">
            
            <h1>เพิ่มผู้เช่า</h1>
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
<?php
    require("conn.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/Hadmin.css">
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
        <h1>NAME :  <?php echo $_SESSION['name'];?></h1>
        <h2>STATUS : <?php echo $_SESSION['Status'];?></h2>
        <a href="#" class="closebtn" onclick="closeNav()">×</a>
        <a href="HAdmin.php">Home</a>  
        <a href="adduser.php">Add Renter</a>
        <a href="#">ค่าหอ</a>
        <a href="#">Contact</a>
        <a href="index.html" >Log Out</a>
    </div>
</body>
</html>
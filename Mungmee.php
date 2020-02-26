<?php 
        session_start();
        require("conn.php");
        // echo $_SESSION['username'];
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Courier+Prime&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Mungmee.css">
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

</head>

<body>
    <button class="openbtn" onclick="openNav()">☰</button>
    <div id="mySidebar" class="sidepanel">
        <h1>Username : <?php echo $_SESSION['username'];?></h1>
        <a href="#" class="closebtn" onclick="closeNav()">×</a>  
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
        <a href="index.html">Log Out</a>
    </div>

</body>
</html>
<?php
    require("conn.php");
    session_start();

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
    <title>Document</title>
    <link rel="stylesheet" href="CSS/HAdmin1.css">
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
        <a href="addprice.php">ค่าหอ</a>
        <a href="#">Contact</a>
        <a href="Logout.php" >Log Out</a>
    </div>
    <table class="HeadADD">
          <tr>
              <td class="cos1">NO.Room</td>
              <td class="cos1">ROOM FEE</td>
              <td class="cos1">Electricity Bill</td>
              <td class="cos1">Water Bill</td>
              <td class="cos1">DATE</td>
          </tr>
          <?php
            //Show  table
                $sql = "SELECT * FROM room ";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                
                    while($row = mysqli_fetch_assoc($result)){
                    echo "<div class='TableShow'>";
                        echo "<tr>";
                        echo "<td class='cos2'><input type = 'text' value =" . $row["IDRoom"] . " readonly name='IDroom' class='IDRoom' size='9'> </td>";
                        echo "<td class='cos2'><input type = 'text' name ='Rprice' value =" . $row["priceR"] . " readonly> </td>";
                        echo "<td class='cos2'><input type = 'text' name = 'eletric' value =" . $row["eletric"] . " readonly> </td>";
                        echo "<td class='cos2'><input type = 'text' name = 'water' value =" . $row["water"] . " readonly> </td>";
                        echo "<td class='cos2'><input type = 'date' name = 'dateA' value =" . $row["Date"] . " readonly> </td>"; 
                        echo "</tr>";
                    echo "</div>";
                        }
                    }
                    
            ?>
    </table>
</body>

</html>
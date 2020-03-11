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
    <link rel="stylesheet" href="CSS/addprice.css">

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
        <a href="#" class="closebtn" onclick="closeNav()">×</a>
        <a href="HAdmin.php">Home</a>  
        <a href="adduser.php">Add Renter</a>
        <a href="#">ค่าหอ</a>
        <a href="#">Contact</a>
        <a href="Logout.php" >Log Out</a>
    </div>

    <div id="addP" class="addP">
      <table border="3">
          <tr>
              <td class="cos">NO.Room</td>
              <td class="cos">ROOM FEE</td>
              <td class="cos">Electricity Bill</td>
              <td class="cos">Water Bill</td>
              <td class="cos">DATE</td>
          </tr>
      </table>
    </div>

    <?php
    //ADD ค่าหอพัก
        $IDRoom = "";
        $Rprice = "";
        $eletric = "";
        $water = "";
        $date = "";

        if(isset($_GET["IDroom"])) $IDRoom = $_GET["IDroom"];
        if(isset($_GET["Rprice"])) $Rprice = $_GET["Rprice"];
        if(isset($_GET["eletric"])) $eletric = $_GET["eletric"];
        if(isset($_GET["water"])) $water = $_GET["water"];
        if(isset($_GET["dateA"])) $date = $_GET["dateA"];

        $sqlUpDate = "UPDATE room SET priceR = '$Rprice', eletric = '$eletric', water = '$water', Date = '$date' ";
        $sqlUpDate .= "WHERE IDRoom = $IDRoom";

        $result = mysqli_query($conn, $sqlUpDate);
    ?>
    
    <?php
        $sql = "SELECT * FROM room ";
        // echo $sql;
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        
             while($row = mysqli_fetch_assoc($result)){
                
                echo "<div class='Table'>";
                echo "<form action='' method='GET'>";
                    echo "<tr>";
                    echo "<td><input type = 'text' value =" . $row["IDRoom"] . " readonly size='6' name='IDroom' class='IDRoom'> </td>";
                    echo "<td><input type = 'text' name ='Rprice'> </td>";
                    echo "<td><input type = 'text' name = 'eletric'> </td>";
                    echo "<td><input type = 'text' name = 'water'> </td>";
                    echo "<td><input type = 'date' name = 'dateA'> </td>"; 
                    echo "<input type='Submit' Value='ADD' class = 'BAdd' name ='BAdd'>";
                    echo "</tr>";  
                echo"</form>";
                echo "</div>";
        }
    }
    ?>
</body>
</html>
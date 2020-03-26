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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Gotu&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/HAdmin4.css">
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "300px";
            document.getElementById("main").style.marginLeft = "300px";
            }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
            }
        function confirmDelete() {
        return confirm("คุณต้องการลบข้อมูลผู้เช่า ?");
        }
        function confirmEdit() {
            return confirm("คุณต้องการแก้ไขข้อมูลผู้เช่า ?");
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
        <a href="addprice.php">ค่าหอ</a>
        <a href="Logout.php" >Log Out</a>
    </div>

        <?php 
        $textS = "";
        $BSearch = "";

        // if(isset($_GET['textS'])) $textS = $_GET['textS'];
        // if(isset($_GET['Bsearch'])) $BSearch = $_GET['Bsearch'];

        ?>
    <!-- Search form -->
    <div class="member">
        <h1>รายชื่อผู้เช่า</h1><br>
        <div class="searchbar">
            <form class="example" action="">
                <input type="text" placeholder="ค้นหา" name="textS" required>
                <button type="submit" class="Bsearch"><i class="fa fa-search"></i></button>
            </form><br>
            <form action="" method="get">
            <button type="submit" name ="Bsearch" value="1" class="Notpay">ค้างจ่าย</button>
            <button type="submit" name ="Bsearch" value="2" class="pay">จ่ายแล้ว</button>
            </form><br>
        </div>
        <!-- Search form -->

        <!-- Show Table  -->
        <table class="HeadADD">
          <tr>
              <td class="cos1">UserID</td>
              <td class="cos1">NAME</td>
              <td class="cos1">Username</td>
              <td class="cos1">Room NO.</td>
              <td class="cos1">Status</td>
          </tr>
          <?php
            // 2.SELECT
            $sql = "SELECT * FROM register INNER JOIN pstatus ON register.SPrice = pstatus.SPrice WHERE register.Status = 'user'";
            
            if(isset($_GET['textS'])){ 
                $textS = $_GET['textS'];
                // if($textS == NULL){
                //     header("Location:HAdmin.php");
                // }
                // else{
                    $sql .= "AND Username LIKE'%$textS%' OR IDRoom LIKE '%$textS%' OR NAME LIKE '%$textS%'";
                // }
            }

            else if(isset($_GET['Bsearch'])) {
                $BSearch = $_GET['Bsearch'];
                $sql .= "AND register.SPrice = '$BSearch'";
            }
               //3.EXECUTE
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                
                    while($row = mysqli_fetch_assoc($result)){
                    echo "<div class='TableShow'>";
                    echo "<Form action='Update.php'>";
                        echo "<tr>";
                        echo "<td class='cos2'><input type = 'text' value =" . $row["UserID"] . " readonly name='UserID' class='IDRoom'> </td>";
                        echo "<td class='cos2'><input type = 'text' name ='NAME' value =" . $row["NAME"] . " required> </td>";
                        echo "<td class='cos2'><input type = 'text' name = 'Username' value =" . $row["Username"] . " required> </td>";
                        echo "<td class='cos2'><input type = 'text' name = 'IDRoom' value =" . $row["IDRoom"] . " required</td>";
                        echo "<td class='cos2'><input type = 'text'  name = 'status' required 
                                value =" . $row["Status"] . " </td>";
                        echo "<td><input type='Submit' value='Edit' class='Edit' name='Update' onClick='return confirmEdit()'></td>"; 
                        echo "<td><input type='Submit' value='Delete' class='DELETE' name='Update' onClick='return confirmDelete()'> </td>";
                        echo "</tr>";
                    echo "</Form>";
                    echo "</div>";
                        }
                    }
            ?>
        </table>
    </div>

</body>

</html>
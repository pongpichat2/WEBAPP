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
    <link rel="stylesheet" href="CSS/Accrued2.css">
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
        <?php 
        //จำนวนทั้งหทด
            $sqlsum = "SELECT SUM(priceR) AS 'sum' FROM billsum";
            $Resum = mysqli_query($conn, $sqlsum);
            $row = mysqli_fetch_assoc($Resum);

        //ค้าจ่าย
            $sqlsum1 = "SELECT SUM(eletric) AS 'sum' FROM billsum";
            $Resum1 = mysqli_query($conn, $sqlsum1);
            $row1 = mysqli_fetch_assoc($Resum1);
        //จ่ายแล้ว
            $sqlsum2 = "SELECT SUM(water) AS 'sum' FROM billsum";
            $Resum2 = mysqli_query($conn, $sqlsum2);
            $row2 = mysqli_fetch_assoc($Resum2);

            $sumfull = $row['sum']+ (($row1['sum']*7)+($row2['sum']*9));
        ?>

    <button class="openbtn" onclick="openNav()">☰</button>
    <div class="counthmember">
        <div class="textCount">
            <h3>ค่าห้อง : <?php echo $row['sum'] ?> บาท</h3>
            <h4>ค่าน้ำ : <?php echo $row1['sum']*7?> บาท</h4>
            <h4>ค่าไฟ : <?php echo $row2['sum']*9?> บาท</h4>
            <h4>รวม : <?php echo $sumfull ?> บาท</h4>
        </div>
    </div>

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
    
    <div class="member">
        <h1>ผู้ค้างค่าเช่า</h1>

        <div class="searchbar">
            <form class="example" action="">
                <input type="text" placeholder="ค้นหา( NAME,Room.NO )" name="textS" required>
                <button type="submit" class="Bsearch"><i class="fa fa-search"></i></button>
                <a href="HAdmin.php"><button name ="Bsearch" value="3" class="ALL">ทั้งหมด</button></a>
            </form><br>
            
        </div>
        <table class="HeadADD">
          <tr>
              <td class="cos1">NAME</td>
              <td class="cos1">Bill NO.</td>
              <td class="cos1">Room</td>
              <td class="cos1">ค่าห้อง</td>
              <td class="cos1">ค่าไฟ</td>
              <td class="cos1">ค่าน้ำ</td>
              <td class="cos1">เดือน</td><br>
              <!-- <td class="cos1">Status</td> -->
          </tr>
          <?php
          $textS = "";
          $BSearch = "";
            // 2.SELECT
            $sql = "SELECT * FROM register INNER JOIN billsum ON register.IDRoom = billsum.IDRoom  WHERE register.Status = 'user' ";

            if(isset($_GET['textS'])){ 
                $textS = $_GET['textS'];
                // if($textS == NULL){
                //     header("Location:HAdmin.php");
                // }
                // else{
                    $sql .= "AND NAME LIKE'%$textS%' OR billsum.IDRoom LIKE'%$textS%'";
                // }
            }


               //3.EXECUTE
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                
                    while($row = mysqli_fetch_assoc($result)){
                        // $sql1 = "SELECT * FROM register INNER JOIN room ON register.IDRoom = room.IDRoom WHERE register.Status = 'user'";
                        // $resultMoney = mysqli_query($conn, $sql1);
                        // $rowMoney = mysqli_fetch_assoc($resultMoney);
                    echo "<div class='TableShow'>";
                    echo "<Form action='UpdateAcc.php'>";
                        echo "<tr>";
                        echo "<td class='cos2'><input type = 'text' value =" . $row["NAME"] . " readonly name='' class='IDRoom'></td>";
                        echo "<td class='cos2'><input type = 'text' name ='bill' value =" . $row["BillNo"] . " readonly> </td>";
                        echo "<td class='cos2'><input type = 'text' name ='' value =" . $row["IDRoom"] . " readonly> </td>";
                        echo "<td class='cos2'><input type = 'text' name = '' value =" . $row["priceR"] . " readonly> </td>";
                        echo "<td class='cos2'><input type = 'text' name = '' readonly value =" . $row["eletric"]*7 . " </td>";
                        echo "<td class='cos2'><input type = 'text'  name = '' readonly value =" . $row["water"]*9 . " </td>";
                        echo "<td class='cos2'><input type = 'text' name = '' readonly value =" . $row["Month"] . " </td>";
                        // echo "<td class='cos2'><input type = 'text' name = 'IDRoom' value =" . $row["typeRoom"] . " </td>";
                        // echo "<td><input type='Submit' value='Edit' class='Edit' name='Update' onClick='return confirmEdit()'></td>"; 
                        echo "<td><input type='Submit' value='Delete' class='DELETE' name='Update' onClick='return confirmDelete()'> </td>";
                        echo "</tr>";
                    echo "</Form>";
                    echo "</div>";
                        }
                    }
            ?>
          
    </body>

</html>
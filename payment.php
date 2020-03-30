<?php 
require("conn.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Gotu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/payment2.css">
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
            //map
            var position ={lat:19.049175, lng:99.936378};
                    function initMap(){
                    var map = new google.maps.Map(document.getElementById('googlemap'),{zoom:17 ,center: position});
                    var marker = new google.maps.Marker({position:position,map:map});
                }
    </script>
    <script async defer src="https://maps.googleapis.com./maps/api/js?key=AIzaSyD0pQkglEf2taBzD6Me2M7Iaz3-9Tic7RM&callback=initMap">
                    
    </script>

</head>

<body>
    <button class="openbtn" onclick="openNav()">☰</button>
    <div id="mySidebar" class="sidepanel">
        <h1>NAME : <?php echo $_SESSION['name'];?></h1>
        <h2>ROOM : <?php echo $_SESSION['room']; ?></h2>
        <a href="#" class="closebtn" onclick="closeNav()">×</a>  
        <a href="HUser.php">เช็คค่าหอ</a>
        <a href="payment.php">PAYMENT</a>
        <a href="Logout.php" >Log Out</a>
    </div>

            <div class="BillPay"><br>
                    <div ID="Map">
                    <h2>ที่ตั้งหอ</h2>
                    <div ID="googlemap">

                    </div>
                    </div>
 
                <div class = "headder"> <h1 class="Payment-Head">PAYMENT</h1></div>
                <div class="Textpay">
                <h3>บัญชีกรุงไทย : 095-5718xxxx</h3>
                <h3>บัญชีอมอมสิน : 195-55238xxxx</h3>
                <h3>พร้อมเพย์ : 062-443xxxx</h3>
                </div>
              <!-- MAP         -->   
              

                <div class="Textshow">
                    <h1>ชำระ : <input type="text" class="Sum" value="<?php echo$_SESSION['SUMFU'];  ?>" readonly>&nbsp;บาท.</h1>
                </div>

        
                               
                <div class="Button">
                    <h4><a href="https://www.facebook.com/pomgpichat.sumetha/" class="fa fa-facebook"> | Pongpichat</a>
                    <a href="https://www.instagram.com/" class="fa fa-instagram"> | Pongpichat</a></h4>
                
                </div>
            </div>
</body>
</html>
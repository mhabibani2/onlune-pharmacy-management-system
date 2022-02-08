<?php


session_start();

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}


 ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  
  <title>Online  Pharmacy  Management  System</title> 

</head>
<body style="font-family: tahoma;">

	<div class="topnav" id="myTopnav" style="background-color: black;">

  <h2 style="float:left; margin: 15px; font-size: 35px; margin-right: 50px; color: white;">
          LAAR Pharma
      </h2>
      <a href="index.php">HOME</a>
      <a href="work.php">HOW IT WORKS</a>
      <a href="Companies.php">COMPANIES</a>
      <a href="aboutus.php">ABOUT US</a>
      <a href="contactus.php">CONTACT US</a>
      <a href="admin/login.php">ADMIN</a>
      
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
      <a href="cart.php">
       <img src="data:image/png;base64,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"  style="width: 50px; height: 70px; margin-left:50px;"/>
       <div style="background-color:red; position: absolute; display: inherit; border-radius: 13px;min-width: 18px; color: white;">
        
       <?php echo count($_SESSION['cart']); ?></div>
      </a>
  
      </div>


<script>
  function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<div style="width: 100%; height: 5vh; background-color: #ffbd08;">
  <marquee scrollamount="5">
 
  <p style="font-size:23px;                color: #d53034;">
      “Every New Medicine Available Here.....20% Discount"
    </p>
  
  </marquee>
</div>
</body>
</html>
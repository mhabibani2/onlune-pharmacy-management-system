<?php

// ..........Search Bar...........

include_once "config.php";
$connection = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
if ( !$connection ) {
    echo mysqli_error( $connection );
}
$query="select Name,Price,Description,image from items";
$result=mysqli_query($connection,$query);
if(isset($_GET['search-submit']))
{
  $search=$_GET['search-text'];
  $query="select Name,Price,Description,image from items where Name like '".$search."%'";
  $result=mysqli_query($connection,$query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <title>Online  Pharmacy  Management  System</title>
</head>
<body>
  <div class="search-form">
  <form action="index.php" method="GET">
    <input type="text" placeholder="Enter Item Name to Search" name="search-text"/>
    <button type="submit" value="search" name="search-submit">Search
  </div>
  <center>
    <h1>
      Our Products
    </h1>
  <!-- items of showing -->

  <div class="setcard">

 <?php
while($item=mysqli_fetch_assoc($result))
{
 $Name="'".$item['Name']."'";
 $Price=$item['Price'];
 $Description="'".$item['Description']."'";
 $image=$item['image'];
 echo '<div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <img src="item_images/'.$image.'" alt="Avatar" style="width:300px;height:200px;border-radius:20px;">
      </div>
      <div class="flip-card-back">
        <h1>'.$Name.'</h1><br>
        <P style="text-align:center;">'.$Description.'</p>
        <p style="text-align:center;>'.$Price.'</p>
        <button type="button" onclick="addtocart('.$Name.','.$Description.','.$Price.')" class="orderbutton">Add to carts</button>
      </div>

    </div>

  </div>';
}
?>
    
</div>
<!-- .................................................. -->


<script type="text/javascript">
 function addtocart(a,b,c){
console.log('cart');
var data = {
    
      'name': a,
      'description': b,
      'price': c
    };

    // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
    jQuery.post('cart.php',  data, function(response) {
     window.location.reload();
    });
 }

</script>
</body>
</html>
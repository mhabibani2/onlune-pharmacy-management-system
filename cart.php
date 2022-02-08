
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script> src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"</script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    
<title>Online  Pharmacy  Management  System</title>

</head>

<body>
  <?php include 'header.php' ?>
  <?php include 'top.php'; ?>

  <div class="container" style="padding: 2%;" >
 <?php 
 
  if (isset($_POST['firstName'])){
    include_once "admin/config.php";
$connection = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME ); 
$_POST['date'] = date('d-m-Y');
$data = json_encode(array($_SESSION['cart'],$_POST));
  $query = "INSERT INTO orders(id,data) VALUES ('NULL','$data')";
            mysqli_query( $connection, $query );
            ?>
            <script>
            alert('Your Order Succesfully Placed');
            window.location.href = '/';
            </script>
            <?php
            $_SESSION['cart'] = array();
     } 
 
 if (isset($_GET['checkout'])) { 
    
 ?>
 <div class="row" style="
    background-color: white;
    border-radius: 10px;
    box-shadow: 2px 5px 12px;
">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill"><?= count($_SESSION['cart']) ?></span>
          </h4>
          <ul class="list-group mb-3">
           
            <?php $total=0;  foreach ($_SESSION['cart'] as $key ): ?>
             
               <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?= $key['name'] ?></h6>
                
              </div>
              <span class="text-muted">Rs. <?= $total += $key['price'] ?></span>
            </li>
               <?php endforeach ?>
          
            
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (PKR)</span>
              <strong><?= $total ?></strong>
            </li>
          </ul>

          
        </div>

        <!-- .......Carts Check Out...........Registration.......... -->
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" method="post" action="cart.php?checkout=1" novalidate="">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="lastName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" name="email" placeholder="enter your email">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" placeholder="address" required="">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Permanent Address<span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" name="address2" placeholder="Permanent Address">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <select class="custom-select d-block w-100" name="country" required="">
                  
                  <option>Pakistan</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">State</label>
                <select class="custom-select d-block w-100" name="state" required="">
                  
                  <option>Sindh</option>
                  <option>Punjab</option>
                  <option>Balochistan</option>
                  <option>KPK</option>
                </select>
                <div class="invalid-feedback">
                Please select a valid country.
                </div>
              </div>
              
            </div>
            <hr class="mb-4">
            
            
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                <label class="custom-control-label" for="credit">Cash on Delivery</label>
              </div>
              
              
            </div>
            
            
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" style="
           margin: 1%;">Place Order</button>
          </form>
        </div>
      </div>
      
    <?php  } else {  ?>  
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="display:<?php
        if (isset($_GET['clear'])){
         $_SESSION['cart'] = array();   
        }
        if (isset($_GET['remove'])){
            $t= array();
            foreach ($_SESSION['cart'] as $item){
                if ($item['name'] == $_GET['remove']){
                    
                } else {
                   array_push($t,$item); 
                }
            }
            $_SESSION['cart'] = $t;
        }
        
        if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>gyt</strong>
        </div>
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center text-info m-0">Products in your cart!</h4>
                </td>
              </tr>
              <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>
                  <a href="./cart.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
                </th>
              </tr>
            </thead>
            <tbody>
             <?php
    $Total = 0;
    $col = array('success','danger','info','warning','active');
     foreach ($_SESSION['cart'] as $key ): ?>
              <tr>
                <td>1</td>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                
                <td><?= $key['name'] ?></td>
                <td>
                  <i class="fas "></i>&nbsp;&nbsp;<?= $key['price'] ?>
                </td>
                <input type="hidden" class="pprice" value="<?= $key['price'] ?>">
                <td>
                  <input type="number" class="form-control itemQty" value="1" style="width:75px;">
                </td>
                <td><i class="fas "></i>&nbsp;&nbsp;<?= $key['price'] ?><?php $Total+=$key['price']; ?></td>
                <td>
                  <a href="cart.php?remove=<?= $key['name'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
               <?php endforeach ?>     
            
              <tr>
                <td colspan="3">
                  <a href="index.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
                    Shopping</a>
                </td>
                <td colspan="1"><b>Grand Total</b></td>
                <td><b><i class="fas "></i><?= $Total ?> &nbsp;&nbsp;</b></td>
                <td>
                  <a href="?checkout=1" class="btn btn-info <?= ($Total > 1) ? '' : 'disabled'; ?>"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
 <?php } ?>
 
 
 
 
  </div>






  <?php include 'footer.php' ?>
</body>
</html>


<?php





if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

if (isset($_POST['price'])) {
  array_push($_SESSION['cart'], $_POST);
}

?>
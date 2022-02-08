

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"         href="contactus.css">
<title>Online  Pharmacy  Management  System</title>
  </head>

<body style="background-color: #CACFD2;">
 <?php include 'header.php' ?>
  <?php include 'top.php' ?>

  <div class="main">
    <div class="container_a">
        <center>
          <i class="fa fa-envelope-square fa-5x"></i>
        </center>
        <br>
        <br>
        <center>
          <h1>
            Contact Us
          </h1>
        </center>
        <br>
      <br>
      <center>
        <h3>
          We would love to hear from you!
        </h3>
      </center>
      <br>
        <h3>
         Haroon Kamboh
               
        </h3>
        <br>
        <h3>
           Mazhar Yousif
        </h3>
    </div>
    <div class="container">
    <form action="">
        <div class="row">
          <div class="col-25">
            <label for="fname">First Name</label>
          </div>
          <div class="col-75">
            <input type="text" id="fname" name="firstname" placeholder="Enter Your name here..">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="lname">Last Name</label>
          </div>
          <div class="col-75">
            <input type="text" id="lname" name="lastname" placeholder="Your last name here..">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="country">Email@</label>
          </div>
          <div class="col-75">
            <input type="text" id="lname" name="email" placeholder="email@.com">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="subject">Subject</label>
          </div>
          <div class="col-75">
            <textarea id="subject" name="subject" placeholder="Enter Your Message here..." style="height:200px"></textarea>
          </div>
        </div>
        <div class="row">
            <input type="submit" value="Submit"> 
        </div>
      </form>
    </div> 
  </div>
  <?php include 'footer.php' ?>
</body>
</html>
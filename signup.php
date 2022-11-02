<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style >
    .alert {
padding: 20px;
background-color: #f44336;
color: white;
}
    </style>
    <?php $con=new mysqli("localhost","root","");
    $df="CREATE DATABASE IF NOT EXISTS PORT";
    $con->query($df);
    $us="USE PORT";
    $con->query($us);
    ?>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
  </head>

  <body class="bg">
    <link rel="stylesheet" href="style2.css">
    <center>
    <div class="box1">
    <h1 class="box2" style="color:AliceBlue ;font-family:optima;">Sign Up</h1>

    <form action="signup.php" method="POST">
      <input type="text" name="User1" placeholder="Username" required><br>
      <input type="email" name="emails" placeholder="Email" required><br>
      <input type="password" name="pass1" placeholder="Password" required>
      <br>
      <!-- <input type="radio" id="Authority" name="Category1" value="Authority">
  <label for="Authority">Port Authority</label><br>
  <input type="radio" id="Company" name="Category1" value="Company">
  <label for="Company">Company</label><br>
  <input type="radio" id="Admin" name="Category1" value="Admin">
  <label for="Admin">Administration</label><br>-->
  <input type="submit" value="Sign Up" name="sign1">
</form></center>
</div>
<?php
if(isset($_POST["sign1"])){
  // $x=$_POST["Category1"];
  $u=$_POST["User1"];
  $p=$_POST["pass1"];
  $e=$_POST["emails"];
    $de="INSERT INTO Shipping(Username,Password,Email) VALUES('$u','$p','$e')";
    if($con->query($de)){
      echo"<script>alert('Account created');window.location.href='signin.php'</script>";
//       echo'<div class="alert">
//   <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>
//   <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
// </div>';
    }
    else{
      echo"<script>alert('Account exists/incorrect credentials')</script>";
    }
  }

 ?>
  </body>
</html>
<!-- <div class="alert">
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
<strong>Danger!</strong> Indicates a dangerous or potentially negative action.
</div> -->

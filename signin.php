<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <style>label{
    padding:5px;
    color:#222;
    font-family:corbel,sans-serif;
    /* vertical-align: baseline; */
    font-size: 14px;
    margin: 10px;
}
input {
    display: table-cell;
    vertical-align: middle
}
/* body {
  background-image: url('gama.jpg');
  height: 100%;
} */
.bg {

  background-image: url("gama.jpg");
  height: 100%;
  /* background-position: center; */
  background-repeat: no-repeat;
  background-size: cover;
}
/* .fh{
  font-family: 'Alatsi';
} */
.box1 {
  width: 320px;
  padding: 2px;
  border: 3px solid white;
  background-color: AliceBlue;
  margin: 0;
  border-radius:25px;
}
.box2 {
  width: 320px;
  /* padding: 2px; */
  /* font-family: 'Alatsi'; */
  background-color: MediumSeaGreen;
  border-radius:25px;
  margin: 0;
}
.rad{
  font-family: 'Courier New', monospace;
}
input[type=text] {
  font-family: 'Courier New', monospace;
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  border-radius:25px;
  box-sizing: border-box;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
  background-color: white;
  background-image: url('user.jpg');
  background-position: 10px 10px;
  background-repeat: no-repeat;
}

input[type=text]:focus {
  font-family: 'Courier New', monospace;
  border: 3px solid #555;
}
input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border-radius:25px;
  border: 3px solid #ccc;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
  background-color: white;
  background-image: url('pass.jpg');
  background-position: 10px 10px;
  background-repeat: no-repeat;
}

input[type=password]:focus {
  font-family: 'Courier New', monospace;
  border: 3px solid #555;
}
input[type=submit]{
  font-family: 'Courier New', monospace;
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 16px 32px;
    border-radius:25px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
input[type="radio"] {
  font-family: 'Courier New', monospace;
  margin-top: -1px;
  vertical-align: middle;
}
h1 { font-family: Optima;}
</style>
  <?php
  session_start();
  $con=new mysqli("localhost","root","");
  $df="CREATE DATABASE IF NOT EXISTS PORT";
  $con->query($df);
  $us="USE PORT";
  $con->query($us);
  $cr="CREATE TABLE IF NOT EXISTS Authority(Username varchar(255) PRIMARY KEY,Password varchar(16) NOT NULL,Email varchar(50) NOT NULL)";
  $con->query($cr);
  $cs="CREATE TABLE IF NOT EXISTS Shipping(Username varchar(255) PRIMARY KEY,Password varchar(16) NOT NULL,Email varchar(50) NOT NULL)";
  $con->query($cs);
  $ct="CREATE TABLE IF NOT EXISTS Admin(Username varchar(255) PRIMARY KEY,Password varchar(16) NOT NULL)";
  $con->query($ct);
  $bv="CREATE TABLE IF NOT EXISTS Avadocks(Dock_no int PRIMARY KEY,Availability varchar(10))";
  $con->query($bv);
  // for($i=1;$i<100;){
  //   $lka="INSERT INTO Avadocks VALUES('$i','Yes')";
  //   $con->query($lka);
  // }
   ?>
    <meta charset="utf-8">
    <title>Sign in</title>
  </head>
  <body class="bg">
    <center>
      <div class="box1">
    <h1 class="box2" style="color:AliceBlue ;font-family: 'Courier New', monospace;">Sign In</h1>
    <form action="signin.php" method="POST">
      <input type="text" name="User" placeholder="Username" required><br>
      <input type="password" name="pass" placeholder="Password" required>
      <br>
      <div class="rad">
  <input type="radio" id="Authority" name="Category" value="Authority">
  <label for="Authority">Port Authority</label><br><br>
  <input type="radio" id="Company" name="Category" value="Company">
  <label for="Company">Company</label><br><br>
  <input type="radio" id="Admin" name="Category" value="Admin">
  <label for="Admin">Administration</label><br><br>
</div>
  <input type="submit" value="Sign In" name="sign">
</form>
<!-- <br> -->
<hr>
<form action="signup.php" method="post">
  <input type="submit" value="Sign Up">
</form>
</div>
<?php
  if(isset($_POST["sign"])){
    $x=$_POST["Category"];
    $u=$_POST["User"];
    $p=$_POST["pass"];
    // echo "e ".$x." s";
    if($x=="Admin"){
      $sp="SELECT *FROM Admin WHERE (Username='$u') ";
      if($res=$con->query($sp)){
        // echo "OK";
      }
      else{
        // echo"NOT OK";
      }
      if($res->num_rows>0){
        while($row=$res->fetch_assoc()){
          if($row['Username']==$u && $row['Password']==$p){
            $_SESSION["username"]=$u;
            echo"<script>window.location.href='welcome2.php'</script>";
          }
          else{
            echo"<script>alert('Incorrect password')</script>";
          }
        }
      }
      else{
        echo"<script>alert('Username incorrect')</script>";
      }
    }
    if($x=="Company"){
      $sp="SELECT *FROM Shipping WHERE (Username='$u') ";
      if($res=$con->query($sp)){
        // echo "OK";
      }
      else{
        // echo"NOT OK";
      }
      if($res->num_rows>0){
        while($row=$res->fetch_assoc()){
          if($row['Username']==$u && $row['Password']==$p){
            $_SESSION["username"]=$u;
            echo"<script>window.location.href='welcome1.php'</script>";
          }
          else{
            echo"<script>alert('Incorrect password')</script>";
          }
        }
      }
      else{
        echo"<script>alert('Username incorrect')</script>";
      }
    }
    if($x=="Authority"){
      $sp="SELECT *FROM Authority WHERE (Username='$u') ";
      if($res=$con->query($sp)){
        // echo "OK";
      }
      else{
        // echo"NOT OK";
      }
      if($res->num_rows>0){
        while($row=$res->fetch_assoc()){
          if($row['Username']==$u && $row['Password']==$p){
            $_SESSION["username"]=$u;
            echo"<script>window.location.href='welcome3.php'</script>";
          }
          else{
            echo"<script>alert('Incorrect password')</script>";
          }
        }
      }
      else{
        echo"<script>alert('Username incorrect')</script>";
      }
    }
  }

 ?>

  </body>
</html>

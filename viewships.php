<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script>
    function func1(){
      window.location.href="welcome1.php";
    }
    function func() {
      var x = document.getElementById("floating-menu");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    </script>
    <link rel="stylesheet" href="style4.css">
    <?php session_start();
    $con=new mysqli("localhost","root","");
    $df="CREATE DATABASE IF NOT EXISTS PORT";
    $con->query($df);
    $us="USE PORT";
    $con->query($us);
    if($_SESSION['username']==NULL || $_SESSION['type']!='Company'){
      echo"<script>window.location.href='signin.php'</script>";
    } ?>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="topnav" align="center">
    <!-- <button onclick="func()"><img src="user.png" /></button> -->
    <button class="but" onclick="func1()"><b>Home</b></button>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <h2 align="center" style="display:inline; color:white" >Marley Port</h2>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <button class="but" onclick="func()"><img src="user.png" width="20px" /></button>
    <!-- <form action="welcome1.php" method="POST">
    <input type="image" src="user.png" width="20px" name="but" class="but" >
    </form> -->
  </div><center>
<br><br>
    <h1 align='center' class="box2" style="color:white;">Details Of Your Ships</h1> <br><br>
      </center>
    <?php
    $x=$_SESSION['username'];
    $f="SELECT * FROM ships WHERE(Company='$x')";
    $res=$con->query($f);
    if($res->num_rows>0){
      echo"<table><tr><th>Ship id.</th><th>Size</th><th>Company</th><th>Type</th></tr>";
      while($row=$res->fetch_assoc()){
        echo"<tr><td>",$row['Ship_id'],"</td><td>",$row['Size'],"</td><td>",$row['Company'],"</td><td>",$row['Type'],"</td></tr>";
      }
      echo"</table>";
    }
     ?>
  </body>
</html>

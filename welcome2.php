 <!DOCTYPE html>
<html lang="en" dir="ltr">
<center>
  <head>
    <link rel="stylesheet" href="style2.css">
    <style>
/* table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
} */
</style>
    <?php
    session_start();
    $con=new mysqli("localhost","root","");
    $df="CREATE DATABASE IF NOT EXISTS PORT";
    $con->query($df);
    $us="USE PORT";
    $con->query($us);
     ?>
    <meta charset="utf-8">
    <title>Main2</title>

  </head>
  <body class="bg1">
    <div class="topnav">
      <a href="signin.php">log out</a>
    </div>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <div class="box1">
    <h2>Add Authority</h2>
    <!-- ADD EMAIL address AT THE END style="background-color: rgb(237, 250, 240);"-->
    <form action="welcome2.php" method="post">
      <input type="text" name="namae" placeholder="username">
      <input type="password" name="pass5" placeholder="Password">
      <input type="email" name="mail" class="mail"placeholder="email">
      <input type="submit" name="aw" value="Register">
    </form>
  </div><br><br>
  <div class="box1">
    <h2>Remove Authority</h2>
    <form action="welcome2.php" method="post">
      <input type="text" name="namae1" placeholder="username">
      <input type="submit" name="aw1" value="Remove">
    </form>
  </div><br><br>
    <div class="box1">
    <h2>Show All Authorities</h2>
    <form action="welcome2.php" method="post">
      <!-- <input type="text" name="namae1" placeholder="username"> -->
      <input type="submit" name="lk" id="lk" value="Show">
    </form>
    <br><br>
    </div>

    <?php
    echo $_SESSION["username"];
      if(isset($_POST['aw'])){
        $i=$_POST['namae'];
        $t=$_POST['pass5'];
        $m=$_POST['mail'];
        $ao="INSERT INTO Authority VALUES('$i','$t','$m') ";
        if($con->query($ao)){
          echo"<script> alert('Authority added')</script>";
        }
        else{
          echo"<script> alert('Given authority already exists')</script>";
        }
      }
      else if(isset($_POST['aw1'])){
        $i=$_POST['namae1'];
        $ac="DELETE FROM Authority WHERE Username='$i'";
        if($con->query($ac)){
          echo"<script> alert('Authority removed')</script>";
        }
      }
      else if(isset($_POST['lk'])){
        $tb="SELECT *FROM Authority";
        $res=$con->query($tb);
        if($res->num_rows>0){
          echo"<br><br><table><tr><th>Name</th><th>Email address</th></tr>";
          while($row=$res->fetch_assoc()){
            echo"<tr><td>",$row['Username'],"</td><td>",$row['Email'],"</td></tr>";
          }
          echo"</table>";
          echo "<script>document.getElementById('lk').style.display='none'</script>";
        }
      }

     ?>
     <br><br>
     <div class="box1">
     <h2>Reset password</h2>
     <form action="welcome2.php" method="post">
       <input type="text" name="namae6" placeholder="username">
       <input type="password" name="pass6" placeholder="New Password">
       <input type="submit" name="awp" value="Change Password">
     </form>
   </div>
     <?php



     ?>
  </body>
</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
    session_start();
    $con=new mysqli("localhost","root","");
    $df="CREATE DATABASE IF NOT EXISTS PORT";
    $con->query($df);
    $us="USE PORT";
    $con->query($us);
    $dl="CREATE TABLE IF NOT EXISTS Ships(Ship_id varchar(10) PRIMARY KEY,Size int NOT NULL,Company varchar(255) NOT NULL,Type varchar(10) NOT NULL)";
    $con->query($dl);
    $de="CREATE TABLE IF NOT EXISTS Requests(Ship_id varchar(10) PRIMARY KEY,Size int NOT NULL,Company varchar(255) NOT NULL,Type varchar(10) NOT NULL,req_date Date)";
    $con->query($de);
    $dx="CREATE TABLE IF NOT EXISTS Departure(Ship_id varchar(10) PRIMARY KEY,Size int NOT NULL,Company varchar(255) NOT NULL,Type varchar(10) NOT NULL,req_date Date)";
    $con->query($dx);
     ?>
     <script>
</script>
<link rel="stylesheet" href="style2.css">
    <meta charset="utf-8">
    <title>Main1</title>
  </head>
  <body class="bg">
    <center>
      <div class="box1">
      <h2>Register Your Ship</h2>
      <form action="welcome1.php" method="post">
        <input type="text" name="t1" placeholder="ship id" required>
        <input type="text" name="t2" placeholder="Size" required>
        <input type="text" name="t3" placeholder="Company" required>
        <br><br>
        <!-- <input type="text" name="t4" placeholder="Type"> -->
        <!-- <div class="custom-select" style="width:200px;"> -->
        <select name="t4" id="t" required class="abc">
    <option value="Passenger" class="abc">Passenger</option>
    <option value="Bulk-Carrier" class="abc">Bulk-Carrier</option>
    <option value="Tanker-ship" class="abc">Tanker-ship</option>
    <option value="Naval-ship" class="abc">Naval-ship</option>
    <option value="Container-ship" class="abc">Container-ship</option>
    <option value="Special-purposes" class="abc">Special-purposes</option>
  </select>
  <!-- </div> -->
  <br><br>
        <input type="submit" value="Request" name="but3">
      </form>
    </div>
    <br><br>
    <div class="box1">
    <h3>Docking permision</h3>
    <form action="welcome1.php" method="post">
      <input type="text" name="id" placeholder="ship id">
      <input type="date" name="dat" class="abd"><br><br>
      <input type="submit" value="Request" name="but1">
    </form>
  </div><br><br>
    <div class="box1">
    <h3>Departure permision</h3>
    <form action="welcome1.php" method="post">
      <input type="text" name="id1" placeholder="ship id">
      <input type="date" name="dat1" class="abd" ><br><br>
      <input type="submit" value="Request" name="but2">
    </form>
    </div>
  </center>
    <?php
    echo $_SESSION["username"];
      if(isset($_POST['but3'])){
        $i=$_POST['t1'];
        $s=$_POST['t2'];
        $c=$_POST['t3'];
        $t=$_POST['t4'];
        // echo $t;
        $fg="INSERT INTO Ships VALUES('$i','$s','$c','$t') ";
        if($con->query($fg)){
          echo"<script>alert('Ship added successfully')</script>";
        }
      }
    elseif (isset($_POST['but1'])) {
      $i=$_POST['id'];
      $s=$_POST['dat'];
      $st="SELECT * FROM Ships WHERE Ship_id='$i'; ";
    $res=$con->query($st);
      if($res->num_rows>0){
        while($row=$res->fetch_assoc()){
          $op=$row['Ship_id'];
          $xp=$row['Size'];
          $yp=$row['Company'];
          $tp=$row['Type'];
      $hu="INSERT INTO Requests VALUES('$op','$xp','$yp','$tp','$s') ";
      if($con->query($hu)){
        echo"<script>alert('Requested')</script>";
      }
}}
    }
    elseif (isset($_POST['but2'])) {
      $i=$_POST['id1'];
      $s=$_POST['dat1'];
      $st="SELECT * FROM Ships WHERE Ship_id='$i'; ";
    $res=$con->query($st);
      if($res->num_rows>0){
        while($row=$res->fetch_assoc()){
          $op=$row['Ship_id'];
          $xp=$row['Size'];
          $yp=$row['Company'];
          $tp=$row['Type'];
      $hhu="INSERT INTO Departure VALUES('$op','$xp','$yp','$tp','$s') ";
      if($con->query($hhu)){
        echo"<script>alert('Departure Requested')</script>";
      }
  }}
    }
     ?>
  </body>
</html>

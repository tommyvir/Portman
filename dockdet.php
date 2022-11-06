<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <link rel="stylesheet" href="style4.css">
    <?php
    session_start();
    $con=new mysqli("localhost","root","");
    $df="CREATE DATABASE IF NOT EXISTS PORT";
    $con->query($df);
    $us="USE PORT";
    $con->query($us);
    if($_SESSION['username']==NULL || $_SESSION['type']!='Authority'){
      echo"<script>window.location.href='signin.php'</script>";
    }
    ?>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $f="SELECT * FROM DOCKS";
    $res=$con->query($f);
    if($res->num_rows>0){
      echo"<table><tr><th>Dock No.</th><th>Ship id.</th><th>Size</th><th>Company</th><th>Type</th><th>Entry Date</th></tr>";
      while($row=$res->fetch_assoc()){
        echo"<tr><td>",$row['Dock_No'],"</td><td>",$row['Ship_id'],"</td><td>",$row['Size'],"</td><td>",$row['Company'],"</td><td>",$row['Type'],"</td><td>",$row['Entry_Date'],"</td></tr>";
      }
      echo"</table>";
    }
     ?>
  </body>
</html>

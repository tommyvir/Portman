<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style >

  html {
    font-family: sans-serif;
  }

  table {
    border-collapse: collapse;
    border: 2px solid rgb(200,200,200);
    letter-spacing: 1px;
    font-size: 0.8rem;
  }

  td, th {
    border: 1px solid rgb(190,190,190);
    padding: 10px 20px;
  }

  td {
    text-align: center;
  }

  caption {
    padding: 10px;
  }

    </style>
    <link rel="stylesheet" href="style.css">
    <?php
    session_start();
    $con=new mysqli("localhost","root","");
    $df="CREATE DATABASE IF NOT EXISTS PORT";
    $con->query($df);
    $us="USE PORT";
    $con->query($us);
    $ta="CREATE TABLE IF NOT EXISTS Docks(Dock_No int NOT NULL UNIQUE,Ship_id varchar(10) PRIMARY KEY,Size int NOT NULL,Company varchar(255) NOT NULL,Type varchar(10) NOT NULL,Entry_Date Date)";
    $con->query($ta);

     ?>
     <center>
    <meta charset="utf-8">
    <title>Port Authority</title>
  </head>
  <body>
    <h2>Arrival Request</h2>
    <div class="box1">
    <form action="welcome3.php" method="POST">
      <input type="submit" value="Show requests" id='lk' name="show">
      <!-- <input type="text" name="nam1" placeholder="Id"> -->
    </form>
    <form action="welcome3.php" method="POST">
      <input type="text" name="id" placeholder="Ship id">
      <input type="text" name="dock" placeholder="Assign Dock">
      <input type="submit" name="button" value="Accept Request">
    </form>
  </div>
  <h2>Departure Request</h2>
  <div class="box1">
  <form action="welcome3.php" method="POST">
    <input type="submit" value="Show requests" id='lk' name="show1">
    <!-- <input type="text" name="nam1" placeholder="Id"> -->
  </form>
  <form action="welcome3.php" method="POST">
    <input type="text" name="id1" placeholder="Ship id">
    <input type="submit" name="button1" value="Accept Request">
  </form>
</div>
</center>
<?php
echo $_SESSION["username"];
    if(isset($_POST['show'])){
      $tb="SELECT *FROM Requests";
      $res=$con->query($tb);
      if($res->num_rows>0){
        echo"<table><tr><th>Ship ID</th><th>Size</th><th>Company</th><th>Type</th><th>Requested Date</th></tr>";
        while($row=$res->fetch_assoc()){
          echo"<tr><td>",$row['Ship_id'],"</td><td>",$row['Size'],"</td><td>",$row['Company'],"</td><td>",$row['Type'],"</td><td>",$row['req_date'],"</td></tr>";
        }
        echo"</table>";
        echo "<script>document.getElementById('lk').style.display='none'</script>";
      }
    }
    else if(isset($_POST['button'])){
      $ha=$_POST["id"];
      $hs=$_POST["dock"];
      $se="SELECT *FROM Avadocks where Dock_no='$hs'";
      $res=$con->query($se);
      if($res->num_rows>0){
        while($row=$res->fetch_assoc()){
          if($row['Availability']=="Yes"){
            $ok="UPDATE Avadocks SET Availability='No' WHERE Dock_no='$hs'";
            $con->query($ok);
            $hj="SELECT *FROM Requests WHERE Ship_id='$ha'";
            $rea=$con->query($hj);
            if($rea->num_rows>0){
              while($rowq=$rea->fetch_assoc()){
                $r1=$rowq['Ship_id'];
                $r2=$rowq['Size'];
                $r3=$rowq['Company'];
                $r4=$rowq['Type'];
                $r5=$rowq['req_date'];
                $jk="INSERT INTO DOCKS VALUES('$hs','$r1','$r2','$r3','$r4','$r5')";
                $con->query($jk);
                $pok="SELECT *FROM Ships where Ship_id='$ha'";
                $ret=$con->query($pok);
                if($ret->num_rows>0){
                  while($rowh=$ret->fetch_assoc()){
                    $em=$rowh['Company'];
                    $ty="SELECT *FROM Shipping where Username='$em'";
                    $reg=$con->query($ty);
                    if($reg->num_rows>0){
                      while($rowy=$reg->fetch_assoc()){
                      $to=$rowy['Email'];
                      $subject="Docking request";
                      // $from=
                      $txt="Your request has been accepted kindly dock into".$hs."Thank you";
                      $email="rishithreddyaduma@gmail.com";
                      $header = "From:abc@somedomain.com \r\n";
                          $header .= "Cc:afgh@somedomain.com \r\n";
                          $header .= "MIME-Version: 1.0\r\n";
                          $header .= "Content-type: text/html\r\n";
                      mail($to,$subject,$txt,$header);
                      }
                    }
                  }
                }
                $lo="DELETE FROM Requests Where Ship_id='$ha'";
                $con->query($lo);
              }
            }
          }
        else{
            echo"<script>alert('Specified Dock is Not Available')</script>";
        }
        }
      }
    }
    if(isset($_POST['show1'])){
      $tb="SELECT *FROM Departure";
      $res=$con->query($tb);
      if($res->num_rows>0){
        echo"<table><tr><th>Ship ID</th><th>Size</th><th>Company</th><th>Type</th><th>Requested Date</th></tr>";
        while($row=$res->fetch_assoc()){
          echo"<tr><td>",$row['Ship_id'],"</td><td>",$row['Size'],"</td><td>",$row['Company'],"</td><td>",$row['Type'],"</td><td>",$row['req_date'],"</td></tr>";
        }
        echo"</table>";
        echo "<script>document.getElementById('lk').style.display='none'</script>";
      }
    }

     else if(isset($_POST['button1'])){
      $ha=$_POST["id1"];
      // $hs=$_POST["dock"];
      echo "gay";
      echo $ha;
      echo "gay";
      $pqr="SELECT * FROM Docks WHERE Ship_id='$ha'  ";
      $abc=$con->query($pqr);
      if($abc->num_rows>0){
        while($opj=$abc->fetch_assoc()){
          global $fx;
          $fx=$opj['Dock_No'];
        }

      $se="DELETE FROM docks where Dock_No='$fx'";
      $res=$con->query($se);
                $pok="SELECT *FROM Ships where Ship_id='$ha'";
                $ret=$con->query($pok);
                $ok="UPDATE Avadocks SET Availability='Yes' WHERE Dock_no='$fx'";
                $con->query($ok);
                if($ret->num_rows>0){
                  while($rowh=$ret->fetch_assoc()){
                    $em=$rowh['Company'];
                    $ty="SELECT *FROM Shipping where Username='$em'";
                    $reg=$con->query($ty);
                    if($reg->num_rows>0){
                      while($rowy=$reg->fetch_assoc()){
                      $to=$rowy['Email'];
                      $subject="Docking request";
                      // $from=
                      $txt="Your request has been accepted.Please vacate from dock ".$fx." Thank you";
                      $email="rishithreddyaduma@gmail.com";
                      $header = "From:abc@somedomain.com \r\n";
                          $header .= "Cc:afgh@somedomain.com \r\n";
                          $header .= "MIME-Version: 1.0\r\n";
                          $header .= "Content-type: text/html\r\n";
                      mail($to,$subject,$txt,$header);
                      }
                    }

                  }
                }
                $lo="DELETE FROM Departure Where Ship_id='$ha'";
                $con->query($lo);
              }
          else{
            echo"<script>alert('Specified Dock fu is Not Available')</script>";
          }
        }
 ?>
  </body>
</html>

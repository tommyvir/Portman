<?php
$to="210010029@iitdh.ac.in";
$subject="i m happy";
// $from=
$txt="mailmailmail";
$email="rishithreddyaduma@gmail.com";
$header = "From:abc@somedomain.com \r\n";
    $header .= "Cc:afgh@somedomain.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

if(mail($to,$subject,$txt,$header)){
  echo"Success";
}
  else{
    echo"Failed";
  }
  ?>

<?php 
  session_start(); 
  include "../../../db.php";
  $contract_Key = $_GET['contract_Key'];

  $ret=mysqli_query($link,"DELETE FROM `contract` where `contract_Key`='$contract_Key';");
  if ($ret) {
    $url = "../keep.php"; 
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
  } else {
    echo mysqli_error();
  }

?>
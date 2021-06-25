<?php session_start(); 
  if ($_SESSION["account"] == "") {
    $url = "./webpage/login/login.html";
  } else {
    $url = "./home.html";
  }
  echo "<script type='text/javascript'>";
  echo "window.location.href='$url'";
  echo "</script>"; 

?> 

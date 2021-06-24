<?php 
  session_start(); 
  include "../../db.php";
  $account = $_SESSION['account'];
  $dataURL = $_GET['dataURL'];
  $data = base64_decode($dataURL);
  file_put_contents('../signed/signature.png', $data);
  $contract_Key = $_GET['contract_Key'];
  $role = $_GET['role'];
  $sign_date = date('Y-m-d');
  $id = $contract_Key.$role;

  $ret=mysqli_query($link,"INSERT INTO `contract_sign` (`ID`, `role`,`contract_Key`, `account`, `sign_date`, `dataURL`) VALUES ('$id', '$role', '$contract_Key', '$account', '$sign_date', '$dataURL')");
  if ($ret) {
    $url = "../created.php?contract_Key=$contract_Key"; 
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
    // echo $dataURL;
  } else {
    echo mysqli_error();
  }
  
?>
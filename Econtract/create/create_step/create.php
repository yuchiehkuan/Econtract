<?php 
  session_start(); 
  include "../../../../db.php";
  $contract_name = $_POST['contract_name'];
  $contract_purpose = $_POST['contract_purpose'];
  $user_account_A = $_POST['user_account_A'];
  $user_account_B = $_POST['user_account_B'];
  $contract_id = $contract_name.$user_account_A.$user_account_B;
  $contract_content = $_POST['contract_content'];
  $transaction_count = $_POST['transaction_count'];
  $contract_date = $_POST['contract_date'];
  $contract_money = $_POST['contract_money'];
  $contract_Key = generateRandomString();
  
  $ret=mysqli_query($link,"INSERT INTO `transaction` (`contract_Key`, `contract_money_date`, `contract_money`) VALUES ('$contract_Key', '$contract_date', '$contract_money')");

  for ($i = 1 ; $i <= $transaction_count ; $i++ ) {
    $contract_date_i = "contract_date".$i;
    $contract_money_i = "contract_money".$i;
    $contract_date = $_POST[$contract_date_i];
    $contract_money = $_POST[$contract_money_i];
    $ret=mysqli_query($link,"INSERT INTO `transaction` (`contract_Key`, `contract_money_date`, `contract_money`) VALUES ('$contract_Key', '$contract_date', '$contract_money')");
  }

  function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString.date('Ymd') ;
  }

  $ret=mysqli_query($link,"INSERT INTO `contract` (`contract_name`, `contract_purpose`, `user_account_A`, `user_account_B`, `contract_id`, `contract_content`, `contract_Key`) VALUES ('$contract_name', '$contract_purpose', '$user_account_A', '$user_account_B', '$contract_id', '$contract_content', '$contract_Key')");
  if ($ret) {
    $url = "../created.php?contract_Key=$contract_Key"; 
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
  } else {
    echo mysqli_error();
  }

?>
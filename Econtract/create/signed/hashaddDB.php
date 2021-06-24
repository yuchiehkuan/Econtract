<?php
    include "../../db.php";
    $contract_Key = $_GET['contract_Key'];
    $transactionHash = $_GET['transactionHash'];
    date_default_timezone_set('Asia/Taipei');    
    $upload_date = date('Y-m-d H:i:s');
    $ret=mysqli_query($link,"INSERT INTO `Hash` (`transactionHash`, `contract_Key`,`upload_date`) VALUES ('$transactionHash', '$contract_Key', '$upload_date')");
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
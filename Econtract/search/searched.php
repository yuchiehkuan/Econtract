<?php 
    session_start(); 
    include "../db.php";
    $contract_Key = $_POST['search'];
    if ($contract_Key == "") {
        $search = "null";
    } else {
        $search = "not null";
    }
    $url = "./search.php?contract_Key=$contract_Key&&search=$search"; 
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
?>
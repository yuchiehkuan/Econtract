<?php 
    session_start(); 
    include "../db.php";
    $transactionHash = $_POST['search'];
    if ($transactionHash == "") {
        $search = "null";
    } else {
        $search = "not null";
    }
    $url = "./search.php?transactionHash=$transactionHash&&search=$search"; 
    echo "<script type='text/javascript'>";
    echo "window.location.href='$url'";
    echo "</script>";
?>
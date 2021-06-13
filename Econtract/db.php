<?php
    $link = mysqli_connect('python-database1.cpvvny2e3rlu.ap-southeast-1.rds.amazonaws.com:3306', 'admin', 'adminfordb1');
    if (!$link) {
        die("無法連線:".mysqli_error($link));
    }
    mysqli_query($link,"set NAMES `utf8`"); //針對 $link 這個資料庫進行SQL查詢
    //選擇資料庫
    $db = mysqli_select_db($link, 'python_db1');
    if (!$db) {
        die ('選擇資料庫失敗 : ' . mysqli_error($link));
    }
?>
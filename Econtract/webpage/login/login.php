<?php
    session_start(); 
    include "../../db.php";

    $account = $_POST['account'];
    $password = $_POST['pwd'];
 
    $ret=mysqli_query($link,"SELECT * FROM `user` where `account`='$account' and `password`='$password'");
    
    if (mysqli_num_rows($ret)>0) {
        while($row=mysqli_fetch_array($ret)){
            $account = $row['account'];
            $user_name = $row['firstname'].' '.$row['lastname'];
            
            if ($row['gender'] == 0) {
                $gender = '先生';
            } else {
                $gender = '女士';
            }
            $_SESSION['account'] = $account;
            $_SESSION['name'] = $user_name;
            $_SESSION['gender'] = $gender;
        }
        $url = "../../home.html";
        echo "<script type='text/javascript'>";
        echo "window.location.href='$url'";
        echo "</script>"; 
    } else {
        $url = "./login.html";
        echo "<script type='text/javascript'>";
        echo "alert('帳號密碼錯誤！');";
        echo "window.location.href='$url'";
        echo "</script>"; 
    }

?>
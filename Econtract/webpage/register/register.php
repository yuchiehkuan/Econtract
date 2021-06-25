<?php
    session_start(); 
    include "../../db.php";

    $account = $_POST['account'];
    $password = $_POST['pwd'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $personal_id = $_POST['personal_id'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $eth_account = $_POST['eth_account'];
    // echo $eth_account;

    // $chkvalue = [{id: 'account', value: $account} , {id: 'password', value: $password}, {id: 'firstname', value: $firstname}, {id: 'lastname', value: $lastname}, {id: 'gender', value: $gender}, {id: 'mobile', value: $mobile},  {id: 'email', value: $email}];

 
    $ret=mysqli_query($link,"SELECT * FROM `user` where `account`='$account'");
    
    if (mysqli_num_rows($ret)>0) {
        $url = "./register.html";
        echo "<script type='text/javascript'>";
        echo "alert('帳號已註冊！');";
        echo "window.location.href='$url'";
        echo "</script>"; 
    } else {
        $ret2=mysqli_query($link,"INSERT INTO `user` (`account`, `ID`, `password`, `firstname`, `lastname`, `gender`, `mobile`, `address`, `eth_account`) VALUES ('$account', '$personal_id', '$password', '$firstname', '$lastname', '$gender', '$mobile', '$address', '$eth_account')");
        if ($ret2) {
            $url = "../login/login.html";
            echo "<script type='text/javascript'>";
            echo "alert('註冊成功！');";
            echo "window.location.href='$url'";
            echo "</script>"; 
        } else {
            $url = "../register/register.html";
            echo "<script type='text/javascript'>";
            echo "alert('註冊失敗！');";
            echo "window.location.href='$url'";
            echo "</script>"; 
        }
    }

?>
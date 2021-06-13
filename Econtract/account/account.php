<?php 
  session_start(); 
  include "../db.php";
  $account = $_SESSION['account'];
  $ret=mysqli_query($link,"SELECT * FROM `user` where `account`='$account';");
  if (mysqli_num_rows($ret)>0) {
    while($row=mysqli_fetch_array($ret)){
        $eth_account = $row['eth_account'];
        $_SESSION['eth_account'] = $eth_account;
        setcookie('eth_account', $eth_account);
    }
  }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../main.css">
        <script src="https://kit.fontawesome.com/57bd783e21.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../node_modules/web3/dist/web3.min.js"></script>
        <script src="./account.js"></script>
    </head>
    <body>
        <ul>
            <li><a href="../home.html">Home</a></li>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropbtn"><i class="fas fa-bars fa-1g"></i></a>
              <div class="dropdown-content">
                <a href="#home">帳號資訊</a>
                <a href="../create/create.html">創建合約</a>
                <a href="../search/search.php">查詢合約</a>
                <a href="../transaction/transaction.html">系統對帳</a>
                <a href="../login/login.html">登出</a>
              </div>
            </li>
        </ul><br>
        <fieldset>
            <label>User Account：</label><?php echo $_SESSION['account'];?><br>
            <label>User Name：</label><?php echo $_SESSION['name'].' '.$_SESSION['gender'];?><br>
            <label>ETH Account：</label><span id="account"></span><br>
            <label>Balance：</label><span id="balance"></span><br>        
        </fieldset>
    </body>
</html>
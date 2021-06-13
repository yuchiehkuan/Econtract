<?php 
  session_start(); 
  include "../db.php";
  $account = $_SESSION['account'];
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
        <table> 
            <th>合約名稱</th><th>合約金鑰</th><th>操作</th>
            <?php 
                $ret=mysqli_query($link,"SELECT * FROM `contract` where `user_account_A`='$account' or `user_account_B`='$account' and  `contract_time` = null;");
                if (mysqli_num_rows($ret)>0) {
                    while($row=mysqli_fetch_array($ret)){
                        $contract_name = $row['contract_name'];
                        $contract_Key = $row['contract_Key'];
                        echo "<tr><td>".$contract_name."</td><td>".$contract_Key."</td><td><a href='./created.php?contract_Key=$contract_Key'><i class='fas fa-eye'></i></a><a href='./create_step/delete.php?contract_Key=$contract_Key'><i class='fas fa-trash-alt'></i></a></td></tr>";
                    }
                }
            ?>
        </table><br>  
    </body>
</html>
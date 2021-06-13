<?php 
  session_start(); 
  include "../../db.php";
  $account = $_SESSION['account'];
  $contract_name = $_POST['contract_name'];
  $contract_purpose = $_POST['contract_purpose'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../main.css">
        <link rel="stylesheet" href="../create.css">
        <script src="https://kit.fontawesome.com/57bd783e21.js" crossorigin="anonymous"></script>
        <script src="../create.js"></script> 
    </head>
    <body>
        <ul>
            <li><a href="../../home.html">Home</a></li>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropbtn"><i class="fas fa-bars fa-1g"></i></a>
              <div class="dropdown-content">
                <a href="../../account/account.html">帳號資訊</a>
                <a href="#home">創建合約</a>
                <a href="../../search/search.php">查詢合約</a>
                <a href="../../transaction/transaction.html">系統對帳</a>
                <a href="../../login/login.html">登出</a>
              </div>
            </li>
        </ul><br>
        <fieldset>
            <form action="./create4.php" method="POST">
            <label>立書人：</label><br>
            <?php
                $contract_person = $_POST['contract_person'];
                if ($contract_person == 'A') {
                    echo "<label>乙方使用者帳號：</label><input type='text' id='user_account_B' name='user_account_B'>";
                    echo "<input type='hidden' id='user_account_A' name='user_account_A' value='".$account."'>";
                } else if($contract_person == 'B'){
                    echo "<label>甲方使用者帳號：</label><input type='text' id='user_account_A' name='user_account_A'>";
                    echo "<input type='hidden' id='user_account_B' name='user_account_B' value='".$account."'>";
                }           
            ?>
            <?php
            echo "<input type='hidden' id='contract_name' name='contract_name' value='".$contract_name."'>";
            echo "<input type='hidden' id='contract_purpose' name='contract_purpose' value='".$contract_purpose."'>";
            ?>
            <input type="submit" value="Next">
            </form>
        </fieldset>
    </body>
</html>
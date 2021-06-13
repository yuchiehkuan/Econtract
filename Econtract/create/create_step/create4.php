<?php 
  session_start(); 
  include "../../db.php";
  $account = $_SESSION['account'];
  $contract_name = $_POST['contract_name'];
  $contract_purpose = $_POST['contract_purpose'];
  $user_account_A = $_POST['user_account_A'];
  $user_account_B = $_POST['user_account_B'];
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
            <form action="./create.php" method="POST">
            <label>合約內容(條文)：</label><br>
            <textarea type="text" id="contract_content" name="contract_content" placeholder="合約內容(條文)"></textarea>
            
            <label>交易方式：</label><br>
            <input type="datetime-local" id="contract_date" name="contract_date" placeholder="日期">前
            <input type="number" id="contract_money" name="contract_money" placeholder="金額">
            <span id="contract_dates"></span>
            <input type="button" onclick="return add_transaction()" value="+"><br>
            <input type="hidden" id="transaction_count" name="transaction_count" value="0">
            <?php
            echo "<input type='hidden' id='contract_name' name='contract_name' value='".$contract_name."'>";
            echo "<input type='hidden' id='contract_purpose' name='contract_purpose' value='".$contract_purpose."'>";
            echo "<input type='hidden' id='user_account_A' name='user_account_A' value='".$user_account_A."'>";
            echo "<input type='hidden' id='user_account_B' name='user_account_B' value='".$user_account_B."'>";
            ?>
            <input type="submit" value="Next">
            </form>
        </fieldset>
    </body>
</html>
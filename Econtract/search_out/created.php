<?php
    session_start(); 
    include "../db.php";
    $contract_Key = $_GET['contract_Key'];
    $ret2=mysqli_query($link,"SELECT * FROM `contract` where `contract_Key`='$contract_Key';");
    if (mysqli_num_rows($ret2)>0) {
        while($row2=mysqli_fetch_array($ret2)){
            $user_account_A = $row2['user_account_A'];
            $user_account_B = $row2['user_account_B'];
            $contract_name = $row2['contract_name'];
            $contract_purpose = $row2['contract_purpose'];
            $contract_id = $row2['contract_id'];
            $contract_content = $row2['contract_content'];
            $contract_Key = $row2['contract_Key'];
        }
    }
    $ret3=mysqli_query($link,"SELECT * FROM `user` where `account`='$user_account_A';");
    if (mysqli_num_rows($ret3)>0) {
        while($row3=mysqli_fetch_array($ret3)){
            $A_account = $row3['account'];
            $A_id = $row3['ID'];
            $A_name = $row3['firstname']." ".$row3['lastname'];
            $A_mobile = $row3['mobile'];
            $A_address = $row3['address'];
            $A_ethAccount = $row3['eth_account'];
        }
    }

    $ret4=mysqli_query($link,"SELECT * FROM `user` where `account`='$user_account_B';");
    if (mysqli_num_rows($ret4)>0) {
        while($row4=mysqli_fetch_array($ret4)){
            $B_account = $row4['account'];
            $B_id = $row4['ID'];
            $B_name = $row4['firstname']." ".$row4['lastname'];
            $B_mobile = $row4['mobile'];
            $B_address = $row4['address'];
            $B_ethAccount = $row4['eth_account'];
        }
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../main.css">
        <link rel="stylesheet" href="./search.css">
        <script src="https://kit.fontawesome.com/57bd783e21.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <ul>
            <li><a href="../home.html">Home</a></li>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropbtn"><i class="fas fa-bars fa-1g"></i></a>
              <div class="dropdown-content">
                <a href="../account/account.php">帳號資訊</a>
                <a href="./create.html">創建合約</a>
                <a href="../search/search.php">查詢合約</a>
                <a href="../transaction/transaction.html">系統對帳</a>
                <a href="../login/login.html">登出</a>
              </div>
            </li>
        </ul><br>
        <fieldset>
            <form action="<?=$url?>">
            <label>合約名稱：</label><?php echo " ".$contract_name; ?><br>
            <label>目的：</label><br><?php echo $contract_purpose; ?><br>
            <label>立書人：</label>
            <table> 
              <th>項目</th><th>甲方</th><th>乙方</th>
              <tr><td>使用者帳號</td><td><?php echo $A_account;?></td><td><?php echo $B_account;?></td></tr>
              <tr><td>身分證字號/統編</td><td><?php echo $A_id;?></td><td><?php echo $B_id;?></td></tr>
              <tr><td>姓名</td><td><?php echo $A_name;?></td><td><?php echo $B_name;?></td></tr>
              <tr><td>聯絡電話</td><td><?php echo $A_mobile;?></td><td><?php echo $B_mobile;?></td></tr>
              <tr><td>聯絡地址</td><td><?php echo $A_address;?></td><td><?php echo $B_address;?></td></tr>
              <tr><td>ETH帳號</td><td><?php echo $A_ethAccount;?></td><td><?php echo $B_ethAccount;?></td></tr>
              <tr><td>立書人簽名：</td>
              <?php 
                $id_A = $contract_Key."user_account_A";
                $ret5=mysqli_query($link,"SELECT * FROM `contract_sign` where `ID`='$id_A';");
                if (mysqli_num_rows($ret5)>0) {
                    while($row5=mysqli_fetch_array($ret5)){
                      $A_dataURL = $row5['dataURL'];
                      // header("Content-type: image/png");
                      // echo $A_dataURL;
                      echo "<td><img src='$A_dataURL' alt='甲方已簽名'></td>"; 
                    }
                } else {
                  echo "<td>尚未簽名</td>";
                }
              ?>
              <?php 
                $id_B = $contract_Key."user_account_B";
                $ret6=mysqli_query($link,"SELECT * FROM `contract_sign` where `ID`='$id_B';");
                if (mysqli_num_rows($ret6)>0) {
                    while($row6=mysqli_fetch_array($ret6)){
                      $B_dataURL = $row6['dataURL'];
                      echo "<td><img src='$B_dataURL' alt='乙方已簽名'></td></tr>"; 
                    }
                } else {
                  echo "<td>尚未簽名</td></tr>";
                }
              ?>
            </table><br>

            <label>合約內容(條文)：</label><br><?php echo $contract_content; ?><br>
            <label>交易方式：</label><br>
            <table> 
              <th>交易日期</><th>交易金額</th>
              <?php 
                $ret=mysqli_query($link,"SELECT * FROM `transaction` where `contract_Key`='$contract_Key'");
                if (mysqli_num_rows($ret)>0) {
                  while($row=mysqli_fetch_array($ret)){
                    $contract_id = $row['id'];
                    $contract_date = $row['contract_money_date'];
                    $contract_money = $row['contract_money'];
                    echo "<tr><td>".$contract_date."</td><td>".$contract_money."</td></tr>";
                  }
                }
              ?>
            </table><br>
            <label>區塊鏈密鑰：</label>
            <?php 
              $ret7=mysqli_query($link,"SELECT * FROM `Hash` where `contract_Key` = '$contract_Key';");
              if (mysqli_num_rows($ret7)>0) {
                  while($row7=mysqli_fetch_array($ret7)){
                    $transactionHash = $row7['transactionHash'];
                    echo $transactionHash; 
                  }
              } else {
                echo "尚未儲存至區塊鏈";
              }
            ?><br>
            </form>
        </fieldset>
    </body>
</html>
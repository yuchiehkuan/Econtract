<?php 
  session_start(); 
  include "../../db.php";
  $contract_Key = $_GET['contract_Key'];
  $account = $_SESSION['account'];
    $ret2=mysqli_query($link,"SELECT * FROM `contract` where `contract_Key`='$contract_Key';");
    if (mysqli_num_rows($ret2)>0) {
        while($row2=mysqli_fetch_array($ret2)){
            $user_account_A = $row2['user_account_A'];
            $user_account_B = $row2['user_account_B'];
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
        <link rel="stylesheet" href="../create.css">
        <script src="https://kit.fontawesome.com/57bd783e21.js" crossorigin="anonymous"></script>
        <script src="../create.js"></script> 
        <!-- <script
        type="module"
        src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.mjs"
      >
            Cookies.set('signature', dataURL);
            img = document.getElementById("signature_A");
            img_url = Cookies.get(signature);
            img.innerHTML="<img src='"+ img_url + "'>"
        </script>   -->
    </head>
    <body>
        <ul>
            <li><a href="../../home.html">Home</a></li>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropbtn"><i class="fas fa-bars fa-1g"></i></a>
              <div class="dropdown-content">
                <a href="../../account/account.php">帳號資訊</a>
                <a href="../create.html">創建合約</a>
                <a href="../../search/search.php">查詢合約</a>
                <a href="../../transaction/transaction.html">系統對帳</a>
                <a href="../../login/login.html">登出</a>
              </div>
            </li>
        </ul><br>
        <fieldset style="text-align: center;">
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
                if($account == $user_account_A) {
                  echo "<td><a href='../signature-pad/signature-pad.php?role=user_account_A&&contract_Key=$contract_Key'>甲方簽名<span id='signature'></span></a></td><td></td></tr>";
                } else {
                  echo "<td></td><td><a href='../signature-pad/signature-pad.php?role=user_account_B&&contract_Key=$contract_Key'>乙方簽名<span id='signature'></span></a></td></tr>";
                }
              ?>
            </table><br>
        </fieldset>
        <script src="../signature-pad/app.js"></script> 
    </body>
</html>
<?php
    session_start(); 
    include "../db.php";
    $contract_Key = $_GET['contract_Key'];
    $search = $_GET['search'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../main.css">
        <link rel="stylesheet" href="./search.css">
        <script src="https://kit.fontawesome.com/57bd783e21.js" crossorigin="anonymous"></script>
        <script src="./search.js"></script>
    </head>
    <body>
        <ul>
            <li><a href="../home.html">Home</a></li>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropbtn"><i class="fas fa-bars fa-1g"></i></a>
              <div class="dropdown-content">
                <a href="../account/account.html">帳號資訊</a>
                <a href="../create/create.html">創建合約</a>
                <a href="#home">查詢合約</a>
                <a href="../transaction/transaction.html">系統對帳</a>
                <a href="../login/login.html">登出</a>
              </div>
            </li>
        </ul><br>
        <fieldset>
            <form action="./searched.php" method="POST">
                <input type="text" id="search" name="search" value="">
                <button type="submit" onclick="return search()"><i class="fas fa-search fa-1g"></i></button>
                <span style="color: red;" id="err" name="err"></span>
            </form>
            <table> 
            <?php 
                if($search == "not null") {
                    if($contract_Key) {
                        $ret=mysqli_query($link,"SELECT * FROM `contract` where `contract_Key`='$contract_Key' and  `contract_time` is not null;");
                        if (mysqli_num_rows($ret)>0) {
                            echo "<th>合約名稱</th><th>合約金鑰</th><th>合約時間</th><th>操作</th>";
                            while($row=mysqli_fetch_array($ret)){
                                $contract_name = $row['contract_name'];
                                $contract_Key = $row['contract_Key'];
                                $contract_time = $row['contract_time'];
                                echo "<tr><td>".$contract_name."</td><td>".$contract_Key."</td><td>".$contract_time."</td><td><a href='../create/created.php?contract_Key=$contract_Key'><i class='fas fa-eye'></i></a></td></tr>";
                            }
                        } else {
                            echo "<span style='color: red;'>查無合約資訊！</span>";
                        }
                    }
                } else if ($search == "null"){
                    echo "<script type='text/javascript'>";
                    echo "var err = document.getElementById('err');";
                    echo "err.style = 'color: red;';";
                    echo "err.innerHTML='搜尋不能為空，請輸入金鑰！';";
                    echo "</script>";
                }
            ?>
        </table><br>  
        </fieldset>
    </body>
</html>
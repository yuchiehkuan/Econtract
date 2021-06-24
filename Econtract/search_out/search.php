<?php
    session_start(); 
    include "../db.php";
    $transactionHash = $_GET['transactionHash'];
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
        <fieldset>
            <form action="./searched.php" method="POST">
                <input type="text" id="search" name="search" value="">
                <button type="submit" onclick="return search()"><i class="fas fa-search fa-1g"></i></button>
                <span style="color: red;" id="err" name="err"></span>
            </form>
            <table> 
            <?php 
                if($search == "not null") {
                    if($transactionHash) {
                        $ret=mysqli_query($link,"SELECT * FROM `Hash` where `transactionHash`='$transactionHash';");
                        if (mysqli_num_rows($ret)>0) {
                            while($row=mysqli_fetch_array($ret)){
                                $contract_Key = $row['contract_Key'];
                                $upload_date = $row['upload_date'];
                            }
                        }
                        $ret2=mysqli_query($link,"SELECT * FROM `contract` where `contract_Key`='$contract_Key';");
                        if (mysqli_num_rows($ret2)>0) {
                            echo "<th>合約名稱</th><th>合約金鑰</th><th>合約時間</th><th>操作</th>";
                            while($row2=mysqli_fetch_array($ret2)){
                                $contract_name = $row2['contract_name'];
                                $contract_Key = $row2['contract_Key'];
                                echo "<tr><td>".$contract_name."</td><td>".$contract_Key."</td><td>".$upload_date."</td><td><a href='./created.php?contract_Key=$contract_Key'><i class='fas fa-eye'></i></a></td></tr>";
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
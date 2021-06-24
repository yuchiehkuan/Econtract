<?php
    include "../../db.php";
    $contract_Key = $_GET['contract_Key'];
    $ret=mysqli_query($link,"SELECT * FROM `contract` where `contract_Key`='$contract_Key';");
    if (mysqli_num_rows($ret)>0) {
        while($row=mysqli_fetch_array($ret)){
            $contract_Key = $row['contract_Key'];
            $contract_name = $row['contract_name'];
            $contract_purpose = $row['contract_purpose'];
            $user_account_A = $row['user_account_A'];
            $user_account_B = $row['user_account_B'];
            $contract_content = $row['contract_content'];
        }
    }
    $ret2=mysqli_query($link,"SELECT * FROM `user` where `account`='$user_account_A';");
    if (mysqli_num_rows($ret2)>0) {
        while($row2=mysqli_fetch_array($ret2)){
            $A_account = $row2['account'];
            $A_pwd = $row2['password'];
            $A_id = $row2['ID'];
            $A_name = $row2['firstname']." ".$row2['lastname'];
            $A_mobile = $row2['mobile'];
            $A_address = $row2['address'];
            $A_ethAccount = $row2['eth_account'];
        }
    }
    $ret3=mysqli_query($link,"SELECT * FROM `user` where `account`='$user_account_B';");
    if (mysqli_num_rows($ret3)>0) {
        while($row3=mysqli_fetch_array($ret3)){
            $B_account = $row3['account'];
            $B_id = $row3['ID'];
            $B_name = $row3['firstname']." ".$row3['lastname'];
            $B_mobile = $row3['mobile'];
            $B_address = $row3['address'];
            $B_ethAccount = $row3['eth_account'];
        }
    }
    $contract_date = array();
    $contract_money = array();
    $ret4=mysqli_query($link,"SELECT * FROM `transaction` where `contract_Key`='$contract_Key';");
    if (mysqli_num_rows($ret4)>0) {
        while($row4=mysqli_fetch_array($ret4)){
            array_push($contract_date, $row4['contract_money_date']);
            array_push($contract_money, $row4['contract_money']);
        }
    }
    $id_A = $contract_Key."user_account_A";
    $ret5=mysqli_query($link,"SELECT * FROM `contract_sign` where `ID`='$id_A';");
    if (mysqli_num_rows($ret5)>0) {
        while($row5=mysqli_fetch_array($ret5)){
            $A_dataURL = $row5['dataURL'];
        } 
    }
    $id_B = $contract_Key."user_account_A";
    $ret6=mysqli_query($link,"SELECT * FROM `contract_sign` where `ID`='$id_B';");
    if (mysqli_num_rows($ret6)>0) {
        while($row6=mysqli_fetch_array($ret6)){
            $B_dataURL = $row6['dataURL'];
        } 
    }
    $contract_transaction = array();
    array_push($contract_transaction, $contract_date, $contract_money);
    $contract_data = [
        'key' => $contract_Key,
        'title' => $contract_name,
        'purpose' => $contract_purpose,
        'A_account' => $A_account,
        'A_ID' => $A_id,
        'A_name' => $A_name,
        'A_mobile' => $A_mobile,
        'A_address' => $A_address,
        'A_ethAccount' => $A_ethAccount,
        'A_sign' => $A_dataURL,
        'B_account' => $B_account,
        'B_ID' => $B_id,
        'B_name' => $B_name,
        'B_mobile' => $B_mobile,
        'B_address' => $B_address,
        'B_ethAccount' => $B_ethAccount,
        'B_sign' => $B_dataURL,
        'content' => $contract_content,
        'transaction' => $contract_transaction
    ];
    
    $contract_json_data = json_encode($contract_data);
    $pwd_json_data = json_encode($A_pwd);
    // echo $contract_json_data;
    // print_r($contract_data);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../create.css">
        <script src="https://kit.fontawesome.com/57bd783e21.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../../node_modules/web3/dist/web3.min.js"></script>
        <script src="../create.js"></script>
    </head>
    <body>
        <?php
            echo "<script>to_sendtransaction($contract_json_data, $pwd_json_data);</script> "; 
        ?>
    </body>
</html>
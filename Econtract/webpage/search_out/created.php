<?php
    session_start(); 
    include "../../db.php";
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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Econtract - Sign</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript" src="../../node_modules/web3/dist/web3.min.js"></script>
    <script type="text/javascript" src="../../js/create.js"></script> 
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="./search.php">
                    <i class="fas fa-search fa-fw"></i>
                    <span>合約查詢</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">合約總覽</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div  class="text-center">
                                      <label for="dataTable2">合約資訊</label>
                                    </div>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-center">
                                            <tr>
                                                <th>項目</th>
                                                <th>甲方</th>
                                                <th>乙方</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>使用者帳號</td>
                                            <td><?php echo $A_account;?></td>
                                            <td><?php echo $B_account;?></td>
                                          </tr>
                                          <tr>
                                            <td>身分證字號/統編</td>
                                            <td><?php echo $A_id;?></td>
                                            <td><?php echo $B_id;?></td>
                                          </tr>
                                          <tr>
                                            <td>姓名</td>
                                            <td><?php echo $A_name;?></td>
                                            <td><?php echo $B_name;?></td>
                                          </tr>
                                          <tr>
                                            <td>聯絡電話</td>
                                            <td><?php echo $A_mobile;?></td>
                                            <td><?php echo $B_mobile;?></td>
                                          </tr>
                                          <tr>
                                            <td>聯絡地址</td>
                                            <td><?php echo $A_address;?></td>
                                            <td><?php echo $B_address;?></td>
                                          </tr>
                                          <tr>
                                            <td>ETH帳號</td>
                                            <td><?php echo $A_ethAccount;?></td>
                                            <td><?php echo $B_ethAccount;?></td>
                                          </tr>
                                          <tr>
                                            <td>立書人簽名：</td>
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
                                          </tr>
                                        </tbody>
                                    </table>
                                    <div  class="text-center">
                                      <label for="dataTable2">交易方式</label>
                                    </div>
                                    <table class="table table-bordered text-center" id="dataTable2" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>交易日期</th>
                                                <th>交易金額</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                                        </tbody>
                                    </table>
                                  </div>
                                  <div class="text-center">
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
                                    ?>
                                  </div>
                            </div>
                        </div>
                    </div>
            </div>
            
                <!-- /.container-fluid -->
            </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">是否要登出?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">如果您確定要離開，點選登出離開系統。</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">取消</button>
                    <a class="btn btn-primary" href="../login/login.html">登出</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

</body>

</html>
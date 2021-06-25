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
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Econtract - Sign</title>

    <!-- Custom fonts for this template-->
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript" src="../../../node_modules/web3/dist/web3.min.js"></script>
    <script type="text/javascript" src="../../../js/create.js"></script> 
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-pen-fancy"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Home</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../create/create.html">
                    <i class="fas fa-fw fa-file-contract"></i>
                    <span>創建合約</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="#home">
                    <i class="fas fa-search fa-fw"></i>
                    <span>合約查詢</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="../transaction.html">
                    <i class="fas fa-hand-holding-usd fa-fw"></i>
                    <span>系統對帳</span></a>
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

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">帳號資訊</span>
                                <img class="img-profile rounded-circle"
                                    src="../../img/user-tie-solid.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../account/account.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    帳號資訊
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    登出
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">合約總覽</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
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
                                              if($account == $user_account_A) {
                                                echo "<td class='text-center'><a href='../signature-pad/signature-pad.php?role=user_account_A&&contract_Key=$contract_Key'>甲方簽名<span id='signature'></span></a></td><td></td>";
                                              } else {
                                                echo "<td></td><td class='text-center'><a href='../signature-pad/signature-pad.php?role=user_account_B&&contract_Key=$contract_Key'>乙方簽名<span id='signature'></span></a></td>";
                                              }
                                            ?>
                                          </tr>
                                        </tbody>
                                    </table>
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
    <script src="../../../js/sb-admin-2.min.js"></script>

</body>

</html>
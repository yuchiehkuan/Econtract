<?php 
  session_start(); 
  include "../db.php";
  $account = $_SESSION['account'];
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Econtract - Contracts</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript" src="../node_modules/web3/dist/web3.min.js"></script>
    <script src="./create.js"></script> 
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Home</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="#home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>創建合約</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="../search/search.php">
                    <i class="fas fa-search fa-fw"></i>
                    <span>合約查詢</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="../transaction/transaction.html">
                    <i class="fas fa-search fa-fw"></i>
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
                                    src="../img/undraw_profile.svg">
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
                                        <thead>
                                            <tr>
                                                <th>合約名稱</th>
                                                <th>合約金鑰</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>合約名稱</th>
                                                <th>合約金鑰</th>
                                                <th>操作</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                                $ret=mysqli_query($link,"SELECT * FROM `contract` where `user_account_A`='$account' or `user_account_B`='$account';");
                                                if (mysqli_num_rows($ret)>0) {
                                                    while($row=mysqli_fetch_array($ret)){
                                                        $contract_name = $row['contract_name'];
                                                        $contract_Key = $row['contract_Key'];
                                                        $ret2=mysqli_query($link,"SELECT * FROM `contract_sign` where `contract_Key` = '$contract_Key' and `account`='$account';");
                                                        if (mysqli_num_rows($ret2)>0) {
                                                            $ret3=mysqli_query($link,"SELECT * FROM `Hash` where `contract_Key` = '$contract_Key';");
                                                            if (mysqli_num_rows($ret3)>0) {
                                                                echo "<tr><td>".$contract_name."</td><td>".$contract_Key."</td><td><a href='./created.php?contract_Key=$contract_Key'><i class='fas fa-eye'></i></a>｜<a href='./create_step/delete.php?contract_Key=$contract_Key'><i class='fas fa-trash-alt'></i></a></td></tr>";
                                                            } else {
                                                                echo "<tr><td>".$contract_name."</td><td>".$contract_Key."</td><td><a href='./created.php?contract_Key=$contract_Key'><i class='fas fa-eye'></i></a>｜<a href='./create_step/delete.php?contract_Key=$contract_Key'><i class='fas fa-trash-alt'></i></a>｜<a href='./signed/senfTransaction.php?contract_Key=$contract_Key'><i class='fab fa-ethereum'></i></a></td></tr>";
                                                            }
                                                        } else {
                                                            echo "<tr><td>".$contract_name."</td><td>".$contract_Key."</td><td><a href='./created.php?contract_Key=$contract_Key'><i class='fas fa-eye'></i></a>｜<a href='./create_step/delete.php?contract_Key=$contract_Key'><i class='fas fa-trash-alt'></i></a>｜<a href='./create_step/sign.php?contract_Key=$contract_Key'><i class='fas fa-file-signature'></i></a></td></tr>";
                                                        }
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='3' class='text-center'>尚未建立合約</td></tr>";
                                                }
                                            ?>
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
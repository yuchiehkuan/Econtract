<?php
    session_start(); 
    include "../../db.php";
    $transactionHash = $_GET['transactionHash'];
    $search = $_GET['search'];
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Econtract - Search</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
    <script type="text/javascript" src="../../node_modules/web3/dist/web3.min.js"></script>
    <script type="text/javascript" src="../../js/search.js"></script> 
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="p-5 text-center">
                        <form action="./searched.php" method="POST" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-1" placeholder="Search for..."
                                    aria-label="Search" aria-describedby="basic-addon2" id="search" name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" onclick="return searching()">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                                <span id="err" name="err"></span>
                            </div>
                        </form>
                    </div>
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
                                                <th>合約時間</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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
                                                            while($row2=mysqli_fetch_array($ret2)){
                                                                $contract_name = $row2['contract_name'];
                                                                $contract_Key = $row2['contract_Key'];
                                                                echo "<tr><td>".$contract_name."</td><td>".$contract_Key."</td><td>".$upload_date."</td><td><a href='./created.php?contract_Key=$contract_Key'><i class='fas fa-eye'></i></a></td></tr>";
                                                            }
                                                        } else {
                                                            echo "<tr><td colspan='3' class='text-center'>查無合約資訊</td></tr>";
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
    <script src="../../js/sb-admin-2.min.js"></script>
    <script type="text/javascript" src="../../js/search.js"></script> 

</body>

</html>
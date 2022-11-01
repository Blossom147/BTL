<?php 
    $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/core/init.php";

    require_once "$rootDir/BTL/includes/Manager/header.php";
    $_DOMAIN = 'http://localhost/BTL/';

?>

        <!--**********************************Content body start***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tài Khoản</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
        <?php
        echo '<h3>Tài khoản</h3>';
        // Lấy tham số ac
        if (isset($_GET['ac']))
        {
            $ac = trim(addslashes(htmlspecialchars($_GET['ac'])));
        }
        else
        {
            $ac = '';
        }
        // Lấy tham số id
        if (isset($_GET['id']))
        {
            $id = trim(addslashes(htmlspecialchars($_GET['id'])));
        }
        else
        {
            $id = '';
        }
        // Nếu có tham số ac
        if ($ac != '') 
        {
            // Trang thêm tài khoản
            if ($ac == 'add')
            {
                // Dãy nút của thêm tài khoản
                echo
                '
                    <a href="' . $_DOMAIN . 'accounts" class="btn btn-default">
                        <span class="glyphicon glyphicon-arrow-left"></span> Trở về
                    </a> 
                ';
      
                // Content thêm tài khoản
                echo '
                <p class="form-add-acc">
                    <form method="POST" id="formAddAcc" onsubmit="return false;">
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input type="text" class="form-control title" id="un_add_acc">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control title" id="pw_add_acc">
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control title" id="repw_add_acc">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                        <div class="alert alert-danger hidden"></div>
                    </form>
                </p>
                ';
            }         
        }
        // Ngược lại không có tham số ac
        // Trang danh sách tài khoản
        else
        {
            // Dãy nút của danh sách tài khoản
            
            echo
            '   
                
                <a href="' . $_DOMAIN . 'templates/accounts/add" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus"></span> Thêm
                </a> 
                <a href="' . $_DOMAIN . 'templates/accounts.php" class="btn btn-default">
                    <span class="glyphicon glyphicon-repeat"></span> Reload
                </a>
                
                <a class="btn btn-danger" id="del_acc_list">
                    <span class="glyphicon glyphicon-trash"></span> Xoá
                </a> 
            ';
            
            // Content danh sách tài khoản
            $sql_get_list_acc = "SELECT * FROM taikhoan ORDER BY ID ASC";
            if ($db->num_rows($sql_get_list_acc)){
                echo
                '
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-striped list" id="list_acc">
                            <tr>
                                <td><input type="checkbox"></td>
                                <td><strong>ID</strong></td>
                                <td><strong>Tên đăng nhập</strong></td>
                                <td><strong>Tên người dùng</strong></td>
                                <td><strong>Ngày sinh</strong></td>
                                <td><strong>Tools</strong></td>

                            </tr>
                ';
                // In danh sách tài khoản
                foreach ($db->fetch_assoc($sql_get_list_acc, 0) as $key => $data_acc)
                {
                    echo
                    '
                        <tr>
                            <td><input type="checkbox" name="ID[]" value="' . $data_acc['ID'] .'"></td>
                            <td>' . $data_acc['ID'] .'</td>
                            <td>' . $data_acc['TenTaiKhoan'] . '</td>
                            <td>' . $data_acc['TenNguoiDung'] . '</td>
                            <td>' . $data_acc['NgaySinh'] . '</td>

                            <td>
                                <a data-id="' . $data_acc['ID'] . '" class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                </a>
                                <a data-id="' . $data_acc['ID'] . '" class="btn btn-sm btn-danger del-acc-list">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                                
                            </td>
                        </tr>
                    ';
                }
            }
        }
            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************Content body end***********************************-->      
        <!--**********************************Footer start***********************************-->
        <!--********************************** Footer end***********************************-->
    </div>
    <!--********************************** Main wrapper end***********************************-->
    <?php require_once "$rootDir/BTL/includes/Manager/footter.php"?>
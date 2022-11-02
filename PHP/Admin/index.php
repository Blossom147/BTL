<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/header.php"
?>
<div class="card-body">
        <h2>Danh sách tài khoản</h2>
        <a class="btn btn-primary" href="/BTL/PHP/Admin/create.php" role="button">Tạo mới</a>
        <br>
        <table class="table">
            <thead> 
                <tr>
                    <th>ID</th>
                    <th>Tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Tên người dùng</th>
                    <th>Ngày sinh</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php   
                    $link = new mysqli('localhost', 'root', '', 'webmusic') or die('Kết nối thất bại!!');
                    // Đọc dữ liệu 
                    $sql = "Select * from taikhoan";
                    $result = $link->query($sql);
                    if(!$result){
                        die($link->error);
                    }
                    // đọc từng dòng
                    while($row = $result->fetch_assoc()){
                        echo 
                        "
                        <tr>
                            <td>$row[ID]</td>
                            <td>$row[TenTaiKhoan]</td>
                            <td>$row[MatKhau]</td>
                            <td>$row[TenNguoiDung]</td>
                            <td>$row[NgaySinh]</td>
                            <td>
                                <a class = 'btn btn-primary btn-sm' href = '/BTL/PHP/Admin/edit.php?id=$row[ID]'>Sửa</a>
                                <a onclick='return ConfirmDelete();' class = 'btn btn-danger btn-sm' href = '/BTL/PHP/Admin/delete.php?id=$row[ID]'>Xóa</a>
                            </td>
                            ";
                    }
                ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    <?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/footter.php"
?>

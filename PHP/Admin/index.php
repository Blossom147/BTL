<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/header.php"
?>
<div class="card-body">
    <h2>Danh sách bài hát</h2>
    <br>
    <a class="btn btn-primary" href="/BTL/PHP/Admin/create.php" role="button">Tạo mới</a>
    <br><br>
    <div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tài khoản</th>
                <th>Mật khẩu</th>
                <th>Tên người dùng</th>
                <th>Ngày sinh</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            // Đọc dữ liệu 
            $link = new mysqli('localhost', 'root', '', 'webmusic') or die('Kết nối thất bại!!');
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
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Tài khoản</th>
                <th>Mật khẩu</th>
                <th>Tên người dùng</th>
                <th>Ngày sinh</th>
                <th>Tùy chọn</th>
            </tr>
        </tfoot>
    </table>
    </div>
</div>

<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/footter.php"
?>


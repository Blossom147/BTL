<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/header.php"
?>
<div class="card-body">
    <h2>Danh sách bài hát</h2>
    <br>
    <a class="btn btn-primary" href="/BTL/PHP/Songs/create.php" role="button">Tạo mới</a>
    <br><br>
    <div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên bài hát</th>
                <th>Album</th>
                <th>Chủ đề</th>
                <th>Thể loại</th>
                <th>Ca sĩ</th>
                <th>Ảnh</th>
                <th>File</th>
                <th>Lượt thích</th>
                <th>Tùy chọn</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $allbum ="";
            // Đọc dữ liệu 
            $link = new mysqli('localhost', 'root', '', 'webmusic') or die('Kết nối thất bại!!');
            $sql = "Select * from baihat";
            $result = $link->query($sql);
            if(!$result){
                die($link->error);
            }
            // đọc từng dòng
            while($row = $result->fetch_assoc()){
                
                $selectAlbum= "select * from album where ID = '$row[IDAlbum]'"; $resultAlbum = $link->query($selectAlbum); 
                $rowAlbum = $resultAlbum->fetch_assoc();
                if(!$rowAlbum){
                    $TenAlbum=" ";
                }else{
                    $TenAlbum=$rowAlbum["TenAlbum"];
                }
                
                $selectChude= "select * from chude where ID = '$row[IDChuDe]'"; $resultChuDe = $link->query($selectChude);
                if(!$resultChuDe){
                    $resultChuDe = "";
                }else $rowChuDe = $resultChuDe->fetch_assoc();

                $selectTheloai= "select * from theloai where ID = '$row[IDTheLoai]'"; $resultTheLoai = $link->query($selectTheloai);
                if(!$resultTheLoai){
                    $resultTheLoai = "";
                }else $rowTheLoai = $resultTheLoai->fetch_assoc();

                $selectCasi = "select * from casi where ID = '$row[IDCasi]'"; $resultCasi = $link->query($selectCasi);
                if(!$resultCasi){
                    $resultCasi = "";
                }else $rowCasi = $resultCasi->fetch_assoc();
                echo 
                "
                <tr>
                    <td>$row[ID]</td>
                    <td>$row[TenBaiHat]</td>
                    <td>$TenAlbum</td>
                    <td>$rowChuDe[TenChuDe]</td>
                    <td>$rowTheLoai[TenTheLoai]</td>
                    <td>$rowCasi[Ten]</td>
                    <td>$row[Anh]</td>
                    <td>$row[File]</td>
                    <td>$row[LuotThich]</td>
                    <td>
                        <a class = 'btn btn-primary btn-sm' href = '/BTL/PHP/Songs/edit.php?id=$row[ID]'>Sửa</a>
                        <a onclick='return ConfirmDelete();' class = 'btn btn-danger btn-sm' href = '/BTL/PHP/Songs/delete.php?id=$row[ID]'>Xóa</a>
                    </td>
                    ";
            }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Tên bài hát</th>
                <th>Album</th>
                <th>Chủ đề</th>
                <th>Thể loại</th>
                <th>Ca sĩ</th>
                <th>Ảnh</th>
                <th>File</th>
                <th>Lượt thích</th>
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
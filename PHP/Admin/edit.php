<?php 
    $link = new mysqli('localhost', 'root', '', 'webmusic') or die('Kết nối thất bại!!');
    $id ="";
    $tentaikhoan ="";
    $matkhau ="";
    $tennguoidung ="";
    $ngaysinh="";
    $anh="";
    $isadmin ="";

    $errorMessage ="";
    $successMessage ="";

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(!isset($_GET["id"])){
            header("location: /BTL/PHP/Admin/index.php");
            exit;
        }

        $id = $_GET["id"];
        // Đọc dữ liệu có trong csdl
        $sql = "Select * from taikhoan Where ID = $id";
        $result = $link->query($sql);
        $row = $result->fetch_assoc();

        if(!$row){
            header("location: /BTL/PHP/Admin/index.php");
            exit;
        }
        $tentaikhoan = $row["TenTaiKhoan"];
        $matkhau = $row["MatKhau"];
        $tennguoidung = $row["TenNguoiDung"];
        $ngaysinh= $row["NgaySinh"];
        $anh=$row["Anh"];
        $isadmin =$row["IsAdmin"];
        
    }else{
        $tentaikhoan = $_POST["tentaikhoan"];
        $matkhau = $_POST["matkhau"];
        $tennguoidung = $_POST["tennguoidung"];
        $ngaysinh= $_POST["ngaysinh"];
        $anh=$_POST["anh"];
        $isadmin =$_POST["isadmin"];

        

        do{
            if(empty($tentaikhoan) || empty($matkhau) || empty($tennguoidung) || empty($ngaysinh)){
                $errorMessage =   "All the fields are requied";
                break;
            }

            $sql = "update taikhoan Set TenTaiKhoan = '$tentaikhoan', MatKhau ='$matkhau', TenNguoiDung='$tennguoidung',IsAdmin='$isadmin',NgaySinh='$ngaysinh' Where ID = '$id'";
            $result = $link->query($sql);

            if(!$result){
                $errorMessage = "Không hợp lệ : " .$link->error;
                break;
            }
            $successMessage = "Sửa thông tin thành công";
            header("location: /BTL/PHP/Admin/index.php");
            exit;

        }while(false);
    }
?>
<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/header.php"
?>
        <h2>Chỉnh sửa tài khoản</h2>

        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alter'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alter' aria-label='Close' ></button>
            </div>
            ";
        }
        ?>
        
        <form method="post">
            <input type="hidden" tennguoidung ="id" value="<?php echo $id ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tài khoản</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tentaikhoan" value="<?php echo $tentaikhoan ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Mật khẩu</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="matkhau" value="<?php echo $matkhau ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tên người dùng</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tennguoidung" value="<?php echo $tennguoidung ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">IsAdmin</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="isadmin" value="<?php echo $isadmin ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Ảnh</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="anh" value="<?php echo $anh ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Ngày sinh</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="ngaysinh" value="<?php echo $ngaysinh ?>">
                </div>  
            </div>

            <?php
                if(!empty($successMessage)){
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alter'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alter' aria-label='Close' ></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/BTL/PHP/Admin/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
       
    </div>
</body>
</html>

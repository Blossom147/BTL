<?php 
    $link = new mysqli('localhost', 'root', '', 'webmusic') or die('Kết nối thất bại!!');
    $username ="";
    $password ="";
    $name ="";
    $date="";
    $errorMessage ="";
    $successMessage ="";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $name = $_POST["name"];
        $date= $_POST["date"];

        do{     
            
            $number    = preg_match('@[0-9]@', $password);
            $query ="Select * from taikhoan where tentaikhoan = '$username'";
            $checkuser = $link->query($query);
            $row = $checkuser->fetch_assoc();
            if(!$checkuser){
                $tentaikhoan = $row["TenTaiKhoan"];
            }
            if(empty($username) || empty($password) || empty($date) || empty($name)){
                $errorMessage = "Vui lòng nhập đủ thông tin!";
                break;
            } else if(!$number || strlen($password) < 8){
                $errorMessage = "Mật khẩu ít nhất 8 kí tự gồm chữ và số";
                break;
            }
            else  if(!$tentaikhoan && $tentaikhoan== $username){
                $errorMessage = " Tài khoản đã tồn tại";
                break;
            } 

            // Thêm tài khoản vào csdl
            $sql ="INSERT INTO taikhoan (ID,TenTaiKhoan,MatKhau,TenNguoiDung,NgaySinh)" . 
                    "Values('','$username','$password','$name','$date')";
            $result = $link->query($sql);

            if(!$result){
                $errorMessage = "câu lệnh không hợp lệ" .$link->error;
                break;
            }
            $username ="";
            $password ="";
            $name ="";
            $date="";

            $successMessage = "THêm tài khoản thành công";
            header("location: /BTL/PHP/Admin/index.php");
            exit;
        }while(false);
    }
?>
<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/header.php"
?>
        <h2>Tạo mới tài khoản</h2>

        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alter'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            </div>
            ";
        }
        ?>
        
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tài khoản</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Mật khẩu</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="password" value="<?php echo $password ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tên người dùng</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Ngày sinh</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="date" value="<?php echo $date ?>">
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
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/BTL/PHP/Admin/index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
       
    </div>
</body>
</html>

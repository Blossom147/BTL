<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/header.php";

$link = new mysqli('localhost', 'root', '', 'webmusic') or die('Kết nối thất bại!!');
$tenchude ="";

$errorMessage ="";
$successMessage ="";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET["id"])){
        header("location: /BTL/PHP/ChuDe/index.php");
        exit;
    }

    $id = $_GET["id"];
    // Đọc dữ liệu có trong csdl
    $sql = "Select * from chude Where ID = $id";
    $result = $link->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location: /BTL/PHP/ChuDe/index.php");
        exit;
    }
    $id = $row["ID"];
    $tenchude = $row["TenChuDe"];
    
}else{
    $tenchude = $_POST["tenchude"];
    $id = $_GET["id"];
    

    do{
        if(empty($tenchude)){
            $errorMessage =   "Bạn chưa điền đủ thông tin";
            break;
        }
        else{
            $sql = "update chude Set TenChuDe = '$tenchude' Where ID = '$id'";
            $result = $link->query($sql);
        }
        

        if(!$result){
            $errorMessage = "Không hợp lệ : " .$link->error;
            break;
        }
        $successMessage = "Sửa thông tin thành công";
        header("location: /BTL/PHP/ChuDe/index.php");
        exit;

    }while(false);
}
?>

<div class="card-body">
    <h2>Chỉnh sửa thông tin chủ đề</h2>

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
        <input type="hidden" tenchude ="id" value="<?php echo $id ?>">
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Chủ đề</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="tenchude" value="<?php echo $tenchude ?>">
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
                <a class="btn btn-outline-primary" href="/BTL/PHP/ChuDe/index.php" role="button">Quay lại</a>
            </div>
        </div>
    </form>
   
</div>
</div>
<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$rootDir/BTL/includes/admin/header.php"
?>
</body>
</html>

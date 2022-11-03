<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/header.php";

    $link = new mysqli('localhost', 'root', '', 'webmusic') or die('Kết nối thất bại!!');
    $tentheloai ="";

    $errorMessage ="";
    $successMessage ="";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $tentheloai = $_POST["tentheloai"];
    do{
        $query ="Select * from theloai where TenTheLoai = '$tentheloai'";
            $checktheloai = $link->query($query);
            $row = $checktheloai->fetch_assoc();
        if($checktheloai){
            $Checktentheloai = $row["TenTheLoai"];
        }
        if(empty($tentheloai)){
            $errorMessage = "Vui lòng nhập đủ thông tin!";
            break;
        } else  if($Checktentheloai && $Checktentheloai== $tentheloai){
            $errorMessage = " Thể loại đã tồn tại";
            break;
        } 
        $sql ="INSERT INTO theloai (ID,TenTheLoai)" . 
        "Values('','$tentheloai')";
        $result = $link->query($sql);

        if(!$result){
        $errorMessage = "câu lệnh không hợp lệ" .$link->error;
        break;
        }
        $successMessage = "THêm bài hát thành công";
            header("location: /BTL/PHP/theloai/index.php");
            exit;
    }while(false);
    }
?>

<div class="card-body">
        <h2>Tạo mới thể loại</h2>
        <br><br>
       
        <form method="post">
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
           
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tên thể loại</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tentheloai" value="<?php echo $tentheloai ?>">
                </div>
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
                    <a class="btn btn-outline-primary" href="/BTL/PHP/theloai/index.php" role="button">Quay lại</a>
                </div>
            </div>
            
        </form>
       
    </div>
</div>

<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/footter.php"
?>
<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/header.php";

    $link = new mysqli('localhost', 'root', '', 'webmusic') or die('Kết nối thất bại!!');
    $tencasi ="";
    $anh ="";

    $errorMessage ="";
    $successMessage ="";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $tencasi = $_POST["tencasi"];
        $anh = $_POST["anh"];
    do{
        $query ="Select * from casi where Ten = '$tencasi'";
            $checkcasi = $link->query($query);
            $row = $checkcasi->fetch_assoc();
        if($checkcasi){
            $Checktencasi = $row["Ten"];
        }
        if(empty($tencasi) || empty($anh)){
            $errorMessage = "Vui lòng nhập đủ thông tin!";
            break;
        } else  if($Checktencasi && $Checktencasi== $tencasi){
            $errorMessage = "Đã có nghệ danh ca sĩ này vui lòng kiểm tra lại!";
            break;
        } 
        $sql ="INSERT INTO casi (ID,Ten,Anh)" . 
        "Values('','$tencasi','$anh')";
        $result = $link->query($sql);

        if(!$result){
        $errorMessage = "câu lệnh không hợp lệ" .$link->error;
        break;
        }
        $successMessage = "THêm ca sĩ thành công";
            header("location: /BTL/PHP/CaSi/index.php");
            exit;
    }while(false);
    }
?>

<div class="card-body">
        <h2>Tạo mới ca sĩ</h2>
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
                <label class="col-sm-3 col-form-label">Tên ca sĩ</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tencasi" value="<?php echo $tencasi ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Ảnh</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="anh" value="<?php echo $anh ?>">
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
                    <a class="btn btn-outline-primary" href="/BTL/PHP/CaSi/index.php" role="button">Quay lại</a>
                </div>
            </div>
            
        </form>
       
    </div>
</div>

<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/footter.php"
?>
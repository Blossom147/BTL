<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/header.php";

    $link = new mysqli('localhost', 'root', '', 'webmusic') or die('Kết nối thất bại!!');
    $tenbaihat ="";
    $anh ="";
    $file ="";
    $album="";
    $chude="";
    $theloai="";
    $casi="";
    $errorMessage ="";
    $successMessage ="";

    $sqlCasi = "Select * from casi";
    $resultCasi = mysqli_query($link,$sqlCasi);

    $sqlAlbum = "Select * from album";
    $resultAlbum = mysqli_query($link,$sqlAlbum);

    $sqlChuDe = "Select * from chude";
    $resultChuDe = mysqli_query($link,$sqlChuDe);

    $sqlTheLoai = "Select * from theloai";
    $resultTheLoai = mysqli_query($link,$sqlTheLoai);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $tenbaihat = $_POST["tenbaihat"];
        $anh = $_POST["anh"];
        $file = $_POST["file"];
        $album= $_POST["album"];
        $chude= $_POST["chude"];
        $theloai= $_POST["theloai"];
        $casi= $_POST["casi"];
    do{
        $query ="Select * from baihat where TenBaiHat = '$tenbaihat'";
            $checkbaihat = $link->query($query);
            $row = $checkbaihat->fetch_assoc();
        if($checkbaihat){
            $Checktenbaihat = $row["TenBaiHat"];
        }
        if(empty($tenbaihat) || empty($chude) || empty($theloai)){
            $errorMessage = "Vui lòng nhập đủ thông tin!";
            break;
        } else  if($Checktenbaihat && $Checktenbaihat== $tenbaihat){
            $errorMessage = " Bài hát đã tồn tại";
            break;
        } 
        $sql ="INSERT INTO baihat (ID,TenBaiHat,Anh,File,LuotThich,IDAlbum,IDChuDe,IDTheLoai,IDCasi)" . 
        "Values('','$tenbaihat','$anh','$file','','$album','$chude','$theloai','$casi')";
        $result = $link->query($sql);

        if(!$result){
        $errorMessage = "câu lệnh không hợp lệ" .$link->error;
        break;
        }
        $successMessage = "THêm bài hát thành công";
            header("location: /BTL/PHP/Songs/index.php");
            exit;
    }while(false);
    }
?>

<div class="card-body">
        <h2>Tạo mới bài hát</h2>
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
                <label class="col-sm-3 col-form-label">Tên bài hát</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tenbaihat" value="<?php echo $tenbaihat ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Ảnh</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="anh" value="<?php echo $anh ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">File bài hát</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="file" value="<?php echo $file ?>">
                </div>
            </div>


           
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Album</label>
                <div class="col-sm-6">
                <select name="album" class="form-control">
                    <option value="">--Chọn Album--</option>
                    <?php while($rowAlbum = mysqli_fetch_array($resultAlbum)):;?>
                    <option value="<?php echo $rowAlbum[0];?>"><?php echo $rowAlbum[1] ?></option>
                    <?php endwhile; ?>                    
                </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Chủ đề</label>
                <div class="col-sm-6">
                <select name="chude" class="form-control" >
                    <option value="">--Chọn chủ đề--</option>
                    <?php while($rowChuDe = mysqli_fetch_array($resultChuDe)):;?>
                    <option value="<?php echo $rowChuDe[0];?>"><?php echo $rowChuDe[1] ?></option>
                    <?php endwhile; ?>
                </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Thể loại</label>
                <div class="col-sm-6">
                <select name="theloai" class="form-control">
                    <option value="">--Chọn thể loại--</option>
                    <?php while($rowTheLoai = mysqli_fetch_array($resultTheLoai)):;?>
                    <option value="<?php echo $rowTheLoai[0];?>"><?php echo $rowTheLoai[1] ?></option>
                    <?php endwhile; ?>                    
                </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Ca sĩ</label>
                <div class="col-sm-6">
                <select name="casi"  class="form-control">
                    <option value="">--Chọn ca sĩ--</option>
                    <?php while($rowCasi = mysqli_fetch_array($resultCasi)):;?>
                    <option value="<?php echo $rowCasi[0];?>"><?php echo $rowCasi[1] ?></option>
                    <?php endwhile; ?>                    
                </select>
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
                    <a class="btn btn-outline-primary" href="/BTL/PHP/Songs/index.php" role="button">Cancel</a>
                </div>
            </div>
            
        </form>
       
    </div>
</div>

<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/footter.php"
?>
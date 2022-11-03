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



if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET["id"])){

        header("location: /BTL/PHP/Songs/index.php");
        exit;
    }

    $id = $_GET["id"];

    // Đọc dữ liệu có trong csdl
    $sql = "Select * from baihat Where ID = $id";
    $result = $link->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location: /BTL/PHP/Songs/index.php");
        exit;
    }
    $id = $row["ID"];
    $tenbaihat = $row["TenBaiHat"];
    $anh = $row["Anh"];
    $file = $row["File"];
    $album= $row["IDAlbum"];
    $chude=$row["IDChuDe"];
    $casi =$row["IDCasi"];
    $theloai =$row["IDTheLoai"];


    
    $sqlCasi = "Select * from casi where ID = '$casi'";
    $sqlCasi2 = "Select * from casi";
    $resultCasi = mysqli_query($link,$sqlCasi);
    $resultCasi2 = mysqli_query($link,$sqlCasi2);
    $optionsCasi ="";
    while($rowCasi = mysqli_fetch_array($resultCasi2)){
        $optionsCasi = $optionsCasi."<option>$rowCasi[1]</option>";
    }


    $sqlAlbum = "Select * from album where ID = '$album'";
    $sqlAlbum2 = "Select * from album";

    $resultAlbum = mysqli_query($link,$sqlAlbum);
    $resultAlbum2 = mysqli_query($link,$sqlAlbum2);
    $optionsAlbum ="";
    while($rowAlbum = mysqli_fetch_array($resultAlbum2)){
        $optionsAlbum = $optionsAlbum."<option>$rowAlbum[1]</option>";
    }


    $sqlChuDe = "Select * from chude where ID = '$chude'";
    $sqlChuDe2 = "Select * from chude";
    $resultChuDe = mysqli_query($link,$sqlChuDe);
    $resultChuDe2 = mysqli_query($link,$sqlChuDe2);
    $optionsChuDe ="";
    while($rowChuDe = mysqli_fetch_array($resultChuDe2)){
        $optionsChuDe = $optionsChuDe."<option>$rowChuDe[1]</option>";
    }


    $sqlTheLoai = "Select * from theloai where ID = '$theloai'";
    $sqlTheLoai2 = "Select * from theloai";
    $resultTheLoai = mysqli_query($link,$sqlTheLoai);
    $resultTheLoai2 = mysqli_query($link,$sqlTheLoai2);
    $optionsTheLoai ="";
    while($rowTheLoai = mysqli_fetch_array($resultTheLoai2)){
        $optionsTheLoai = $optionsTheLoai."<option>$rowTheLoai[1]</option>";
    }
    
}else if(isset($_POST['update'])){
    $id = $_GET["id"];

    $tenbaihat = $_POST["tenbaihat"];
    $anh =$_POST["anh"];
    $file =$_POST["file"];
    $album=$_POST["album"];
    $chude=$_POST["chude"];
    $theloai=$_POST["theloai"];
    $casi=$_POST["casi"];

    do{
        if(empty($tenbaihat) || empty($chude) || empty($theloai) ){
            $errorMessage =   "Bạn chưa điền đủ thông tin";
            break;
        }

        else{
            $SqlAlbumId = "Select * from album where TenAlbum = '$album'";
            $SqlCasiId = "Select * from casi where Ten = '$casi'";
            $SqlTheLoaiId = "Select * from theloai where TenTheLoai = '$theloai'";
            $SqlChuDeId ="Select * from chude where TenChuDe = '$chude'";

            $resultAlbumId = $link->query($SqlAlbumId); $rowAlbumId = $resultAlbumId->fetch_assoc(); $albumId = $rowAlbumId["ID"];
            $resultCasiId = $link->query($SqlCasiId); $rowCasiId = $resultCasiId->fetch_assoc(); $casiId = $rowCasiId["ID"];
            $resultTheLoaiId = $link->query($SqlTheLoaiId); $rowTheLoaiId = $resultTheLoaiId->fetch_assoc(); $theloaiId = $rowTheLoaiId["ID"];
            $resultChuDeId = $link->query($SqlChuDeId); $rowChuDeId = $resultChuDeId->fetch_assoc(); $chudeId = $rowChuDeId["ID"];

            $sql = "update baihat Set TenBaiHat = '$tenbaihat', Anh ='$anh', File='$file',IDAlbum='$albumId',IDChuDe='$chudeId',IDTheLoai='$theloaiId',IDCasi='$casiId' Where ID = '$id'";
            $result = $link->query($sql);
        }
        if(!$result){
            $errorMessage = "Không hợp lệ : " .$link->error;
            break;
        }
        $successMessage = "Sửa thông tin thành công";
        header("location: /BTL/PHP/Songs/index.php");
        exit;

    }while(false);
}
?>
<div class="card-body">
    <br>
    <h2>Chỉnh sửa bài hát</h2>
    <br><br>
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
            <label class="col-sm-3 col-form-label">File</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="file" value="<?php echo $file ?>">
            </div>
        </div>

        <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Album</label>
                <div class="col-sm-6">
                <select name="album" class="form-control">
                        <?php echo $optionsAlbum ?>       
                </select>
                </div>
        </div>
        <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Chủ đề</label>
                <div class="col-sm-6">
                <select name="chude" class="form-control" >
                <?php echo $optionsChuDe ?>  
                </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Thể loại</label>
                <div class="col-sm-6">
                <select name="theloai" class="form-control">
                <?php echo $optionsTheLoai ?>                   
                </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Ca sĩ</label>
                <div class="col-sm-6">
                <select name="casi"  class="form-control">

                <?php echo $optionsCasi ?>               
                </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/BTL/PHP/Songs/index.php" role="button">Quay lại</a>
                </div>
            </div>
            </form>
</div>

<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/footter.php"
?>
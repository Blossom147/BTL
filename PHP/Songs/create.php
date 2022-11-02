<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/header.php"
?>

<div class="card-body">
        <h2>Tạo mới bài hát</h2>

       
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
                    <input type="text" class="form-control" name="album" value="<?php echo $album ?>">
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
</div>

<?php 
$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/admin/footter.php"
?>
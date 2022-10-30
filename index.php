<?php 
    $link = new mysqli('localhost', 'root', '', 'webmusic') or die('Kết nối thất bại!!');
    mysqli_query($link, 'SET NAMES UTF8');
?>

<!-- head -->
<?php 
    $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
    require_once "$rootDir/BTL/includes/head.php"?>

<!-- menu side -->

    <?php require_once "$rootDir/BTL/templates/menu-side.php"?>
    

<!-- menu side -->

<!-- song side  -->

    <?php require_once "$rootDir/BTL/templates/song-side.php"?>

<!-- song side  -->

<!-- master play -->

    <?php require_once "$rootDir/BTL/templates/master-play.php"?>

<!-- master play -->

<!-- footer -->

<?php require_once "$rootDir/BTL/templates/foot.php"?>

<!-- footer -->



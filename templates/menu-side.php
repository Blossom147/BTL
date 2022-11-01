<div class="menu_side">
        <!-- <h6 id="menu_list_active_button"><i class="bi bi-music-note-list"></i></h6> -->
        <!-- <h1>Playlist<span class="close1"><i class="bi bi-x"></i></span></h1> -->
        <h1>Playlist</h1>
        <div class="playlist">
            <h4 class="active"><span></span><i class="bi bi-music-note-beamed"></i> Playlist</h4>
            <h4 ><span></span><i class="bi bi-music-note-beamed"></i> Last Listening</h4>
            <h4 ><span></span><i class="bi bi-music-note-beamed"></i> Recommended</h4>
        </div>
        <div class="menu_song">
        <?php 
            if(isset($_GET['catID'])) {
                $catID = $_GET['catID'];
                $query =  "Select TenBaiHat, Ten, baihat.Anh, File, LuotThich from baihat inner join casi where baihat.IDCasi = casi.ID and IDChuDe = {$catID}";
            }elseif(isset($_GET['artID'])){
                $artID = $_GET['artID'];
                $query =  "Select TenBaiHat, baihat.Anh, File, LuotThich from baihat where baihat.IDCasi = ${artID}";
            }
            else{           
                 $query =  "Select TenBaiHat, Ten, baihat.Anh, File, LuotThich from baihat inner join casi where baihat.IDCasi = casi.ID";
            }
            $result = mysqli_query($link, $query);
            if(!mysqli_num_rows($result)){
                echo "Không có bản ghi nào";
            }
            else{
                $i = 1;
                while($row = mysqli_fetch_assoc($result)){
            
        ?>
            <li class="songItem">
                <span><?php echo  $i ?></span>
                <img src="/BTL/images/<?php echo $row['Anh'] ?>.jpg" Image= "<?php echo $row['Anh'] ?>" alt="<?php echo $row['TenBaiHat'] ?>">
                <h5>
                    <?php echo  $row['TenBaiHat']?>
                    <div class="subtitle"><?php echo  $row['Ten'] ?></div>
                    <p></p>
                </h5>
                    <i class="bi playListPlay bi-play-circle-fill" id = "<?php echo  $i ?>" File="<?php echo  $row['File'] ?>"></i>
            </li>
            
        <?php $i++;
                }
                    }?>
        </div>
    </div>
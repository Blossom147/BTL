<div class="song_side">
        <nav>
            <ul>
                <a href="/BTL/"><li>Home<span></span></li></a>
                <li>Page</li>
            </ul>
            <div class="search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search music">
            </div>
            <div class="user">
                <a href="/BTL/templates/login.php" style="text-decoration:none;"><li>Login</li></a>
            </div>
        </nav>
        <div class="content">
            <h1>Alan Walker</h1>
            <p>
                You were the shadow to my light Did you feel us Another start You fade 
                <br>
                Away afraid our aim is out of sight Wanna see us Alive
            </p>
            <div class="buttons">
                <button>PLAY</button>
                <button>FOLLOW</button>
            </div>
        </div>
        
        <div class="popular_song">
            <div class="h4">
                <h4>Topic</h4>
                <div class="btn_s">
                    <i id="left_scroll" class="bi bi-arrow-left-short"></i>
                    <i id="right_scroll" class="bi bi-arrow-right-short"></i>
                </div>
            </div>
            <div class="pop_song">
            <?php 
            $query =  "SELECT * FROM chude";
            $result = mysqli_query($link, $query);
            if(!mysqli_num_rows($result)){
                echo "Không có bản ghi nào";
            }
            else{
                $i = 1;
                while($row = mysqli_fetch_assoc($result)){
            
            ?>
            <a style="text-decoration: none;  color: white;" href="/BTL/index.php?catID=<?php echo $row['ID']?>">
                <li class="categoryItem" id = <?php echo $row['ID']?>>
                    <div class="img_play">
                        
                        <img src="/BTL/images/<?php echo $row['Anh']?>.jpg" alt="alan">
                    </div>
                    <h5><?php echo $row['TenChuDe']?>
                    </h5>
                </li>
            </a>
            <?php $i++;
                }
            }?>
            </div>
        </div> 
      
        <div class="popular_art">
            <div class="h4">
                <h4>Popular Artists</h4>
                <div class="btn_s">
                    <i id="left_scrolls" class="bi bi-arrow-left-short"></i>
                    <i id="right_scrolls" class="bi bi-arrow-right-short"></i>
                </div>
            </div>
            <div class="item">
            <?php 
            $query =  "SELECT * FROM casi";
            $result = mysqli_query($link, $query);
            if(!mysqli_num_rows($result)){
                echo "Không có bản ghi nào";
            }
            else{
                while($row = mysqli_fetch_assoc($result)){
            ?>
                <a href="/BTL/index.php?artID=<?php echo $row['ID']?>">
                <li>
                    <img src="/BTL/images/<?php echo $row['Anh']?>.jpg" alt="<?php echo $row['Ten']?>" title="<?php echo $row['Ten']?>">
                </li>
                </a>
            <?php 
                }
            }?>
            </div>
        </div>
    </div>

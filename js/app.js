// scroll Popular Song
let left_scroll = document.getElementById('left_scroll');
let right_scroll = document.getElementById('right_scroll');
let pop_song = document.getElementsByClassName('pop_song')[0];

left_scroll.addEventListener('click', ()=>{
    pop_song.scrollLeft -= 330;
})
right_scroll.addEventListener('click', ()=>{
    pop_song.scrollLeft += 330;
})
// Scroll Popular Art
let left_scrolls = document.getElementById('left_scrolls');
let right_scrolls = document.getElementById('right_scrolls');
let item = document.getElementsByClassName('item')[0];

left_scrolls.addEventListener('click', ()=>{
    item.scrollLeft -= 330;
})
right_scrolls.addEventListener('click', ()=>{
    item.scrollLeft += 330;
})




const music = new Audio('');
// create Array 
const songs = [
  
]

const collection = document.getElementsByClassName("songItem");
for (let i = 0; i < collection.length; i++) {
    var a = {
        id: i+1,
        songName:` ${collection[i].getElementsByTagName('h5')[0].innerHTML} `,
        poster: `${collection[i].getElementsByTagName('img')[0].getAttribute('Image')}`,
        file: `${collection[i].getElementsByTagName('i')[0].getAttribute('File')}`
    };
    songs.push(a);
  }

  console.log(songs);
// // Thay đổi ảnh và tên
// Array.from(document.getElementsByClassName('songItem')).forEach((element, i)=>{
//     element.getElementsByTagName('img')[0].src = songs[i].poster;
//     element.getElementsByTagName('h5')[0].innerHTML = songs[i].songName;
// })


let masterPlay = document.getElementById('masterPlay');
let wave = document.getElementsByClassName('wave')[0];

masterPlay.addEventListener('click',()=>{
    if (music.paused || music.currentTime <=0) {
        music.play();
        masterPlay.classList.remove('bi-play-fill');
        masterPlay.classList.add('bi-pause-fill');
        wave.classList.add('active2');
    } else {
        music.pause();
        masterPlay.classList.add('bi-play-fill');
        masterPlay.classList.remove('bi-pause-fill');
        wave.classList.remove('active2');
    }
} )


const makeAllPlays = () =>{
    Array.from(document.getElementsByClassName('playListPlay')).forEach((element)=>{
            element.classList.add('bi-play-circle-fill');
            element.classList.remove('bi-pause-circle-fill');
    })
}
const makeAllBackgrounds = () =>{
    Array.from(document.getElementsByClassName('songItem')).forEach((element)=>{
            element.style.background = "rgb(105, 105, 170, 0)";
    })
}

let index = 1;
let poster_master_play = document.getElementById('poster_master_play');
let download = document.getElementById('download');
let title = document.getElementById('title');
Array.from(document.getElementsByClassName('playListPlay')).forEach((element)=>{
    element.addEventListener('click', (e)=>{
        index = e.target.id - 1;
        // console.log(songs[index].poster); đã check
        music.src = `/BTL/audio/${songs[index].file}.mp3`;
        poster_master_play.src =`/BTL/images/${songs[index].poster}.jpg`;
        music.play();
        download.href = `/BTL/audio/${songs[index].file}.mp3`;
        let song_title = songs.filter((ele)=>{
            return ele.id == index+1;
        });
        song_title.forEach(ele =>{
            let {songName} = ele;
            title.innerHTML = songName;
            download.setAttribute('download',songName);
        });
        masterPlay.classList.remove('bi-play-fill');
        masterPlay.classList.add('bi-pause-fill');
        wave.classList.add('active2');
        music.addEventListener('ended',()=>{
            masterPlay.classList.add('bi-play-fill');
            masterPlay.classList.remove('bi-pause-fill');
            wave.classList.remove('active2');
        });
        makeAllBackgrounds();
        Array.from(document.getElementsByClassName('songItem'))[`${index}`].style.background = "rgb(105, 105, 170, .1)";
        makeAllPlays();
        e.target.classList.remove('bi-play-circle-fill');
        e.target.classList.add('bi-pause-circle-fill');
        wave.classList.add('active1');
    });
})
let currentStart = document.getElementById('currentStart');
let currentEnd = document.getElementById('currentEnd');
let seek = document.getElementById('seek');
let bar2 = document.getElementById('bar2');
let dot = document.getElementsByClassName('dot')[0];
music.addEventListener('timeupdate',()=>{
    let music_curr = music.currentTime;
    let music_dur = music.duration;
    let min = Math.floor(music_dur/60);
    let sec = Math.floor(music_dur%60);
    if (sec<10) {
        sec = `0${sec}`
    }
    currentEnd.innerText = `${min}:${sec}`;
    let min1 = Math.floor(music_curr/60);
    let sec1 = Math.floor(music_curr%60);
    if (sec1<10) {
        sec1 = `0${sec1}`
    }
    currentStart.innerText = `${min1}:${sec1}`;
    let progressbar = parseInt((music.currentTime/music.duration)*100);
    seek.value = progressbar;
    let seekbar = seek.value;
    bar2.style.width = `${seekbar}%`;
    dot.style.left = `${seekbar}%`;
})
seek.addEventListener('change', ()=>{
    music.currentTime = seek.value * music.duration/100;
})
music.addEventListener('ended', ()=>{
    masterPlay.classList.add('bi-play-fill');
    masterPlay.classList.remove('bi-pause-fill');
    wave.classList.remove('active2');
})
let vol_icon = document.getElementById('vol_icon');
let vol = document.getElementById('vol');
let vol_dot = document.getElementById('vol_dot');
let vol_bar = document.getElementsByClassName('vol_bar')[0];
vol.addEventListener('change', ()=>{
    if (vol.value == 0) {
        vol_icon.classList.remove('bi-volume-down-fill');
        vol_icon.classList.add('bi-volume-mute-fill');
        vol_icon.classList.remove('bi-volume-up-fill');
    }
    if (vol.value > 0) {
        vol_icon.classList.add('bi-volume-down-fill');
        vol_icon.classList.remove('bi-volume-mute-fill');
        vol_icon.classList.remove('bi-volume-up-fill');
    }
    if (vol.value > 50) {
        vol_icon.classList.remove('bi-volume-down-fill');
        vol_icon.classList.remove('bi-volume-mute-fill');
        vol_icon.classList.add('bi-volume-up-fill');
    }
    let vol_a = vol.value;
    vol_bar.style.width = `${vol_a}%`;
    vol_dot.style.left = `${vol_a}%`;
    music.volume = vol_a/100;
})
let back = document.getElementById('back');
let next = document.getElementById('next');

back.addEventListener('click', ()=>{
    index -= 1;
    if (index < 0) {
        index = songs.length;
        
    }
    music.src = `/BTL/audio/${songs[index].file}.mp3`;
    console.log(`${songs[index].file}`);
    poster_master_play.src =`/BTL/images/${songs[index].poster}.jpg`;
    music.play();
    let song_title = songs.filter((ele)=>{
        return ele.id == index+1;
    })

    song_title.forEach(ele =>{
        let {songName} = ele;
        title.innerHTML = songName;
    })
    makeAllPlays();
    // document.getElementById(`${index}`).classList.remove('bi-play-fill');
    // document.getElementById(`${index}`).classList.add('bi-pause-fill');
    makeAllBackgrounds();
    Array.from(document.getElementsByClassName('songItem'))[`${index}`].style.background = "rgb(105, 105, 170, .1)";
    
})

next.addEventListener('click', ()=>{
    index -= 0;
    index += 1;
    if (index > Array.from(document.getElementsByClassName('songItem')).length) {
        index = 0;
    }
    music.src = `/BTL/audio/${songs[index].file}.mp3`;
    poster_master_play.src =`/BTL/images/${songs[index].poster}.jpg`;
    music.play();
    let song_title = songs.filter((ele)=>{
        return ele.id == index+1;
    })

    song_title.forEach(ele =>{
        let {songName} = ele;
        title.innerHTML = songName;
    })
    makeAllPlays()
    document.getElementById(`${index}`).classList.remove('bi-play-fill');
    document.getElementById(`${index}`).classList.add('bi-pause-fill');
    makeAllBackgrounds();
    Array.from(document.getElementsByClassName('songItem'))[`${index}`].style.background = "rgb(105, 105, 170, .1)";
    
})

// remove, next, repear
let shuffle = document.getElementsByClassName('shuffle')[0];
shuffle.addEventListener('click', ()=>{
    let a = shuffle.innerHTML;
    
    switch (a) {
        case "next":
        shuffle.classList.add('bi-arrow-repeat');
            shuffle.classList.remove('bi-music-note-beamed');
            shuffle.classList.remove('bi-shuffle');
            shuffle.innerHTML = 'repeat';
            break;
    
        case "repeat":
        shuffle.classList.remove('bi-arrow-repeat');
            shuffle.classList.remove('bi-music-note-beamed');
            shuffle.classList.add('bi-shuffle');
            shuffle.innerHTML = 'random';
            break;

        case "random":
        shuffle.classList.remove('bi-arrow-repeat');
            shuffle.classList.add('bi-music-note-beamed');
            shuffle.classList.remove('bi-shuffle');
            shuffle.innerHTML = 'next';
            break;
    }
});

const next_music = () =>{
    if (index == songs.length) {
        index = 0
    }else{
        index++;
    }
    music.src = `/BTL/audio/${songs[index].file}.mp3`;
    poster_master_play.src =`/BTL/images/${songs[index].poster}.jpg`;
    music.play();
    masterPlay.classList.remove('bi-play-fill');
    masterPlay.classList.add('bi-pause-fill');
    download.href = `/BTL/audio/${songs[index].file}.mp3`;
    let song_title = songs.filter((ele)=>{
        return ele.id == index;
    });
    song_title.forEach(ele =>{
        let {songName} = ele;
        title.innerHTML = songName;
        download.setAttribute('download',songName);
    });
    wave.classList.add('active2');
    music.addEventListener('ended',()=>{
        masterPlay.classList.add('bi-play-fill');
        masterPlay.classList.remove('bi-pause-fill');
        wave.classList.remove('active2');
    });
    makeAllBackgrounds();
    Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = "rgb(105, 105, 170, .1)";
    makeAllPlays();
    e.target.classList.remove('bi-play-circle-fill');
    e.target.classList.add('bi-pause-circle-fill');
    wave.classList.add('active1');   
}

const repeat_music = () =>{
    index;
    music.src = `/BTL/audio/${songs[index].file}.mp3`;
    poster_master_play.src =`/BTL/images/${songs[index].poster}.jpg`;
    music.play();
    masterPlay.classList.remove('bi-play-fill');
    masterPlay.classList.add('bi-pause-fill');
    download.href = `/BTL/audio/${songs[index].file}.mp3`;
    let song_title = songs.filter((ele)=>{
        return ele.id == index;
    });
    song_title.forEach(ele =>{
        let {songName} = ele;
        title.innerHTML = songName;
        download.setAttribute('download',songName);
    });
    wave.classList.add('active2');
    music.addEventListener('ended',()=>{
        masterPlay.classList.add('bi-play-fill');
        masterPlay.classList.remove('bi-pause-fill');
        wave.classList.remove('active2');
    });
    makeAllBackgrounds();
    Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = "rgb(105, 105, 170, .1)";
    makeAllPlays();
    e.target.classList.remove('bi-play-circle-fill');
    e.target.classList.add('bi-pause-circle-fill');
    wave.classList.add('active1');   
}

const random_music = () =>{
    if (index == songs.length) {
        index = 1
    }else{
        index = Math.floor((Math.random() * songs.length) +1);
    }
    music.src = `/BTL/audio/${songs[index].file}.mp3`;
    poster_master_play.src =`/BTL/images/${songs[index].poster}.jpg`;
    music.play();
    masterPlay.classList.remove('bi-play-fill');
    masterPlay.classList.add('bi-pause-fill');
    download.href = `/BTL/audio/${songs[index].file}.mp3`;
    let song_title = songs.filter((ele)=>{
        return ele.id == index;
    });
    song_title.forEach(ele =>{
        let {songName} = ele;
        title.innerHTML = songName;
        download.setAttribute('download',songName);
    });
    wave.classList.add('active2');
    music.addEventListener('ended',()=>{
        masterPlay.classList.add('bi-play-fill');
        masterPlay.classList.remove('bi-pause-fill');
        wave.classList.remove('active2');
    });
    makeAllBackgrounds();
    Array.from(document.getElementsByClassName('songItem'))[`${index-1}`].style.background = "rgb(105, 105, 170, .1)";
    makeAllPlays();
    e.target.classList.remove('bi-play-circle-fill');
    e.target.classList.add('bi-pause-circle-fill');
    wave.classList.add('active1');   
}

music.addEventListener('ended', ()=>{
        let b = shuffle.innerHTML;

        switch (b) {
            case 'repeat':
                repeat_music();
                break;
            case 'next':
                next_music();
                break;
            case 'random':
                random_music();
                break;
        }
})

// like
x = document.querySelector('.heart');
x.addEventListener('click', function(){
    console.log("click");
    x.style.color="#f8104e";
})

// //respoveive
// let menu_list_active_button = document.getElementById('menu_list_active_button');
// let menu_side = document.getElementsByClassName('menu_side')[0];
// menu_list_active_button.addEventListener('click', ()=>{
//     menu_side.style.transform= "unset";
//     menu_list_active_button.style.opacity = 0;
// })

// let close1 = document.getElementsByClassName('close1')[0];
// close1.addEventListener('click', ()=>{
//     menu_side.style.transform = "translateX(-100%)";
//     menu_list_active_button.style.opacity = 1;
// })
<?php session_start();
    if(empty($_SESSION['id'])) {
        header('location:index.php');
        exit();
    }

    $search = '';
    if(isset($_GET['search'])) {
        $search = $_GET['search'];
    }

    $id = $_SESSION['id'];
    require_once './database/connect.php';
    $sql = "select songs.* from songs
    join saved_songs
    on saved_songs.song_id = songs.id 
    where saved_songs.user_id = '$id' and name like '%$search%'
    order by songs.id desc";
    $result = mysqli_query($connect, $sql);

    require_once './template/heading.php';
?>
        <div class="container-fluid px-4">
            <div class="user__profile-container">
                <div class="user__avatar">
                    <figure class="user__avatar-img">
                        <img src="./assets/images/users/<?= $_SESSION['image'] ?>" alt="">
                    </figure>
                </div>
                <h3 class="title"><?= $_SESSION['name'] ?></h3>
                <div class="user__profile-actions">
                    <a class="user-btn user-btn user-rounded vip-btn  user-small  " tabindex="0" href="" target="_blank">Nâng Cấp VIP</a>
                    <a class="user-btn user-btn user-rounded vip-code-btn user-small " tabindex="0" href="" target="_blank">Nhập code vip</a>
                    <span class="user__profile-btn">
                        <button class="user-btn2  user-btn-more " tabindex="0">
                            <span class="material-icons-outlined">
                                more_horiz
                            </span>
                        </button>
                    </span>
                </div>
                <nav class="user-navbar user-profile-navbar is-oval  user-navbar-wrap ">
                    <div class="user-narbar-container">
                        <ul class="user-navbar-menu">
                            <li class="user-navbar-item">
                                <div class="navbar-link"><a class="" href="">TỔNG QUAN</a>
                                </div>
                            </li>
                            <li class="user-navbar-item is-active">
                                <div class="navbar-link">
                                    <a class="" href="">BÀI HÁT</a>
                                </div>
                            </li>
                            <li class="user-navbar-item">
                                <div class="navbar-link">
                                    <a class="" href="">PLAYLIST</a>
                                </div>
                            </li>
                            <li class="user-navbar-item">
                                <div class="navbar-link">
                                    <a class="" href="">NGHỆ SĨ</a>
                                </div>
                            </li>
                            <li class="user-navbar-item btn-dropdown">
                                <button class="user-navbar-btn button" tabindex="0">
                                    <span class="material-icons-outlined">
                                        more_horiz
                                    </span>

                                </button>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="container mymusic-song-view">
                <div class="container library-song-list">
                    <div class="song-list-header">
                        <h3 class="mar-0 title ">Bài hát</h3>
                        <div class="song-list-right">
                            <input id="up-button" type="" accept="" multiple="" style="display: none;">
                            <label for="up-button">
                                <a class="zm-btn mar-r-15 is-outlined is-small is-upper" tabindex="0">
                                    <span class="song-list-icon material-icons-outlined">
                                        file_upload
                                    </span> <span>Tải lên</span>
                                </a>
                            </label>
                            <button class="zm-btn is-outlined active is-small is-upper " tabindex="0">
                                <span class="material-icons-outlined">
                                    play_arrow
                                </span>
                                <span>Phát tất cả</span>
                            </button>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
            <div class="main_article col-11">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="main__list-title" scope="col">Bài hát</th>
                            <th class="main__list-title" scope="col">Album</th>
                            <th class="main__list-title" scope="col">Thời gian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($result as $each): ?>
                            <tr>
                                <th scope="row">
                                    <div class="main__list">
                                        <i class="fas fa-music"></i>
                                        <img src="assets/images/songs/<?= $each['image'] ?>" style="width:40px" alt="">
                                        <ul class="main__list-songname">
                                            <li class="main__list-songname--li1"><?= $each['name'] ?></li>
                                            <li><?= $each['vocalist'] ?></li>
                                        </ul>
                                        <div class="main__list-hover2">
                                            <ul class="main__list-hover2--ul">
                                                <li class="main__list-hover2--li1">
                                                    <span class="material-icons-outlined">
                                                        play_arrow
                                                    </span>
                                                </li>
                                                <li class="main__list-hover2--li2">
                                                    <span class="material-icons-outlined">
                                                        music_video
                                                    </span>
                                                    <span class="material-icons-outlined">
                                                        favorite_border
                                                    </span>
                                                    <span class="material-icons-outlined">
                                                        more_horiz
                                                    </span>
                                                </li>

                                            </ul>

                                        </div>
                                    </div>
                                </th>
                                <td class="main__list-album"><?= $each['name'] ?> (Single)</td>
                                <td class="main__list-album">02:20</td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>

                </table>
            </div>

            <?php require_once './music_player.php' ?>
        </div>
    </div>
    </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
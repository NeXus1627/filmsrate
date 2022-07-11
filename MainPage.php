<?php
include 'admin/includes/db_admin.php';
include_once 'rate.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Рейтинг фільмів</title>
  <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="MainPageStyle.css">
  <link rel="icon" type="image/x-icon" href="img/popcorn-tab.ico">
</head>

<div class="wrapper">
  <div class="menu-wrap">
    <div class="header">
          <img class="img-logo" src="img/logo.png" >
        <div class="menu">
            <ul>
             <li><a href="#">Фільми</a></li>
             <li><a href="AboutTheAuthor.html">Про авторів</a></li>
            </ul>
        </div>
        <?php if(isset($_SESSION['login'])): ?>
        <div class="authorization">
            <p><h4 class="text-center"><?php echo $_SESSION['login'] ;?></h4></p>
            <form action="MainPage.php" method="post">
            <p><a href="logout.php" name="destroy">Вихід</a></p>
            </form>
        </div>
        <?php endif;?>
        <?php if(!isset($_SESSION['login'])): ?>
        <div class="authorization">
          <p><a href="login.php">Вхід</a></p>
          <p><a href="registration.php">Реєстрація</a></p>
        </div>
        <?php endif;?>
    </div>
  </div>
      <body>
        <div class="main-block">
          <div class="sorting">
            <button class="more">
              <p>Найкращі фільми</p>
            </button>
            <button class="less">
              <p>Трохи не не дотянули Оскара</p>
            </button>
          </div>
            <?php
            $server = 'localhost';
            $user = 'root';
            $password = 'root123';
            $db = 'filmsrate';
            $db = mysqli_connect($server, $user, $password, $db);

            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }

            $size_page = 5;
            $offset = ($pageno-1) * $size_page;

            $pages_sql = "SELECT COUNT(*) FROM `films`";
            $result = mysqli_query($db, $pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $size_page);

            $sql = "SELECT * FROM `films` LIMIT $offset, $size_page";

            $res_data = mysqli_query($db, $sql);

            while($row = mysqli_fetch_array($res_data)):

            ?>

          <div class="block1">
            <div class="photo-block"><img src="<?php echo $row['film_logo']; ?>"></div>
            <div class="text-block">
              <div class="title"><h1><?php echo $row['film_name']; ?></h1></div>
              <div class="genre"><p>Жанр: Драми, Мелодрами, Закордонні</p></div>
              <div class="discriptin">
                <p><?php echo $row['film_description']; ?></p>
              </div>
            </div>

              <div class="rating">
                  <div class="rating_items">
                      <input id="rating_5" type="radio" class="rating_item" name="rating" value="5">
                      <label for="rating_5" class="rating_label"></label>
                      <input id="rating_4" type="radio" class="rating_item" name="rating" value="4">
                      <label for="rating_4" class="rating_label"></label>
                      <input id="rating_3" type="radio" class="rating_item" name="rating" value="3">
                      <label for="rating_3" class="rating_label"></label>
                      <input id="rating_2" type="radio" class="rating_item" name="rating" value="2">
                      <label for="rating_2" class="rating_label"></label>
                      <input id="rating_1" type="radio" class="rating_item" name="rating" value="1">
                      <label for="rating_1" class="rating_label"></label>
                  </div>
                  <div class="rate1">
                  <p ><?php echo $row['film_rate']; ?>/5</p>
                  </div>
              </div>
          </div>
            <?php endwhile; ?>
            <div class="row">
                <ul class="pagination  center-block">
                    <li><a href="?pageno=1">First</a></li>
                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                    </li>
                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                    </li>
                    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                </ul>
            </div>
        </div>

      </div>

      </body>



      <div class="footer">
        <p> &copy; Сopyright 2022 </p>
        <!-- <a class="team-title">
          Team
        </a>
        <div class="front">
          <a>
            Front-end
          </a>
          <ul>
            <li>Іванюк Мирослав</li>
            <li>Басараб Арсен</li>
          </ul>
        </div>
        <div class="back">
          <a>
            Back-end
          </a>
          <ul>
            <li>Богаченко В.</li>
            <li>Васильків Олег</li>
          </ul>
        </div>
        <div class="db">
          <a>
            DB 
          </a>
          <ul>
            <li>Лелюк О.</li>
          </ul>
        </div> -->
      </div>
</div>

</html>
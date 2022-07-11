<?php
include 'admin/includes/db_admin.php';
if(isset($_GET['id'], $_GET['rating'])) {
    $article = (int)$_GET['id'];
    $rating = (int)$_GET['rating'];
    if(in_array($rating, array(1,2,3,4,5))) {
        $exists = $link->query("SELECT id FROM film_rate WHERE id = {$article}")->num_rows ? true : false;
        if($exists){
            $link->query("INSERT INTO film_rate (film_id,rate) VALUES ({$article}, {$rating})");
        }
    }
    header ('Location: MainPage.php?id='.$article);
}
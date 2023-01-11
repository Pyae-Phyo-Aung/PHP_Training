<?php
require_once "db_connect.php";
require_once "functions.php";

$tittleRandom = array("This is PHP", "This is Python", "This is Ruby", "Thi is Laravel", "This is java", "This is CSS", "This is jQuery");
$title = $tittleRandom[array_rand($tittleRandom)];
$content = "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae alias nam ullam totam voluptatem possimus atque sed inventore quibusdam odio et facilis pariatur rem maxime eaque, quo adipisci quia architecto? Inventore iure sequi rerum aperiam quam placeat culpa odit! Dolore facilis neque, ullam tenetur tempore pariatur obcaecati earum, veritatis veniam, nobis dolor saepe harum voluptatibus voluptates illo nulla voluptas quisquam ex. A libero aliquid quas. Dicta nobis mollitia fugiat veritatis!";
$publish = "0";

for ($i = 1; $i < 2; $i++) {
  $sql = "INSERT INTO posts (title,content,is_published,created_datetime,updated_datetime) VALUES ('$title','$content','$publish','2022-12-$i 11:23:39','2022-12-$i 11:23:39');";
  $ret = mysqli_query($conn, $sql);
  if ($ret) {
    header('location:index.php');
  }
}


<?php
require 'php/local-query.php';

$title = $_POST['title'];
$description = $_POST['description'];
$maps = $_POST['maps'];
$url = $_POST['img_url'];
$type = $_POST['type'];
$school = $_POST['skole'];
$web = $_POST['web'];
$rating = $_POST['rating'];

$activity = new Activity();
$activity->title = $title;
$activity->description = $description;
$activity->img_url = $url;
$activity->type = $type;
$activity->maps = $maps;
$activity->skoleID = $school;
$activity->rating = $rating;
$activity->web = $web;
$activity->save();
header('Location: admin.php');

?>

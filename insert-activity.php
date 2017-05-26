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

switch($school) {
   case 'Campus Brennerviveien';
        $schoolId = 1;
        break;
   case 'Campus Vulkan';
        $schoolId = 2;
        break;
   case 'Campus Fjerdingen';
        $schoolId = 3;
        break;
}

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

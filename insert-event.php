<?php
require 'php/local-query.php';

$title = $_POST['title'];
$description = $_POST['description'];
$pris = $_POST['pris'];
$url = $_POST['img_url'];
$date = $_POST['date'];
$type = $_POST['type'];
$school = $_POST['skole'];
$schoolId = $_POST['skole'];
$maps = $_POST['maps'];
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

$event = new Event();
$event->title = $title;
$event->description = $description;
$event->pris = $pris;
$event->img_url = $url;
$event->date = $date;
$event->type = $type;
$event->skole_id = $school;
$event->maps = $maps;
$event->save();
header('Location: admin.php');

?>

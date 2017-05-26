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

$event = new Event();
$event->title = $title;
$event->description = $description;
$event->pris = $pris;
$event->img_url = $url;
$event->date = $date;
$event->type = $type;
$event->skole_id = $school;
$event->save();
header('Location: admin.php');

?>

<!DOCTYPE HTML>
<?php

require 'vendor/autoload.php';
use Carbon\Carbon;
Carbon::setLocale('no');

$port = 8889;
$username = 'chris';
$password = 'chris';
$name = 'eksamen';

$connection = new PDO('mysql:host=localhost;dbname=eksamen;port=3305', $username, $password);
$statement = $connection->prepare('SELECT * FROM events ORDER BY date ASC');
$statement->execute();
$events = [];


while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $row['date'] = new Carbon($row['date']);
    $events[] = $row;
}

?>
<head>
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/body.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>Web-22</title>
</head>
<body ontouchstart>
<?php include_once 'header.php'; ?>
<h1>Test1</h1>
</body>
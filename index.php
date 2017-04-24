<!doctype HTML>
<?php

   require 'vendor/autoload.php';
   use Carbon\Carbon;
   Carbon::setLocale('no');

   /* Lokal
   $port = 8889;
   $username = 'root';
   $password = 'root';
   $name = 'eksamen';
   */

   // - Global -
   $port = 3306;
   $username = 'lybotech_com';
   $password = 'Te6kxjvvbx';
   $name = 'events';

   $connection = new PDO('mysql:host=lybotech.com.mysql;dbname=lybotech_com', $username, $password);
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
</head>

<body ontouchstart>
   <?php include_once 'header.php'; ?>
   <div id="event-container">
      <!-- VENSTRE - NYESTE EVENT -->
      <div id="event-left">
         <?php require 'event-left.php'; ?>
      </div>

      <!-- HØYRE - 4 SMÅ EVENTS -->
      <div id="event-right">
         <?php require 'event-right.php'; ?>
   </div>
</body>

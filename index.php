<!doctype HTML>
<?php

   require 'vendor/autoload.php';
   use Carbon\Carbon;
   Carbon::setLocale('no');

   // - Global -
   /*
   $port = 3306;
   $username = 'lybotech_com';
   $password = 'Te6kxjvvbx';
   $name = 'events';

   $connection = new PDO('mysql:host=lybotech.com.mysql;dbname=lybotech_com', $username, $password);
   $statement = $connection->prepare('SELECT * FROM events ORDER BY date ASC');
   $statement->execute();
   $events = [];
   */

   // - Local -
   $port = 3306;
   $username = 'root';
   $password = 'root';
   $name = 'events';

   // Local
   $connection = new PDO('mysql:host=localhost;dbname=eksamen', $username, $password);
   $statement = $connection->prepare('SELECT * FROM events ORDER BY date ASC');
   $statement->execute();
   $events = [];

   while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $row['date'] = new Carbon($row['date']);
      $events[] = $row;
   }

?>
<body ontouchstart>
   <?php include_once 'php/header.php'; ?>
   <div id="event-container">
      <!-- VENSTRE - NYESTE EVENT -->
      <div id="event-left">
         <?php require 'php/event-left.php'; ?>
      </div>

      <!-- HØYRE - 4 SMÅ EVENTS -->
      <div id="event-right">
         <?php require 'php/event-right.php'; ?>
      </div>
   </div>
   <?php include_once 'php/footer.php';?>
</body>

<?php
   require 'vendor/autoload.php';
   use Carbon\Carbon;
   Carbon::setLocale('no');

   $port = 8666;
   $username = 'root';
   $password = '';
   $name = 'eksamen';

   $connection = new PDO('mysql:host=localhost;dbname=lyband16_eksamen', $username, $password);
   $statement = $connection->prepare('SELECT * FROM events ORDER BY date ASC');
   $statement->execute();
   $events = [];

   while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $row['date'] = new Carbon($row['date']);
      $events[] = $row;
   }
?>

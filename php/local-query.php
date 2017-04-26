<?php
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

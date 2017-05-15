<?php
   $title = $_POST['Title'];
   $pris = $_POST['pris'];
   $date = $_POST['date'];
   $url = $_POST['img_url'];
   $description = $_POST['description'];
   $school = $_POST['skole_id'];
   $type = $_POST['type'];

   // Connect and select DB
   $connect =  mysqli_connect('localhost', 'root', 'root');
   if (!$connect) {
      echo 'Not connected';
   }

   if (!mysqli_select_db($connect, 'eksamen')) {
      echo 'Database not selected';
   }

   // Submit
      $sql = "INSERT INTO events (id, title, description, pris, img_url, date, type, skole_id)
      VALUES (NULL, '$title', '$description', '$pris', '$url', '$date', '$type', '$school')";

         if ($connect->query($sql) === TRUE) {
            header("Location:../index.php");
            exit;
         } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
         }
         $connect->close();

?>

<?php
   $title = $_POST['Title'];
   $pris = $_POST['pris'];
   $date = $_POST['date'];
   $url = $_POST['img_url'];
   $description = $_POST['description'];

   // Connect and select DB
   $connect =  mysqli_connect('localhost', 'root', 'root');
   if (!$connect) {
      echo 'Not connected';
   }

   if (!mysqli_select_db($connect, 'eksamen')) {
      echo 'Database not selected';
   }

   // Submit
      $sql = "INSERT INTO events (id, title, description, pris, img_url, date)
      VALUES (NULL, '$title', '$description', '$pris', '$url', '$date')";

         if ($connect->query($sql) === TRUE) {
            header("Location:../index.php");
            exit;
         } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
         }
         $connect->close();

?>

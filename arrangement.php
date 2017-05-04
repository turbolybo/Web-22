<head><link rel="stylesheet" type="text/css" href="css/arrangement.css"></head>
<?php

   $id = $_GET['id'];

   require 'vendor/autoload.php';
   use Carbon\Carbon;
   Carbon::setLocale('no');
   // Local

   $port = 3306;
   $username = 'root';
   $password = '';
   $name = 'events';
   $connection = new PDO('mysql:host=localhost;dbname=eksamen', $username, $password);

   $statement = $connection->prepare('SELECT * FROM events WHERE id=:id');
   $statement->bindParam(':id', $id);
   $statement->execute();
   $row = $statement->fetch();
?>
<body ontouchstart>
   <?php include_once 'php/header.php'; ?>
   <div id="main-wrapper">
        <div id="cover" style="background-image: url('<?php echo $row['img_url']; ?>')">
           <?php
             if ($row['pris'] == 0) {
                echo '<div id="isFree">GRATIS!</div>';
             } else {
                echo '<div id="isNotFree">', $row['pris'], ",-", '</div>';
             }
           ?>
        </div>
        <section>
             <h1><?php echo $row['title']; ?></h1>

             <article>
                <?= $row['description'] ?>
             </article>
        </section>
   </div>
   <?php include_once 'php/footer.php';?>
</body>

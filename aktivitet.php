<head><link rel="stylesheet" type="text/css" href="css/arrangement.css"></head>
<?php

   $id = $_GET['id'];
   $skole = 0;

   require 'vendor/autoload.php';
   use Carbon\Carbon;
   Carbon::setLocale('no');
   // Local
   $google_id = 'AIzaSyAIpp_FV9KS9hT8-gwSNP6VJIPyGQjjOJk';

   $port = 3306;
   $username = 'root';
   $password = '';
   $name = 'events';
   $connection = new PDO('mysql:host=localhost;dbname=eksamen', $username, $password);

   $statement = $connection->prepare('SELECT * FROM activity WHERE id=:id');
   $statement->bindParam(':id', $id);
   $statement->execute();
   $row = $statement->fetch();
?>
<body ontouchstart>
   <?php

    ?>
   <?php include_once 'php/header.php'; ?>
   <div id="main-wrapper">
        <div id="cover" style="background-image: url('<?php echo $row['img_url']; ?>')">
        </div>
        <section>
             <h1><?php echo $row['title']; ?></h1>

             <article>
                <?= $row['description'] ?>
             </article>
             <a href="http://<?= $row['web'] ?>"><div id="web-link">HJEMMESIDE</div></a>
        </section>
   </div>
   <div id="maps" class="no-scroll">
      <iframe
        width="100%"
        height="450"
        frameborder="0" style="border:0"
        src="https://www.google.com/maps/embed/v1/place?key=<?= $google_id ?>
          &q=<?= $row['maps'] ?>,Oslo+NORWAY" allowfullscreen>
      </iframe>
   </div>
   <script>
      $('#map').click(function () {
          $('.no-scroll iframe').css("pointer-events", "auto");
      });

      $( "#map" ).mouseleave(function() {
        $('.no-scroll iframe').css("pointer-events", "none");
      });
   </script>
   <?php include_once 'php/footer.php';?>
</body>

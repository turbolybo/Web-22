<head><link rel="stylesheet" type="text/css" href="css/arrangement.css"></head>
<?php

   $id = $_GET['id'];

   require 'vendor/autoload.php';
   require 'php/local-query.php';
   use Carbon\Carbon;
   Carbon::setLocale('no');

   $google_id = 'AIzaSyAIpp_FV9KS9hT8-gwSNP6VJIPyGQjjOJk';
   $row = Event::whereid($id)->first();
   if ($row['id'] == NULL) {
      echo "<script>location.href='404.php';</script>";
   }
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
             }?><div id="img-title"><?php echo mb_strtoupper($row['title'], 'UTF-8'); ?></div>

        </div>
        <section>
             <h1><?php echo $row['title']; ?></h1>

             <article>
                <?= $row['description'] ?>
             </article>
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
   <?php include_once 'php/footer.php';?>
</body>

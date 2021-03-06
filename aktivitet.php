<head><link rel="stylesheet" type="text/css" href="css/arrangement.css"></head>
<?php

   $id = $_GET['id'];
   require 'vendor/autoload.php';
   require 'php/local-query.php';
   use Carbon\Carbon;
   Carbon::setLocale('no');

   $google_id = 'AIzaSyAIpp_FV9KS9hT8-gwSNP6VJIPyGQjjOJk';
   $row = Activity::whereid($id)->first();
   if ($row['id'] == NULL) {
      echo "<script>location.href='404.php';</script>";
   }
?>
<body ontouchstart>
   <?php include_once 'php/header.php'; ?>
   <div id="main-wrapper">
        <div id="cover" style="background-image: url('<?php echo $row['img_url']; ?>')">
           <div class="img-title"><?php echo mb_strtoupper($row['title'], 'UTF-8'); ?></div>
        </div>
        <section>


             <article>
                <h2><?php echo "Om ", mb_strtolower($row['title'], 'UTF-8'); ?></h2>
                <?php echo $row['description']; ?>
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

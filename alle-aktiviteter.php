<head>
   <link rel="stylesheet" type="text/css" href="css/arrangement.css">
</head>
<?php require_once 'php/header.php'; ?>
<div id="container">
   <div id="container-all">
      <?php
         require 'vendor/autoload.php';
         use Carbon\Carbon;
         Carbon::setLocale('NO');
         include 'php/local-query.php';
         $alle = Activity::orderBy('rating', 'DESC')->limit(100)->get();

         foreach($alle as $a) {
            if ($a['rating'] == 0) {
               $img = 'rating0.png';
            } else if ($a['rating'] == 1) {
               $img = 'rating1.png';
            } else if ($a['rating'] == 2) {
               $img = 'rating2.png';
            } else if ($a['rating'] == 3) {
               $img = 'rating3.png';
            } else if ($a['rating'] == 4) {
               $img = 'rating4.png';
            } else if ($a['rating'] == 5) {
               $img = 'rating5.png';
            } else {
               $img = 'rating0.png';
            }

            echo '<div class="each-item">';
            echo '<div class="item-upper" style="background-image: url(', $a['img_url'], '")>';
            echo '</div>';
            echo '<p>',$a['title'],'</p>';
            echo '<a href="arrangement.php?id=',$a['id'],'"><div class="visit">LES MER</div></a>';
            echo "</div>";
         }
      ?>
   </div>

</div>
<?php require_once 'php/footer.php'; ?>

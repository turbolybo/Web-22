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
         $alle = Event::orderBy('date', 'ASC')->limit(100)->get();

         foreach($alle as $a) {
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

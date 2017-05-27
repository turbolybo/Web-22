<?php
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
      echo '<div class="activity-box" style="background-image: url(',$a['img_url'],')">';
      echo '<div class="activity-upper">';
         echo '<div class="star">';
         echo '<img src="bilder/',$img,'">';
         echo '</div>';
      echo '</div>';
      echo '<div class="activity-lower">';
        echo '<h3>', $a['title'], '</h3>', '<br>';
        echo '<a href="aktivitet.php?id=',$a['id'],'"><div class="visit">LES MER</div></a>';
      echo '</div>';
      echo '</div>';
?>
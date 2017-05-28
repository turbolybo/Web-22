<?php
function WriteActivities($activities, $useRatings){
    foreach($activities as $activity) {
        WriteActivity($activity, $useRatings);    
    }
}   
function WriteActivity($activity, $useRatings){
  if($useRatings){
      if ($activity['rating'] == 0) {
         $img = 'rating0.png';
      } else if ($activity['rating'] == 1) {
         $img = 'rating1.png';
      } else if ($activity['rating'] == 2) {
         $img = 'rating2.png';
      } else if ($activity['rating'] == 3) {
         $img = 'rating3.png';
      } else if ($activity['rating'] == 4) {
         $img = 'rating4.png';
      } else if ($activity['rating'] == 5) {
         $img = 'rating5.png';
      } else {
         $img = 'rating0.png';
      }
  }
      echo '<div class="activity-box" style="background-image: url(',$activity['img_url'],')">';
      echo '<div class="activity-upper">';
      if($useRatings){
         echo '<div class="star">';
         echo '<img src="bilder/',$img,'">';
         echo '</div>';
      }
      echo '</div>';
      echo '<div class="activity-lower">';
        echo '<h3>', $activity['title'], '</h3>', '<br>';
        echo '<a href="aktivitet.php?id=',$activity['id'],'"><div class="visit">LES MER</div></a>';
      echo '</div>';
      echo '</div>';
}
?>

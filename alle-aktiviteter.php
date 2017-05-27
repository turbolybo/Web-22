<?php require_once 'php/header.php'; ?>
<div id="container" class="activityPage">
   <div id="container-all">
      <?php
         require 'vendor/autoload.php';
         use Carbon\Carbon;
         Carbon::setLocale('NO');
         include 'php/local-query.php';
         $activity = Activity::orderBy('rating', 'DESC')->limit(100)->get();
        require 'php/activity-container.php'; 
      ?>
   </div>

</div>
<?php require_once 'php/footer.php'; ?>

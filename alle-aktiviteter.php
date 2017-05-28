
<?php require_once 'php/header.php'; ?>
<div id="container" class="activityPage">
   <div id="container-all">
      <?php
         require 'vendor/autoload.php';
         use Carbon\Carbon;
         Carbon::setLocale('NO');
         include 'php/local-query.php';
        require 'php/activity-container.php'; 
        $activities = Activity::orderBy('rating', 'DESC')->limit(100)->get();
        WriteActivities($activities, true);
      ?>
      <div class="clearFix"></div>
   </div>

</div>
<?php require_once 'php/footer.php'; ?>

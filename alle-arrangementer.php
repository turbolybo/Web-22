<?php require_once 'php/header.php'; ?>
<div id="container" class="activityPage">
   <div id="container-all">
      <?php
         require 'vendor/autoload.php';
         use Carbon\Carbon;
         Carbon::setLocale('NO');
         include 'php/local-query.php';
        $activities = Event::orderBy('date', 'ASC')->limit(100)->get();
        require 'php/activity-container.php'; 
        WriteActivities($activities, false);
      ?>
      <div class="clearFix"></div>
   </div>
   
</div>
<?php require_once 'php/footer.php'; ?>

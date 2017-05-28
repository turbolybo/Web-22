<!doctype HTML>
<?php
   include 'php/local-query.php';
   $events = Event::orderBy('date', 'asc')->get();
   $event_right = Event::orderBy('date', 'asc')->take(5)->skip(1)->get();
?>
<body ontouchstart>
   <?php include_once 'php/header.php'; ?>
   <div id="event-container">

      <!-- VENSTRE - NYESTE EVENT -->
      <div id="event-left">
         <?php require 'php/event-left.php'; ?>
      </div>

      <!-- HØYRE - 4 SMÅ EVENTS -->
      <div id="event-right">
         <?php require 'php/event-right.php'; ?>
      </div>
   </div>
   <h2 class="main-title">Aktiviteter / Lokale tilbud</h2>
   <div id="activity-container">
      <?php require 'php/activity-container.php'; ?>
   </div>

   <div id="activity-seall-container">
      <a href="alle-aktiviteter.php"><div id="activity-seeall">SE ALLE TILBUD</div></a>
   </div>
   <?php include_once 'php/footer.php';?>
</body>
<!html>

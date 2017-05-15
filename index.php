<!doctype HTML>
<?php

   // LOKAL VERSJON

   include 'php/local-query.php';
   $events = Event::all();

   // LIVE VERSJON
   /*
   include 'php/live-query.php';
   */
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
   <?php include_once 'php/footer.php';?>
</body>

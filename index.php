<!doctype HTML>
<?php

   require 'vendor/autoload.php';
   use Carbon\Carbon;
   Carbon::setLocale('no');

   // LOKAL VERSJON
   /*
   include_once 'php/local-query.php';
   */

   // LIVE VERSJON

   include_once 'php/live-query.php';

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
   <?php include_once 'php/footer.php';?>
</body>

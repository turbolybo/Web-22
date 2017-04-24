<!doctype HTML>
<?php
   require 'db.php';
?>
<head>
   
</head>
<body ontouchstart>
   <?php include_once 'header.php'; ?>
   <div id="event-container">
      <!-- VENSTRE - NYESTE EVENT -->
      <div id="event-left">
         <?php require 'event-left.php'; ?>
      </div>

      <!-- HØYRE - 4 SMÅ EVENTS -->
      <div id="event-right">
         <?php require 'event-right.php'; ?>
   </div>
</body>

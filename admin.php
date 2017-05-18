<!doctype HTML>
<head>
   <meta name="viewport" content="initial-scale=1.0">
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="css/body.css">
   <link rel="stylesheet" type="text/css" href="css/admin.css">
   <link rel="stylesheet" type="text/css" href="css/header.css">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <style>
        /*Får ikke lagt til i admin.css*/
        #school-dropdown {
            position: relative; left: 25px; top: 10px;
            width: 400px;
        }

    </style>


</head>
<body ontouchstart>

   <?php
    include 'php/local-query.php';
      include_once 'php/header.php';
      require './vendor/autoload.php';
      use Carbon\Carbon;
      Carbon::setLocale('no');



      $events = Event::all();
      $port = 8889;
      $username = 'root';
      $password = 'root';
      $name = 'events';
      $add_value = 0; // 0 ingen valgt | 1 arrangement | 2 aktivitet

   $skoleListe = Skole::all();
   $skoleAttributter = '';
   foreach($skoleListe as $skole)
   {
       $skoleAttributter.= '<option value="' .$skole['id'] . '">' . $skole['navn'] . '</option>';
   }

   ?>
   <div id="admin-top-info">
      <div class="admin-top-box">
         <h4>Antall arrengementer:</h4>
         <p class="blue">10</p>
      </div>
      <div class="admin-top-box offset">
         <h4>Antall aktiviteter:</h4>
         <p class="red">13</p>
      </div>
      <div class="admin-top-box offset">
         <h4>Antall linjer kode:</h4>
         <p class="orange">1000+</p>
      </div>
   </div>
   <?php
   if ($add_value == 0) {
      echo
      '<div id="admin-check">
           VELG TYPE:
           <form action="',$_SERVER['PHP_SELF'],'" method="post">
              <input type="submit" class="submit-first" name="arrangement" value="ARRANGEMENT"></input>
              <input type="submit" class="submit-first" name="aktivitet" value="AKTIVITET"></input>
           </form>
         </div>';
         if(isset($_POST['arrangement'])) {
            $add_value = 1;
         } else if (isset($_POST['aktivitet'])) {
            $add_value = 2;
         }
   }
   if ($add_value == 1) {
       echo '<div id="admin-container">
         <h3>LEGG TIL ARRANGEMENT</h3>
<form action="php/insert-event.php" method="post">
        <select id="school-dropdown" name="skole"><option hidden value="Velg skole">Velg skole</option>"' . $skoleAttributter . '" </select>
        <input type="text" name="Title" placeholder="Tittel" class="ico-title" required></input>
        <input type="text" name="description" placeholder="Beskrivelse" class="ico-title" required></input>
        <input type="text" name="pris" placeholder="Pris i NOK" class="ico-title" required></input>
        <input type="date" name="date" class="ico-title" required></input>
        <input type="text" name="img_url" placeholder="Bildelenke" class="ico-title" required></input>
        <input type="text" name="type" placeholder="Type arrangement" class="ico-title" required></input>
        <input type="submit" name="submit" value="LEGG TIL"></input>
     </form>
  </div>';

   }

  else if ($add_value == 2) {
      echo '<div id="admin-container">
         <h3>LEGG TIL AKTIVITET</h3>
         <form action="php/insert-event.php" method="post">
            <input type="text" name="Title" placeholder="Tittel" class="ico-title" required></input>
            <input type="text" name="pris" placeholder="Pris i NOK" class="ico-title" required></input>
            <input type="date" name="date" class="ico-title" required></input>
            <input type="text" name="img_url" placeholder="Bildelenke" class="ico-title" required></input>
            <input type="text" name="description" placeholder="Tekst" class="ico-title" required></input>
            <input type="submit" name="submit" value="LEGG TIL"></input>
         </form>
      </div>';
   }
   ?>

   <div id="row-parent">
      <div id="arrangement-parent">
      <div id="top-row">Arrangementer</div>
      <div id="display-rows">
   <div id="display-rows">
      <?php
         foreach ($events as $event) {?>
            <div class="admin-row">
               <div id="admin-id"><?= $event['id'] ?></div>
               <div id="admin-date"><?= $event['date']->diffForHumans() ?></div>
               <div id="admin-title"><?= $event['title'] ?></div>
               <a id="admin-edit" href="php/edit.php?id=<?= $event['id']?>"></a>
               <a id="admin-delete" href="php/delete.php?id=<?= $event['id']?>"></a>
            </div>
         <?php }?>
      </div>
   </div>
</div>

   <div id="aktiviteter-parent">
      <div id="top-row">Aktiviteter</div>
      <div id="display-rows">
      <?php
/*      $activity = Activity::all();

      foreach ($activity as $a) {?>
         <div class="admin-row">
            <div id="admin-id"></div>
            <div id="admin-date"></div>
            <div id="admin-title"></div>
            <a id="admin-edit" href="php/edit.php?id="></a>
            <a id="admin-delete" href="php/delete.php?id=""></a>
         </div>
      <?php }
*/
      ?>
   </div>
   </div>
   </div>
   </div>
   <?php include_once 'php/footer.php';?>
</body>
</html>

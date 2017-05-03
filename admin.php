<!doctype HTML>
<head>
   <meta name="viewport" content="initial-scale=1.0">
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="css/body.css">
   <link rel="stylesheet" type="text/css" href="css/admin.css">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body ontouchstart>

   <?php
    include 'php/local-query.php';
      include_once 'header.php';
      $add_value = 0; // 0 ingen valgt | 1 arrangement | 2 aktivitet
   ?>
   <?php
   if ($add_value == 0) {
      echo
      '<div id="admin-check">
           VELG TYPE:
           <form action="',$_SERVER['PHP_SELF'],'" method="post">
              <input type="submit" class="submit-first" name="arrangement" value="ARRANGEMENT"></input>
              <input type="submit" class="submit-first" name="aktivitet" value="AKTIVITET"></input>
           </form>
         </div>', $add_value;
         if(isset($_POST['arrangement'])) {
            $add_value = 1;
         } else if (isset($_POST['aktivitet'])) {
            $add_value = 2;
            echo $add_value;
         }
   }
   if ($add_value == 1) {
      echo '<div id="admin-container">
         <h3>LEGG TIL</h3>
         <form action="php/insert-event.php" method="post">
            <input type="text" name="Title" placeholder="hehe" class="ico-title" required></input>
            <input type="text" name="pris" placeholder="Pris i NOK" class="ico-title" required></input>
            <input type="date" name="date" class="ico-title" required></input>
            <input type="text" name="img_url" placeholder="Bildelenke" class="ico-title" required></input>
            <input type="text" name="description" placeholder="Tekst" class="ico-title" required></input>
            <input type="submit" name="submit" value="LEGG TIL"></input>
         </form>
      </div>';
   } else if ($add_value == 2) {
      echo '<div id="admin-container">
         <h3>LEGG TIL</h3>
         <form action="php/insert-event.php" method="post">
            <input type="text" name="Title" placeholder="hehe" class="ico-title" required></input>
            <input type="text" name="pris" placeholder="Pris i NOK" class="ico-title" required></input>
            <input type="date" name="date" class="ico-title" required></input>
            <input type="text" name="img_url" placeholder="Bildelenke" class="ico-title" required></input>
            <input type="text" name="description" placeholder="Tekst" class="ico-title" required></input>
            <input type="submit" name="submit" value="LEGG TIL"></input>
         </form>
      </div>';
   }
   ?>
   <div id="display-rows">
      <?php
      require './vendor/autoload.php';
      use Carbon\Carbon;
      Carbon::setLocale('no');

      $port = 3306;
      $username = 'root';
      $password = '';
      $name = 'events';
      
     
      $events = Event::all();

      foreach ($events as $event) {?>
         <div class="admin-row">
            <div id="admin-date"><?= $event['date']->diffForHumans() ?></div>
            <div id="admin-title"><?= $event['title'] ?></div>
            <a id="admin-edit" href="edit.php?id=<?= $event['id']?>"></a>
            <a id="admin-delete" href="delete.php?id=<?= $event['id']?>"></a>
         </div>
      <?php }?>
   </div>
   <?php include_once 'php/footer.php';?>
</body>
</html>

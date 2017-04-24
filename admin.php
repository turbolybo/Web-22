<!doctype HTML>
<head>
   <meta name="viewport" content="initial-scale=1.0">
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="css/body.css">
   <link rel="stylesheet" type="text/css" href="css/admin.css">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
<body ontouchstart>
   <?php include_once 'header.php';
   ?>
   <div id="admin-container">
      <h3>Nytt arrangement</h3>
      <form action="php/insert-event.php" method="post">
         <input type="text" name="Title" placeholder="hehe" class="ico-title" required></input>
         <input type="text" name="pris" placeholder="Pris i NOK" class="ico-title" required></input>
         <input type="date" name="date" class="ico-title" required></input>
         <input type="text" name="img_url" placeholder="Bildelenke" class="ico-title" required></input>
         <input type="text" name="description" placeholder="Tekst" class="ico-title" required></input>
         <input type="submit" name="submit"></input>
      </form>
   </div>
</body>
</html>

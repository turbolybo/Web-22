<!doctype HTML>
<head>
   <link rel="stylesheet" type="text/css" href="css/arrangement.css">
    <?php
    error_reporting( error_reporting() & ~E_NOTICE );

    // LOKAL VERSJON

    include 'php/local-query.php';

    // LIVE VERSJON
    /*
    include 'php/live-query.php';
    */
    ?>
<body ontouchstart>
<?php include_once 'php/header.php';
error_reporting( error_reporting() & ~E_NOTICE );

$skoleListe = Skole::all();
$skoleAttributter = '';
$eventAttributter = '';
$skoleIsSet = '';


if(isset($_GET['skoleId']))
{
    $skoleIsSet = $_GET['skoleId'];
}

$distinctEventType = Event::distinct()->select('type')->where('skole_id', '=', $skoleIsSet )->get();

foreach($skoleListe as $skole)
{
    $skoleAttributter.= '<option value="skole.php?skoleId=' . $skole['id'] . '">' . $skole['navn'] . '</option>';
}

foreach($distinctEventType as $event)
{
    $eventAttributter.= '<option value="skole.php?skoleId=' . $skoleIsSet . "&event=" . $event['type'] . '">' . $event['type'] . '</option>';
}

?>
<div id="container">
   <div id="dropdown">
      <select onchange="this.options[this.selectedIndex].value && (window.location= this.options[this.selectedIndex].value);">
          <option hidden value="">Velg arrangementstype</option>
          <option value="skole.php?skoleId=<?php echo $skoleIsSet?>">Alle typer arrangementer</option>
          <?= $eventAttributter; ?>
      </select>
   </div>
   <div id="container-all">
        <?php require 'php/EventCard.php'; ?>
   </div>
</div>
<?php include_once 'php/footer.php';?>

</body>

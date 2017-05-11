<!doctype HTML>
<head>
    <style>

        #events{

            float: left;
            line-height: 1px;
            text-align: center;
            opacity: 0;
            padding-top: 16px;
            padding-bottom: 40px;
            width: 50%;
            animation-name: eventsAnim;
            animation-duration: 4s;
            animation-fill-mode: forwards;
            position: relative;
            margin: auto;



        }

        #infotext1 {
            position: relative; bottom: 400px; left: 700px;
        }


        #infotext2 {
            position: relative; left: 735px; top: -55px;

        }

        #infotekstdiv {
            overflow: hidden;
        }


        #container {
            position: relative;
        }

        #eventz {
            position: relative;
        }


        #dropdown {
            position: absolute; left: 850px; top: 200px;
        }

        body::-webkit-scrollbar {
            width: 1em;
        }

        body::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        }

        body::-webkit-scrollbar-thumb {
            background-color: darkgrey;
            outline: 1px solid slategrey;
        }


        #dropdown {

        }

        @keyframes eventsAnim{
            from {opacity: 0;}
            to {opacity: 1;}
        }


    </style>
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
<?php

include_once 'php/header.php';



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

<br>
<br>
<br>

<div id="infotekstdiv">
<p id="infotext1">Her kan du se alle arrangementene for campusen du har valgt.</p>
<p id="infotext2">Bruk menyen under for å sortere etter arrangementstype.</p>
</div>

<select onchange="this.options[this.selectedIndex].value && (window.location= this.options[this.selectedIndex].value);" id="dropdown">
    <option hidden value="">Velg arrangementstype</option>
    <option value="skole.php?skoleId=<?php echo $skoleIsSet?>">Alle typer arrangementer</option>
    <?= $eventAttributter; ?>
</select>


<br>
<br>


<?php include_once 'php/header.php'; ?>
<div id="container">

    <div id="eventz">
        <?php require 'php/EventCard.php'; ?>
    </div>

</div>


</body>




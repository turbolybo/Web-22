

<?php


use Carbon\Carbon;
Carbon::setLocale(NO);

$events = Event::with('skoler')->orderBy('date')->get();
$skoleIsSet = $_GET['skoleId'];
$eventIsSet = $_GET['event'];


if($skoleIsSet && !$eventIsSet) {
    foreach($events as $event) {
        if($event['skole_id'] == $skoleIsSet) {
            $img = $event['img_url'];
            echo '<div id="events">';
            echo '<img src="' . $img . '" height="300" width="300"/>';
            echo '<h1>' . $event['title'] . '</h1>';
            echo '<p>Beskrivelse: ' . $event['description'] . '</p>';
            echo '<p>Pris: ' . $event['pris'] . '</p>';
            echo '<p>' . $event['date']->diffForHumans() . '</p>

            </div>';
            '<br>';
            '<br>';

        }
    }
} else {

    foreach ($events as $event) {
        if($event['type'] == $eventIsSet && $event['skole_id'] == $skoleIsSet) {
            $img = $event['img_url'];
            echo '<div id="events">';
            echo '<img src="' . $img . '" height="300" width="300"/>';
            echo '<h1>' . $event['title'] . '</h1>';
            echo '<p>Beskrivelse: ' . $event['description'] . '</p>';
            echo '<p>Pris: ' . $event['pris'] . '</p>';
            echo '<p>' . $event['date']->diffForHumans() . '</p>

            </div>';
            '<br>';
            '<br>';
        }
    }
}
?>

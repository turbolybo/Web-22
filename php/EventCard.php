

<?php


use Carbon\Carbon;
Carbon::setLocale(NO);

$events = Event::with('skoler')->orderBy('date')->get();
$skoleIsSet = $_GET['skoleId'];
$eventIsSet = $_GET['event'];

foreach($events as $a) {
    if($a['skole_id'] == $skoleIsSet && !$eventIsSet || ($a['type'] == $eventIsSet && $a['skole_id'] == $skoleIsSet)) {
        require 'php/activity-container-content.php';
    }
}
?>

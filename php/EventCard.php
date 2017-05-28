

<?php


use Carbon\Carbon;
Carbon::setLocale(NO);
require 'php/activity-container.php';

$events = Event::with('skoler')->orderBy('date')->get();
$skoleIsSet = $_GET['skoleId'];
$eventIsSet = $_GET['event'];
foreach($events as $event) {
    if($event['skole_id'] == $skoleIsSet && !$eventIsSet || ($event['type'] == $eventIsSet && $event['skole_id'] == $skoleIsSet)) {
        WriteActivity($event, false);
    }
}
?>

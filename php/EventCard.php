

<?php


use Carbon\Carbon;
Carbon::setLocale(NO);

$events = Event::with('skoler')->orderBy('date')->get();
$skoleIsSet = $_GET['skoleId'];
$eventIsSet = $_GET['event'];


if($skoleIsSet && !$eventIsSet) {
    foreach($events as $a) {
        if($a['skole_id'] == $skoleIsSet) {
           echo '<div class="each-item">';
           echo '<div class="item-upper" style="background-image: url(', $a['img_url'], '")>';
           echo '</div>';
           echo '<p>',$a['title'],'</p>';
           echo '<a href="arrangement.php?id=',$a['id'],'"><div class="visit">LES MER</div></a>';
           echo "</div>";
        }
    }
} else {

    foreach ($events as $a) {
        if($a['type'] == $eventIsSet && $a['skole_id'] == $skoleIsSet) {
           echo '<div class="each-item">';
           echo '<div class="item-upper" style="background-image: url(', $a['img_url'], '")>';
           echo '</div>';
           echo '<p>',$a['title'],'</p>';
           echo '<a href="arrangement.php?id=',$a['id'],'"><div class="visit">LES MER</div></a>';
           echo "</div>";
        }
    }
}
?>

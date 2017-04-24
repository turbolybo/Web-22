<?php
   foreach ($events as $event) {?>
   <div class="event-small" style="background-image: url('<?= $event['img_url'] ?>')">
        <div class="event-title event-title-small"><?= strtoupper($event['title']) ?></div>
        <div class="event-starts event-starts-small"><?= strtoupper($event['date']->diffForHumans()) ?></div>
        <div class="event-read event-read-small">LES MER</div>
   </div>
<?php } ?>

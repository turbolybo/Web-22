<?php
   foreach ($events as $event) { ?>
      <div class="event-left" style="background-image: url('<?= $event['img_url'] ?>')">
           <div class="event-title"><?= strtoupper($event['title']) ?></div>
           <div class="event-starts"><?= strtoupper($event['date']->diffForHumans()) ?></div>
           <div class="event-read">LES MER</div>
           <div class="event-read">HJEMMESIDE</div>
      </div>
   <?php break; } ?>

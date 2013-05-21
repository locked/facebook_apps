<?php foreach( $results as $r ): ?>
    <div class="c line" onclick="openWordDetails(this);" id="word_<?= $r->id; ?>">
    <div class="line_word">
      <?= $r->simple." ".$r->word; ?>
    </div>
    <div class="line_word">
      <?= $r->english; ?>
    </div>
    </div>
    <div class="cleared"></div>
<?php endforeach; ?>

<div class="cleared"></div>

<a href="javascript:hideResults()">hide</a>

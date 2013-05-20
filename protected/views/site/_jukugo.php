<?php foreach( $chars as $c ): ?>
    <div class="c line" onclick="openWordDetails(this);" id="word_<?= $c->id; ?>">
    <div class="line_word">
      <?= property_exists($c, "simple")?$c->simple:$c->word; ?>
    </div>
    <div class="line_word">
      <?= $c->english; ?>
    </div>
    </div>
    <div class="cleared"></div>
<?php endforeach; ?>

<div class="cleared"></div>

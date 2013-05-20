<span class="left">By strokes: </span>
<?php foreach( $strokes as $s ): ?>
     <div class="c leftstrokes" onclick="selectStrokes(<?= $s; ?>);"><?= $s; ?></div>
<?php endforeach; ?>
<div class="breaker"></div>

<?php foreach( $chars as $c ): ?>
    <div class="c square" onclick="openCharDetails(this,0);" id="char-<?= $c->id; ?>"><?php
    if( $lang=="zh" ) {
		 echo $c;
	} else {
		echo $c->char;
	}
	?></div>
<?php endforeach; ?>

<div class="cleared"></div>

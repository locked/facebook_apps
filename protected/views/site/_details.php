<span class="left">By strokes: </span>
<?php foreach( $strokes as $s ): ?>
     <div class="c leftstrokes" onclick="selectStrokes(<?= $s; ?>);"><?= $s; ?></div>
<?php endforeach; ?>
<div class="breaker"></div>

<?php foreach( $chars as $c ): ?>
    <div class="c square" onclick="openCharDetails(this,0);" id="char-<?= $c->id; ?>"><?php
    if( property_exists($c, "char") ) {
		echo $c->char;
	} else {
		echo strval("&#".strval(intval($c->unicode,16)).";");
	}
	?></div>
<?php endforeach; ?>

<div class="cleared"></div>

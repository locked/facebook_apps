<?php
/*
foreach( $radicals as $radical ) {
	echo $radical->key."-".$radical->strokes."";
	if( $radical->strokes==10 ) {
		echo "[";
		foreach( $radical->kanjis as $kanji ) {
			echo $kanji->char." / ";
		}
		echo "]";
	}
}
*/

?>
<h2>Click on a radical:</h2>
<div id="radicals">
	<?php foreach( $radicals_by_strokes as $strokes=>$radicals ): ?>
		<div class="stroke square"><?= $strokes; ?></div>
		<?php foreach( $radicals as $radical ): ?>
		    <div class="c square" id="radical_<?= $radical->id; ?>" onclick="openDetails(this);">
				<?= $radical->key; ?>
			</div>
		<?php endforeach; ?>
	<?php endforeach; ?>
	<div class="cleared"></div>
</div>

<div class="search">
	<form>
	<div class="left">English: </div><input type="text" class="left" id="english" onkeyup="lookUp(this);">
	</form>
	<div class="breaker"></div>
	<div id="dic_english" class="dic_results"> </div>
	<div class="breaker"></div>
</div>

<div class="search">
	<form>
	<div class="left">{% ifequal dic_lang "zh" %}Pinyin{% else %}Kana{% endifequal %}: </div><input class="left" type="text" id="phonetic" onkeyup="lookUp(this);">
	<div class="breaker"></div>
	</form>
	<div id="dic_phonetic" class="dic_results"> </div>
	<div class="breaker"></div>
</div>



<script type="text/javascript">
var base_url = "<?php echo Yii::app()->request->baseUrl; ?>/site";
var dic_lang = "ja";
var current_e;
var current_timer;
function lookUp( e ) {
	window.clearTimeout( current_timer );
	if( $("#loading") )
		$("#loading").remove();
	var word = e.value;
	var from = e.id;
		$("#dic_"+from).html( "" ).fadeOut();
	if( word.length<2 )
		return;
	ne = $(document.createElement("div")).html("<img class='left' src='/media/img/loading.gif'>").attr("id","loading");
	$(e).after(ne);
		current_e = e;
		current_timer = window.setTimeout( realLookUp, 1500 );
}
function realLookUp() {
	e = current_e;
	var from = e.id;
	var word = e.value;
	var url = base_url + "/from"+from+"/"+dic_lang+"/"+word;
	$.get( url, function(txt) {
	$("#loading").remove();
			$("#dic_"+from).html( txt ).fadeIn();
	} );
}


var current;
function openDetails( e ) {
	$(".matches").remove();
	if( current && current.hasClass("selected") ) current.removeClass("selected");
	var id = $(e).html();
	var s = "<div class='matches'>Searching matches for "+id+"...</div>";
	current = $(e).after( s ).addClass("selected");
	key = current.get(0).id.split("_")[1];
	reload( key, -1 );
}
var current_char;
function openCharDetails( e, level ) {
	if( $("#char_matches"+level) )
		$("#char_matches"+level).remove();
	if( current_char && level==0 ) current_char.removeClass("selected");
	var s = "<div class='char_matches' id='char_matches"+level+"'></div>";
	var id = $(e).html();
	var cc = $(e).after( s ).addClass("selected");
	$.get( base_url + "/char/"+dic_lang+"/"+id+"/"+level, function(txt) {
		$("#char_matches"+level).html( txt );
	} )
	if( level==0 )
		current_char = cc
}
var current_word;
function openWordDetails( e ) {
	if( $("#word_matches") )
		$("#word_matches").remove();
	if( current_word ) current_word.removeClass("selected");
	var s = "<div class='word_matches' id='word_matches'></div>";
	var id = $(e).get(0).id.split("_")[1];
	var cw = $(e).after( s ).addClass("selected");
	$.get( base_url + "/word/"+dic_lang+"/"+id, function(txt) {
		$("#word_matches").html( txt );
	} )
	current_word = cw
}
function hideResults() {
	$('.dic_results').html('').fadeOut();
}
function selectStrokes( strokes ) {
	var s = "<div class='matches'>Searching matches with "+strokes+" left strokes...</div>";
	$(".matches").html( s );
	key = current.get(0).id.split("_")[1];
	reload( key, strokes );
}
function reload( id, strokes ) {
	var url = base_url + "/fromradical/"+dic_lang+"/"+id+"/"+strokes;
	$.get( url, function(txt) {
		$(".matches").html( txt );
	} );
}
</script>

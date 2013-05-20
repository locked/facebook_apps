<div class="char"><?= property_exists($info, "simple")?$info->simple:$info->char; ?></div>
<div class="char_info">
<ul>
  <?php if( $traditional ): ?>
    <li>Traditional: <?= $traditional ; ?></li>
  <?php endif; ?>
  <li><?= property_exists($info, "pinyin")?$info->pinyin:$info->kana; ?></li>
  <li><?= $info->english; ?></li>
</ul>
</div>
<div class="cleared"></div>

<?php if( $jukugo ): ?>
<h2>Words with this character:</h2>
<div id="jukugo"></div>

<script type="text/javascript">
function openJukugo( id ) {
	var url = base_url + "/fromchar/<?= $lang; ?>/"+id;
	$.get( url, function(txt) {
		$("#jukugo").html( txt );
	} );
}
openJukugo( '<?= property_exists($info, "simple")?$info->simple:$info->char; ?>' );
</script>
<?php endif; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">

	<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" rel="stylesheet" type="text/css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<style>
body {
	padding-top: 60px;
}
</style>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.3.2.min.js"></script>
</head>

<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">JA/CN Dict</a>
          <div class="nav-collapse collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'JA Dict','url'=>array('site/index/ja')),
					array('label'=>'CN Dict','url'=>array('site/index/cn')),
					array('label'=>'Quiz','url'=>array('site/quiz')),
				),
				'htmlOptions'=>array('class'=>'nav'),
			)); ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	</div>
    
	<div class="container">
		<div id="content">
			<?php echo $content; ?>
		</div>
    </div>
    
	<!-- footer -->
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?>. All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div>

</div><!-- page -->

</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"></div>
		<div id="mainmenu">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Dict','url'=>array('site/dict'), 'itemOptions'=>array('class'=>'menu_dict')),
					array('label'=>'Quizz','url'=>array('site/quizz'), 'itemOptions'=>array('class'=>'menu_quizz')),
				),
			)); ?>
		</div><!-- mainmenu -->
	</div><!-- header -->

    <div id="content">
		<?php echo $content; ?>
    </div>
    
	<!-- footer -->
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?>. All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div>

</div><!-- page -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.3.2.min.js"></script>

</body>
</html>

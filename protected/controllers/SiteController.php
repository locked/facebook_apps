<?php

class SiteController extends Controller
{
	public $layout='main';

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
	/**
	 * This is the action to get to the index.
	 */
	public function actionIndex()
	{
		$radicals = JPRadical::model()->findAll();
		$radicals_by_strokes = array();
		foreach( $radicals as $radical ) {
			$radicals_by_strokes[$radical->strokes][] = $radical;
		}
        $this->render('index', array(
			"radicals_by_strokes"=>$radicals_by_strokes,
        ));
	}

	public function actionChar($lang, $char, $level)
	{
		switch( $lang ) {
		case "ja":
			$c = JPKanji::model()->findByAttributes(array("char"=>$char));
		break;
		}
		//echo $c->char;
		$jukugo = $level==0?true:false;
		$traditional = false;
		$title = "";
		$strokes = array();
        $this->renderPartial('_char', array(
			"title"=>$title,
			"lang"=>$lang,
			"jukugo"=>$jukugo,
			"strokes"=>$strokes,
			"info"=>$c,
			"traditional"=>$traditional,
        ));
	}

	public function actionFromChar($lang, $char)
	{
		$chars = Edict::model()->findAll(array(
			'condition'=>"word LIKE '%".$char."%'",
		));
		//echo $char;
        $this->renderPartial('_jukugo', array(
			"chars"=>$chars,
			"lang"=>$lang,
        ));
	}

	public function actionFromRadical($lang, $rid, $strokes=0)
	{
		//echo "OK:".$lang.",".$rid.",".$strokes;
		$strokes = array();
		$chars = array();
		switch( $lang ) {
		case "ja":
			$radical = JPRadical::model()->findByPk($rid);
			$chars = $radical->kanjis;
		break;
		}
        $this->renderPartial('_details', array(
			"strokes"=>$strokes,
			"chars"=>$chars,
			"lang"=>$lang,
        ));
	}
}

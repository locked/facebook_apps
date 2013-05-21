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
	public function actionIndex($lang="ja")
	{
		switch( $lang ) {
		case "ja":
			$radicals = JPRadical::model()->findAll();
		break;
		case "cn":
			$radicals = KXRadical::model()->findAll();
		break;
		}
		$radicals_by_strokes = array();
		foreach( $radicals as $radical ) {
			$radicals_by_strokes[$radical->strokes][] = $radical;
		}
        $this->render('index', array(
			"radicals_by_strokes"=>$radicals_by_strokes,
			"lang"=>$lang,
        ));
	}

	public function actionChar($lang, $char, $level)
	{
		switch( $lang ) {
		case "ja":
			$c = JPKanji::model()->findByAttributes(array("char"=>$char));
		break;
		case "cn":
			$c = CEDict::model()->findByAttributes(array("simple"=>$char));
			if( !is_object($c) ) $c = CEDict::model()->findByAttributes(array("word"=>$char));
			//print_r($c); echo property_exists($c, "simple")?"YES":"NO"; die();
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

	public function actionFromEnglish($lang, $char)
	{
		$criteria=new CDbCriteria;
		switch( $lang ) {
		case "ja":
			$criteria->compare('english',' '.$char.' ',true, 'OR');
			$criteria->compare('english',' '.$char,true, 'OR');
			$criteria->compare('english',$char.' ',true, 'OR');
			$criteria->compare('english',$char.',',true, 'OR');
			$results = Edict::model()->findAll($criteria);
		break;
		case "cn":
			$criteria->compare('english',' '.$char.' ',true, 'OR');
			$criteria->compare('english','/'.$char.' ',true, 'OR');
			$criteria->compare('english',' '.$char.'/',true, 'OR');
			$criteria->compare('english','('.$char.' ',true, 'OR');
			$criteria->compare('english',' '.$char.')',true, 'OR');
			$criteria->compare('english',' '.$char.',',true, 'OR');
			$criteria->compare('english',','.$char.' ',true, 'OR');
			$results = CEDict::model()->findAll($criteria);
		break;
		}
        $this->renderPartial('_results', array(
			"results"=>$results,
			"lang"=>$lang,
        ));
	}

	public function actionFromChar($lang, $char)
	{
		switch( $lang ) {
		case "ja":
			$criteria=new CDbCriteria;
			$criteria->compare('word',$char,true);
			$chars = Edict::model()->findAll($criteria);
		break;
		case "cn":
			$criteria=new CDbCriteria;
			$criteria->compare('word',$char,true);
			$criteria->compare('simple',$char,true);
			$chars = CEDict::model()->findAll($criteria);
		break;
		}
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
		case "cn":
			$chars = Unichin::model()->findAllByAttributes(array("radical"=>$rid));
			//print_r($chars);
		break;
		}
        $this->renderPartial('_details', array(
			"strokes"=>$strokes,
			"chars"=>$chars,
			"lang"=>$lang,
        ));
	}
}

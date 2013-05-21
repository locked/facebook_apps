<?php

/**
 * This is the model class for table "CEDict"
 */
class CEDict extends CActiveRecord
{
	public $simple;
	public $pinyin;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dict_cedict';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('id', 'required'),
			array('id', 'numerical'),
			array('word, simple', 'length', 'max'=>200),
			array('pinyin, pinyin_notones', 'length', 'max'=>100),
			array('english', 'length', 'max'=>1000),
			array('id, word, simple, pinyin, pinyin_notones, english', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'word' => 'word',
			'simple' => 'simple',
			'pinyin' => 'pinyin',
			'pinyin_notones' => 'pinyin_notones',
			'english' => 'english',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	
	public function __toString() {
		return strval( strval($this->id)." - ".$this->word );
	}
}

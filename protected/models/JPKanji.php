<?php

/**
 * This is the model class for table "JPKanji"
 */
class JPKanji extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dict_JPKanji';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('id', 'required'),
			array('id, strokes', 'numerical'),
			array('char', 'length', 'max'=>2),
			array('id, char, unicode, strokes, kana, english', 'safe', 'on'=>'search'),
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
			'char' => 'char',
			'unicode' => 'unicode',
			'strokes' => 'strokes',
			'kana' => 'kana',
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
		return strval( strval($this->id)." - ".$this->char );
	}
}

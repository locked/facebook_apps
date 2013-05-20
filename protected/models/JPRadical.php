<?php

/**
 * This is the model class for table "JPRadical"
 */
class JPRadical extends CActiveRecord
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
		return 'dict_JPRadical';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('id', 'required'),
			array('id, strokes', 'numerical'),
			array('key', 'length', 'max'=>20),
			array('id, key, strokes, info', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'kanjis' => array(self::MANY_MANY, 'JPKanji', 'dict_JPRadical_Kanji(jpradical_id, jpkanji_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'key' => 'key',
			'strokes' => 'strokes',
			'info' => 'info',
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
		return strval( strval($this->id)." - ".$this->key );
	}
}

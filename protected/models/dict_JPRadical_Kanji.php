<?php

/**
 * This is the model class for table "JPRadical_Kanji"
 */
class dict_JPRadical_Kanji extends CActiveRecord
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
		return 'dict_JPRadical_Kanji';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('id', 'required'),
			array('jpradical_id, jpkanji_id', 'numerical'),
			array('id, jpradical_id, jpkanji_id', 'safe', 'on'=>'search'),
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
			'jpradical_id' => 'jpradical_id',
			'jpkanji_id' => 'jpkanji_id',
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
		return strval( strval($this->jpradical_id)." - ".strval($this->jpkanji_id) );
	}
}

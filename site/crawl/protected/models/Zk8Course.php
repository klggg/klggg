<?php

/**
 * This is the model class for table "zk8_course".
 *
 * The followings are the available columns in table 'zk8_course':
 * @property integer $id
 * @property integer $course_id
 * @property string $course_name
 * @property integer $status
 * @property string $create_time
 * @property string $update_time
 * @property string $user
 * @property string $mark
 * @property string $course_code
 */
class Zk8Course extends CActiveRecord
{
	const STATUS_PENDDING = 0; //待处理
	const STATUS_DOING = 1; //正在处理
	const STATUS_DONE = 2; //已处理
	const STATUS_DELETED = 3; //已删除
   //定义select要用的字段映射
	public static $fieldListMap = array(

		'status'	 => array(
			self::STATUS_PENDDING => '待处理',
			self::STATUS_DOING => '正在处理',
			self::STATUS_DONE => '已处理',
			self::STATUS_DELETED => '已删除',
		)
	);
	
		
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'zk8_course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('course_code', 'required'),
			array('course_id, status', 'numerical', 'integerOnly'=>true),
			array('course_name', 'length', 'max'=>200),
			array('create_time, update_time', 'length', 'max'=>10),
			array('user', 'length', 'max'=>60),
			array('mark', 'length', 'max'=>100),
			array('course_code', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, course_id, course_name, status, create_time, update_time, user, mark, course_code', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
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
			'course_id' => 'Course',
			'course_name' => 'Course Name',
			'status' => 'Status',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'user' => 'User',
			'mark' => 'Mark',
			'course_code' => 'Course Code',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('course_id',$this->course_id);
		$criteria->compare('course_name',$this->course_name,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('user',$this->user,true);
		$criteria->compare('mark',$this->mark,true);
		$criteria->compare('course_code',$this->course_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Zk8Course the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

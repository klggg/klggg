<?php

/**
 * This is the model class for table "zk8_subject".
 *
 * The followings are the available columns in table 'zk8_subject':
 * @property integer $id
 * @property integer $course_id
 * @property integer $subject_id
 * @property string $question
 * @property string $answer
 * @property string $hint
 * @property integer $status
 * @property integer $category
 * @property string $create_time
 * @property string $update_time
 * @property string $user
 * @property string $from_url
 */
class Zk8Subject extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'zk8_subject';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question', 'required'),
			array('course_id, subject_id, status, category', 'numerical', 'integerOnly'=>true),
			array('question', 'length', 'max'=>1000),
			array('create_time, update_time', 'length', 'max'=>10),
			array('user', 'length', 'max'=>60),
			array('from_url', 'length', 'max'=>200),
			array('mark', 'length', 'max'=>50),
			array('answer, hint,resolve', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, course_id, subject_id, question, answer, hint, status, category, create_time, update_time, user, from_url,mark', 'safe', 'on'=>'search'),
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
			'subject_id' => 'Subject',
			'question' => 'Question',
			'answer' => 'Answer',
			'hint' => 'Hint',
			'resolve' => 'resolve',			
			'status' => 'Status',
			'category' => 'Category',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'user' => 'User',
			'from_url' => 'From Url',
			'mark' => 'mark',
			
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
		$criteria->compare('subject_id',$this->subject_id);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('hint',$this->hint,true);
		$criteria->compare('resolve',$this->resolve,true);		
		$criteria->compare('status',$this->status);
		$criteria->compare('category',$this->category);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('user',$this->user,true);
		$criteria->compare('from_url',$this->from_url,true);
		$criteria->compare('mark',$this->mark,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Zk8Subject the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function behaviors()
    {
          return array( 
            'CTimestampBehavior'=>array( 
                'class' => 'zii.behaviors.CTimestampBehavior', 
                'createAttribute' => 'create_time',
                'updateAttribute' => 'update_time', 
          ) 
        );
     }	
}

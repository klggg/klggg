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
		),
		'courses'	 => array(
			991 => '00147vip 人力资源管理（一）（2014年7/10月保过精华版）',
			992 => '00020 高等数学（一）微积分（2014年7/10月保过精华版）新版',
			1068 => '00341vip 公文写作与处理(2014年7/10月保过精华版)',
			1254 => '03350vip 社会研究方法(2014年7/10月保过精华版)',
			1282 => '00163vip 管理心理学(2014年7/10月保过精华版)',
			1311 => '00312vip 政治学概论(2014年7/10月保过精华版)',
			993 => '03706vip 思想道德修养与法律基础（2014年7/10月保过精华版)',
			998 => '03707vip 毛泽东思想、邓小平理论和“三个代表”重要思想概论（2014年7/10月保过精华版）',			
			1134 => '00037vip 美学(2014年7/10月保过精华版)	',			
			
			
		),		
	);
	
		
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
			array('course_id, subject_id, status, category,page_numb', 'numerical', 'integerOnly'=>true),
			array('question', 'length', 'max'=>1000),
			array('create_time, update_time', 'length', 'max'=>10),
			array('user', 'length', 'max'=>60),
			array('from_url,chapter', 'length', 'max'=>200),
			array('mark', 'length', 'max'=>50),
			array('answer, hint,resolve', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, course_id, subject_id,page_numb, question, answer, hint, status, category, create_time, update_time, user,chapter, from_url,mark', 'safe', 'on'=>'search'),
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
			'page_numb' => 'page_numb',
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
			'chapter' => 'chapter',
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
		$criteria->compare('page_numb',$this->page_numb);		
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
		$criteria->compare('chapter',$this->chapter,true);		
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
    
    
	public function setWebPath(&$record)
	{
		$search_str = "src='";
		$replace_str = "src='/zk8/{$record->course_id}/";
//		return  str_replace($search_str,$replace_str,$content);
		

		$record->question = str_replace($search_str,$replace_str,$record->question);
		$record->answer = str_replace($search_str,$replace_str,$record->answer);
		$record->resolve = str_replace($search_str,$replace_str,$record->resolve);
		$record->hint = str_replace($search_str,$replace_str,$record->hint);

		
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

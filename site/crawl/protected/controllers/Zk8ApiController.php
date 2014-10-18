<?php

class Zk8ApiController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/empty';

	public function apiResult($return_code,$return_message,$data){

		return json_encode(array(
			'return_code' => $return_code
			,'return_message' => $return_message
			,'data' => $data
			));
	}


	public function actionIndex()
	{	
		echo "hello";


	}

    /**
     * 取得课程列表
     * http://crawl.klggg.com/index.php?r=zk8Api/CourserList
     */
	public function actionCourserList()
	{	
		$fileds = array('id','course_id','course_name','create_time','course_code');

		$records = Zk8Course::model()->findAll(array(
		 'condition'=>'status = ? '
		 ,'params' => array(Zk8Course::STATUS_DONE)
		 ,'order' => 'id asc'
		  ,'select'=>$fileds
		 ));

		$errorId = 0;
		$errorMsg = '';

		$result_date  = array();
		if(!empty($records)){
			foreach ($records as  $record) {
				$result_date[] = $record->getAttributes($fileds);
			}
		
		}
		else
		{
			$errorId = -1;
			$errorMsg = 'empty';

		}
		echo $this->apiResult($errorId,$errorMsg,$result_date);

	}

    /**
     * 取指定课程，指定章节试题列表
     * http://crawl.klggg.com/index.php?r=zk8Api/SubjectChapter&course_id=993&page=1
     */
	public function actionSubjectChapter($course_id,$page)
	{	
		$fileds = array('id','course_id','subject_id','chapter','question');
		$records = Zk8Subject::model()->findAll(array(
		 'condition'=>'status = ? && course_id=? && page_numb=?'
		 ,'params' => array(Zk8Subject::STATUS_DONE,$course_id,$page)
		 ,'select'=>$fileds
		 ,'order' => 'id asc'
		 ));

		$errorId = 0;
		$errorMsg = '';

		$result_date  = array();
		if(!empty($records)){
			foreach ($records as  $record) {
				$result_date[] = $record->getAttributes($fileds);
			}
		
		}
		else
		{
			$errorId = -1;
			$errorMsg = 'empty';

		}
		echo $this->apiResult($errorId,$errorMsg,$result_date);
	}
    /**
     * 取指定试题详情
     * http://crawl.klggg.com/index.php?r=zk8Api/SubjectInfo&subject_id=322965
     */
	public function actionSubjectInfo($subject_id)
	{	
		$record = Zk8Subject::model()->find(array(
		 'condition'=>'status = ? && subject_id=? '
		 ,'params' => array(Zk8Subject::STATUS_DONE,$subject_id)
		 ));

		$errorId = 0;
		$errorMsg = '';

		$result_date  = array();
		$fileds = array('id','course_id','subject_id','chapter','question','answer','hint','resolve');
		if(!empty($record)){
				$result_date = $record->getAttributes($fileds);
		}
		else
		{
			$errorId = -1;
			$errorMsg = 'empty';

		}
		echo $this->apiResult($errorId,$errorMsg,$result_date);		
	}


    /**
     * 显示章节列表
     */
	public function actionChapterList($id)
	{
//		$model=$this->loadModel($id);
//		Zk8C
		
//		$model=Zk8Subject::model()->findByAttributes(Array('course_id'=>$id));
		
		$records = Zk8Subject::model()->findAll(array(
		 'condition'=>'status = ? and course_id= ?'
		 ,'params' => array(Zk8Subject::STATUS_DONE,$id)
		 ,'order' => 'subject_id asc'
		 ));
		 
		if(empty($records)){
			return false;
		}
		
		$model = $records[0];
		$courses = Zk8Subject::$fieldListMap['courses'];
		if(isset($courses[$model->course_id])){
			$this->pageTitle = $courses[$model->course_id];
		}


				
		$this->layout='//layouts/empty';
		$this->render('chapter_list',array(
			'model'=>$model,'records'=>$records
		));
	}





	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Zk8Subject the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Zk8Subject::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Zk8Subject $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='zk8-subject-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

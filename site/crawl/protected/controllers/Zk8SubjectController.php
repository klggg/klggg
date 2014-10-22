<?php

class Zk8SubjectController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','showHtml','ChapterList'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}


	public function actionShowHtml($id)
	{
		$this->layout='//layouts/empty';
		$this->render('show_html',array(
			'model'=>$this->loadModel($id),
		));
	}

    /**
     * 显示章节列表
     */
	public function actionChapterList($id)
	{
//		$model=$this->loadModel($id);
		
//		$model=Zk8Subject::model()->findByAttributes(Array('course_id'=>$id));
		
		$records = Zk8Subject::model()->findAll(array(
		 'condition'=>'status = ? and course_id= ?'
		 // 'condition'=>'status = ? and course_id= ? and (question like "%[识记]%" or question like "%[应用]%")'			
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Zk8Subject;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Zk8Subject']))
		{
			$model->attributes=$_POST['Zk8Subject'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Zk8Subject']))
		{
			$model->attributes=$_POST['Zk8Subject'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Zk8Subject');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Zk8Subject('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Zk8Subject']))
			$model->attributes=$_GET['Zk8Subject'];

		$this->render('admin',array(
			'model'=>$model,
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

<?php

class ActiveController extends Controller{
	
	public function actionPayactive(){
        $this->layout='empty';
		$this->render('payactive');
	}
}
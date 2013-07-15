<?php

class LoginAction extends CAction
{
	public function run()
	{
		$model=new LoginForm;

//		// if it is ajax validation request
//		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
//		{
//			echo CActiveForm::validate($model);
//			Yii::app()->end();
//		}
//

		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login())
				$this->controller->redirect(Yii::app()->user->returnUrl);
		}
		$this->controller->render('login',array('model'=>$model));

	}

}
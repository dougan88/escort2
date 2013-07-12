<?php

class UserController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'create' => 'application.controllers.user.CreateAction',
			'edit-list' => 'application.controllers.user.EditListAction',
			'edit' => 'application.controllers.user.EditAction',
			'list' => 'application.controllers.user.ListAction',
			'show' => 'application.controllers.user.ShowAction',
		);
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions' => array('edit'),
				'roles'   => array('customer', 'admin'),
			),
			array('allow',
				'actions' => array('create'),
				'users'   => array('?'),
			),
			array('deny',
				'actions' => array('create', 'edit-list', 'edit', 'delete'),
				'users' => array('*'),
			),
		);
	}

}
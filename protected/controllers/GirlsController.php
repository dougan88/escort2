<?php

class GirlsController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'create' => 'application.controllers.girls.CreateAction',
			'edit-list' => 'application.controllers.girls.EditListAction',
			'edit' => 'application.controllers.girls.EditAction',
			'savePhoto' => 'application.controllers.girls.SavePhotoAction',
			'list' => 'application.controllers.girls.ListAction',
			'show' => 'application.controllers.girls.ShowAction',
			'delete' => 'application.controllers.girls.DeleteGirlAction',
			'deletePhoto' => 'application.controllers.girls.DeletePhotoAction',
		);
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
				'actions' => array('create', 'edit-list', 'edit', 'delete'),
				'roles'   => array('customer', 'manager'),
			),
			array('deny',
				'actions' => array('create', 'edit-list', 'edit', 'delete'),
				'users' => array('*'),
			),
		);
	}
}
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
			'edit-list' => 'application.controllers.girls.IndexAction',
			'edit' => 'application.controllers.girls.EditAction',
			'list' => 'application.controllers.girls.ListAction',
			'show' => 'application.controllers.girls.ShowAction',
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
				'roles'   => array('customer', 'admin'),
			),
			array('deny',
				'actions' => array('create', 'edit-list', 'edit', 'delete'),
				'users' => array('*'),
			),
		);
	}
}
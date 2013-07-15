<?php

class AgencyController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'create' => 'application.controllers.agency.CreateAction',
			'edit-list' => 'application.controllers.agency.EditListAction',
			'edit' => 'application.controllers.agency.EditAction',
			'list' => 'application.controllers.agency.ListAction',
			'show' => 'application.controllers.agency.ShowAction',
			'delete' => 'application.controllers.agency.DeleteAgencyAction',
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
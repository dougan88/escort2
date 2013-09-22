<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'register' => 'application.controllers.site.RegisterAction',
			'logout'   => 'application.controllers.site.LogoutAction',
			'index'    => 'application.controllers.site.IndexAction',
			'login'    => 'application.controllers.site.LoginAction',
			'error'    => 'application.controllers.site.ErrorAction',
			'contact'  => 'application.controllers.site.ContactAction',
		);
	}

}
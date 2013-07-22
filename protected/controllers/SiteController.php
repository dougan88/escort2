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
//			// captcha action renders the CAPTCHA image displayed on the contact page
//			'captcha'=>array(
//				'class'=>'CCaptchaAction',
//				'backColor'=>0xFFFFFF,
//			),
//			// page action renders "static" pages stored under 'protected/views/site/pages'
//			// They can be accessed via: index.php?r=site/page&view=FileName
//			'page'=>array(
//				'class'=>'CViewAction',
//			),
		);
	}



}
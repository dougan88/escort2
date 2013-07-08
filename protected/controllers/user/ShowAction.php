<?php

class ShowAction extends CAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{
		$user = false;

        if(isset($_GET['id']))
        {
			$user = User::model()->findByPk($_GET['id']);
        }

        if(!$user)
        {
            Yii::app()->user->setFlash('cantFind','Cant find specified user.');
        }

        $this->controller->render('show', array('user' => $user));
	}

}
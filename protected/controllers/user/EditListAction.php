<?php

class EditListAction extends CAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{
        $user = User::model()->findAll();

        if(!$user)
        {
            Yii::app()->user->setFlash('noUsers','No users at the moment.');
        }

        $this->controller->render('editList', array('user' => $user));
	}

}
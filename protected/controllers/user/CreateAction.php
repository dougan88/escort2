<?php

class CreateAction extends CAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{
        $user = new User;

        if(isset($_POST['User']))
        {
			$user->attributes = $_POST['User'];
            if($user->validate())
            {
				$user->save();
                Yii::app()->user->setFlash('uCreated','User created successfully.');
				$this->controller->refresh();
            }
        }

        $this->controller->render('create', array('user' => $user));
	}

}
<?php

class RegisterAction extends CAction
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
				$user->u_password = crypt($user->u_password);
				$user->save();
                Yii::app()->user->setFlash('uCreated','You are successfully registered.');
				$this->controller->refresh();
            }
        }

        $this->controller->render('register', array('user' => $user));
	}

}
<?php

class EditAction extends CAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{
		$user = User::model()->findByPk(Yii::app()->user->id);

        if(!$user)
        {
            Yii::app()->user->setFlash('cantFind','Cant find specified user.');
        }elseif(isset($_POST['User']))
        {
			$user->attributes = $_POST['User'];
            if($user->validate())
            {

				$user->u_password = crypt($user->u_password, $user->u_password);
				$user->confirmPassword = crypt($user->confirmPassword, $user->u_password);
				$user->save();
                Yii::app()->user->setFlash('updated','Agency successfully updated.');
            }
        }

        $this->controller->render('edit', array('user' => $user));
	}

}
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

				$user->u_password = crypt($user->pass1);
				$user->save();
                Yii::app()->user->setFlash('updated','Agency successfully updated.');
            }
        }

        $this->controller->render('edit', array('user' => $user));
	}

}
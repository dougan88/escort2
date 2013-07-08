<?php

class EditAction extends CAction
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
        }elseif(isset($_POST['User']))
        {
			$user->attributes = $_POST['User'];
            if($user->validate())
            {
				$user->save();
                Yii::app()->user->setFlash('updated','Agency successfully updated.');
            }
        }

        $this->controller->render('edit', array('user' => $user));
	}

}
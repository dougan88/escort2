<?php

class EditAction extends CAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{
//        $girl = Girl::model()->findByPk();

        if(isset($_POST['Girl']))
        {
            $girl->attributes = $_POST['Girl'];
            if($girl->validate())
            {
                $girl->save();
                Yii::app()->user->setFlash('gCreated','Girl is created.');
				$this->controller->refresh();
            }
        }

        $this->controller->render('createGirl', array('girl' => $girl));
	}

}
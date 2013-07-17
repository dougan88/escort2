<?php

class CreateAction extends CAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{

        $agency = new Agency;

        if(isset($_POST['Agency']))
        {
            $agency->attributes = $_POST['Agency'];
            $agency->a_user = Yii::app()->user->id;
            if($agency->validate())
            {
				$agency->save();
                Yii::app()->user->setFlash('aCreated','Agency created successfully.');
				$this->controller->refresh();
            }
        }

        $this->controller->render('create', array('agency' => $agency));
	}

}
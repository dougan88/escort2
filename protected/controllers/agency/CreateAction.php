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
            if($agency->validate())
            {
				$agency->save();
                Yii::app()->user->setFlash('aCreated','Agency is created successfully.');
				$this->controller->refresh();
            }
        }

        $this->controller->render('create', array('agency' => $agency));
	}

}
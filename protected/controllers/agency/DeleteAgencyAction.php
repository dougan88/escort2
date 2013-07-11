<?php

class DeleteAgencyAction extends CAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{
		$agency = false;

        if(isset($_GET['id']))
        {
			$agency = Agency::model()->findByPk($_GET['id']);

        }

        if(!$agency)
        {
            Yii::app()->user->setFlash('cantFind','Cant find specified agency.');
        }elseif($agency->delete())
        {
        	Yii::app()->user->setFlash('deleted','Agency successfully updated.');
        }

        $this->controller->render('deleteAgency', array('agency' => $agency));
	}

}
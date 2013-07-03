<?php

class ShowAction extends CAction
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
        }

        $this->controller->render('show', array('agency' => $agency));
	}

}
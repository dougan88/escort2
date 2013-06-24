<?php

class EditListAction extends CAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{
        $agency = Agency::model()->findAll();

        if(!$agency)
        {
            Yii::app()->user->setFlash('noAgencies','No agencies at the moment.');
        }

        $this->controller->render('editList', array('agency' => $agency));
	}

}
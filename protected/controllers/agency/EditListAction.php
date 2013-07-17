<?php

class EditListAction extends CAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{
		$user = User::model()->with('agencies')->findByPk(Yii::app()->user->id);
		$agencies = $user->agencies;
        if(!$agencies)
        {
            Yii::app()->user->setFlash('noAgencies','No agencies at the moment.');
        }

        $this->controller->render('editList', array('agencies' => $agencies));
	}

}
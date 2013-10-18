<?php

class EditListAction extends CAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{
		$user = User::model()->with('girls')->findByPk(Yii::app()->user->id);
		$girls = $user->girls;

		if(!$girls)
		{
			Yii::app()->user->setFlash('noGirls','No girls at the moment.');
		}

		$this->controller->render('editList', array('girls' => $girls));
	}

}
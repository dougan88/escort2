<?php

class CreateAction extends CAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{
        $girl = new Girl;
        $this->controller->render('createGirl', array('girl' => $girl));
	}

}
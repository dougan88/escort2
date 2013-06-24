<?php

class ShowAction extends CAction
{
	/**
	 * Declares class-based actions.
	 */
	public function run()
	{
		$girl = false;

        if(isset($_GET['id']))
        {
            $girl = Girl::model()->findByPk($_GET['id']);
        }

        if(!$girl)
        {
            Yii::app()->user->setFlash('cantFind','Cant find specified girl.');
        }

        $this->controller->render('show', array('girl' => $girl));
	}

}
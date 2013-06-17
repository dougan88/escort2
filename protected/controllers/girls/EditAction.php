<?php

class EditAction extends CAction
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
//			$this->controller->render('edit', array('girl' => $girl));
        }elseif(isset($_POST['Girl']))
        {
            $girl->attributes = $_POST['Girl'];
            if($girl->validate())
            {
                $girl->save();
                Yii::app()->user->setFlash('updated','Girl successfully updated.');
//				$this->controller->refresh();
            }
        }

        $this->controller->render('edit', array('girl' => $girl));
	}

}
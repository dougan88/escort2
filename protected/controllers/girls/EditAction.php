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
			$user = User::model()->with('girls')->findByPk(Yii::app()->user->id);
			$girls = $user->girls;
			foreach($girls as $grl)
			{
				if($grl->g_id === $_GET['id'])
				{
					$girl = $grl;
				}
			}
        }

        if(!$girl)
        {
            Yii::app()->user->setFlash('cantFind','Cant find specified girl.');
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
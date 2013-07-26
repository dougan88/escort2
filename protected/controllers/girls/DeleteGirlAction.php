<?php

class DeleteGirlAction extends CAction
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
            Yii::app()->user->setFlash('cantFind','Can\'t delete specified girl.');
        }elseif($girl->delete())
        {
        	Yii::app()->user->setFlash('deleted',$girl->g_name . ' successfully deleted.');
        }

        $this->controller->render('delete', array('girl' => $girl));
	}

}
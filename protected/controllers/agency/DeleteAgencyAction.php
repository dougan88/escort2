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
			$user = User::model()->with('agencies')->findByPk(Yii::app()->user->id);
			$agencies = $user->agencies;
			foreach($agencies as $agen)
			{
				if($agen->a_id === $_GET['id'])
				{
					$agency = $agen;
				}
			}

        }

        if(!$agency)
        {
            Yii::app()->user->setFlash('cantFind','Can\'t delete specified agency.');
        }elseif($agency->delete())
        {
        	Yii::app()->user->setFlash('deleted',$agency->a_name . ' successfully deleted.');
        }

        $this->controller->render('delete', array('agency' => $agency));
}

}
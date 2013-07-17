<?php

class EditAction extends CAction
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
            Yii::app()->user->setFlash('cantFind','Cant find specified agency.');
        }elseif(isset($_POST['Agency']))
        {
			$agency->attributes = $_POST['Agency'];
            if($agency->validate())
            {
				$agency->save();
                Yii::app()->user->setFlash('updated','Agency successfully updated.');
            }
        }

        $this->controller->render('edit', array('agency' => $agency));
	}

}
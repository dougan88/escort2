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
        }
		elseif(isset($_POST['Girl']))
        {
            $girl->attributes = $_POST['Girl'];
			$girl->g_photo = CUploadedFile::getInstance($girl,'g_photo');
            if($girl->validate())
            {
                $girl->save();

				$imagePath = Yii::app()->params['imageFolder'] .
							uniqid(Yii::app()->user->id . rand(Yii::app()->params['randMin'], Yii::app()->params['randMax']) . '_', true) .
							'.' .
							$girl->g_photo->getExtensionName();

				$girl->g_photo->saveAs($imagePath);

//                Yii::app()->user->setFlash('updated','Girl successfully updated.');
//				$this->controller->refresh();
            }
        }
        $this->controller->render('edit', array('girl' => $girl));
	}

}
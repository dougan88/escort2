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
			$girl->g_photo = CUploadedFile::getInstances($girl,'g_photo');
            if($girl->validate())
            {
                $girl->save();


				if ($girl->g_photo)
				{
					foreach($girl->g_photo as $key => $file)
					{

						$imagePath = Yii::app()->params['imageFolder'] .
									uniqid(Yii::app()->user->id . rand(Yii::app()->params['randMin'], Yii::app()->params['randMax']) . $key . '_', true) .
									'.' .
									$file->getExtensionName();
						$file->saveAs($imagePath);
					}
				}
            }
        }
		elseif (isset($_GET['sent']))
		{
			Yii::app()->user->setFlash('cantFind','Something went wrong. Probably the images that you downloaded was too big. Please, try again.');
		}
        $this->controller->render('edit', array('girl' => $girl));
	}

}
<?php

class ContactAction extends CAction
{
	public function run()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				if(mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers))
				{
					Yii::app()->user->setFlash('contact','Problem with sending mail occured.');
				}
				{
					Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				}
				$this->controller->refresh();
			}
		}
		$this->controller->render('contact',array('model'=>$model));
	}

}


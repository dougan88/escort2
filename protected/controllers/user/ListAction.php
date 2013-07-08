<?php

class ListAction extends CAction
{
    /**
     * Declares class-based actions.
     */
    public function run()
    {
        $users = User::model()->findAll();

        if(!$users)
        {
            Yii::app()->user->setFlash('noUsers','No users at the moment.');
        }

        $this->controller->render('list', array('users' => $users));
    }

}
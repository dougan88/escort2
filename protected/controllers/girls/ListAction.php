<?php

class ListAction extends CAction
{
    /**
     * Declares class-based actions.
     */
    public function run()
    {
        $girls = Girl::model()->findAll();

        if(!$girls)
        {
            Yii::app()->user->setFlash('noGirls','No girls at the moment.');
        }

        $this->controller->render('list', array('girls' => $girls));
    }

}
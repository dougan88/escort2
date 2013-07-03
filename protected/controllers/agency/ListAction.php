<?php

class ListAction extends CAction
{
    /**
     * Declares class-based actions.
     */
    public function run()
    {
        $agencies = Agency::model()->findAll();

        if(!$agencies)
        {
            Yii::app()->user->setFlash('noAgencies','No agencies at the moment.');
        }

        $this->controller->render('list', array('agencies' => $agencies));
    }

}
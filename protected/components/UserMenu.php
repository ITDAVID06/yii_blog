<?php
Yii::import('zii.widgets.CPortlet');

class UserMenu extends CPortlet
{
    public function init()
    {
        $this->title = '<span class="text-gray-700">Hi Welcome,</span> ' .
            '<span class="text-green-600 font-bold">' .
            CHtml::encode(Yii::app()->user->name) . '</span>';
        parent::init();
    }

    protected function renderContent()
    {
        $this->render('userMenu');
    }
}

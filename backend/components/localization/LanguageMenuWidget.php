<?php


namespace backend\components\localization;


use common\models\Lang;
use Yii;
use yii\base\Widget;

class LanguageMenuWidget extends Widget
{

    public function init()
    {
    }

    /**
     * @return string
     */
    public function run()
    {
        $current = AdminLocalizator::getLanguage();
        return $this->render('lang-menu/view', [
            'current' => $current ? $current : 'ru',
            'langs' => Lang::getAllLangs(),
            'test'=>'test'
        ]);
    }
}
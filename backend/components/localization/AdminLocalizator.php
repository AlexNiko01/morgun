<?php

namespace backend\components\localization;


use Yii;

class AdminLocalizator
{
    /**
     *  Ajax set language to session by common\localization\LanguageMenuWidget
     */
    public static function setLanguage()
    {

        if (Yii::$app->request->isAjax && Yii::$app->request->post()) {
            $data = Yii::$app->request->post();
            $lang = $data['lang'];
            $session = Yii::$app->session;
            $session->set('language', $lang);
            if ($session->get('language') === $lang) {
                return true;
            }
        }

        return false;

    }

    /**
     * @return mixed|string
     */
    public static function getLanguage()
    {
        $session = Yii::$app->session;
        $lang = 'ru';
        if ($session->has('language')) {
            $lang = $session->get('language');
        }
        return $lang;
    }
}
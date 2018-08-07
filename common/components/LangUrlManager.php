<?php

namespace common\components;

use yii\web\UrlManager;
use common\models\Lang;

class LangUrlManager extends UrlManager
{
    /**
     * @param array|string $params
     * @return string
     */
    public function createUrl($params): string
    {
        \Yii::$app->cache->flush();
        if (isset($params['langId'])) {

            $lang = Lang::findOne($params['langId']);
            if ($lang === null) {
                $lang = Lang::getDefaultLang();
            }

            unset($params['langId']);
        } else {

            $lang = Lang::getCurrent();
        }
        if (isset($params['page']) && isset($params['per-page']) && $params[0] === 'post/index') {
            $params[0] = 'page/page';
        }

        $url = parent::createUrl($params);

//        if (Lang::getCurrent()->url === 'ru') {
//            return $url;
//        } else {
            return $url == '/' ? '/' . $lang->url : '/' . $lang->url . $url;
//        }

    }
}
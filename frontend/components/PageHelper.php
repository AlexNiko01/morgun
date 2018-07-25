<?php

namespace frontend\components;


use common\models\Page;
use yii\db\ActiveRecord;

class PageHelper
{
    private static $pages = [];

    /**
     * @param $mainSlug string
     * @return ActiveRecord|array|null
     */
    public static function page(string $mainSlug) {
        $page = Page::find()->where(['main_slug' => $mainSlug])->one();

        if (!$page) {
            return null;
        }

        self::$pages[] = $page;
        return $page;
    }

    /**
     * @param $mainSlug string
     * @return string
     */
    public static function pageSlug($mainSlug): string {
        $page = self::page($mainSlug);
        $pageTranslation = $page->pageTranslationFrontend;
        return $pageTranslation->slug;
    }
}
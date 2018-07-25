<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 12.06.18
 * Time: 14:58
 */

namespace frontend\controllers;


use yii\web\Controller;

class AppFrontendController extends Controller
{
    /**
     * @param null $title
     * @param null $keywords
     * @param null $description
     */
    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
    }

    /**
     * @param $model
     */
    protected function registerMetaTags($model)
    {
        if (!is_null($model->title) && $model->title) {
            $this->setMeta($model->title);
        }
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => !is_null($model->description) ? $model->description : ''
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => !is_null($model->keywords) ? $model->keywords : ''
        ]);
    }
}
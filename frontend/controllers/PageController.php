<?php

namespace frontend\controllers;

use common\models\Lang;
use common\models\PageTranslation;
use common\models\Post;
use common\models\Service;
use Yii;
use common\models\Page;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends AppFrontendController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionHome()
    {
        try {
            $home = $this->findModel('home');
        } catch (NotFoundHttpException $e) {
            echo $e->getMessage();
        }
        $this->registerMetaTags($home->pageTranslationFrontend);
        $lang = Lang::getCurrent()->url;
        return $this->render($lang . '/index', []);
    }

    public function actionContacts()
    {

        $this->setMeta('Контакты');
        try {
            $contacts = $this->findModel('contacts');
        } catch (NotFoundHttpException $e) {
            echo $e->getMessage();
        }
        $this->registerMetaTags($contacts->pageTranslationFrontend);
        $lang = Lang::getCurrent()->url;

        return $this->render($lang . '/contacts');

    }

    public function actionPage($action)
    {
        if ($action === 'contacts') {
            return $this->actionContacts();
        }

        $pageTranslation = PageTranslation::find()->where(['slug' => $action])->one();

        if (!$pageTranslation) {
            return $this->actionHome();
        }

        $page = $pageTranslation->page;
        switch ($page->main_slug) {
            case 'home':
                return $this->actionHome();
            case 'services':
                return $this->actionService();
            case 'news':
                return $this->actionNews();
            case 'contacts':
                return $this->actionContacts();
            default:
                break;
        }

        return $this->actionHome();
    }


    /**
     * @param $mainSlug
     * @return Page|null
     * @throws NotFoundHttpException
     */
    protected function findModel($mainSlug)
    {
        if (($model = Page::findOne(['main_slug' => $mainSlug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionAbout($slug)
    {
        $lang = Lang::getCurrent()->url;
        $pageTranslation = PageTranslation::find()->where(['slug' => $slug])->one();
        $mainSlug = $pageTranslation->page->main_slug;
        $this->registerMetaTags($pageTranslation);

        return $this->render($lang . '/' . $mainSlug);
    }

    public function actionNews()
    {
        try {
            $news = $this->findModel('news');
        } catch (NotFoundHttpException $e) {
        }
        $this->registerMetaTags($news->pageTranslationFrontend);
        return Yii::$app->runAction('post/index');
    }

    public function actionService()
    {
        try {
            $services = $this->findModel('services');
        } catch (NotFoundHttpException $e) {
        }
        $this->registerMetaTags($services->pageTranslationFrontend);
        return Yii::$app->runAction('service/index');
    }


    public function actionGate($parentSlug, $slug)
    {

        $pageTranslation = PageTranslation::find()->where(['slug' => $parentSlug])->one();

        if (!$pageTranslation) {
            return $this->actionHome();
        }

        $page = $pageTranslation->page;
        switch ($page->main_slug) {
            case 'services':
                return Yii::$app->runAction('service/view', ['slug' => $slug]);
                break;
            case 'about-us':
                return Yii::$app->runAction('page/about', ['slug' => $slug]);
                break;
        }
    }

}

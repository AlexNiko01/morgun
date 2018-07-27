<?php

namespace frontend\components;

use common\models\PageTranslation;
use common\models\Lang;
use common\models\Page;
use common\models\Service;
use \common\models\ServiceTranslation;
use frontend\controllers\PostController;
use Yii;
use yii\helpers\Url;

class MenuWidget extends \yii\base\Widget
{
    public $tpl;
    public $menuHtml;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    protected function getServicesTree()
    {

        $results = Service::find()->select(['id', 'parent_id'])->indexBy(['id'])->asArray()->all();
        $servicesTranslations = [];
        foreach ($results as $result) {
            $serviceTranslation = ServiceTranslation::find()
                ->select(['slug', 'name as title', 'service_id'])
                ->where(['service_id' => $result["id"], 'lang' => Lang::getCurrent()->url])
                ->asArray()->one();
            $serviceTranslation['parent_id'] = $result['parent_id'];
            $serviceTranslation['url'] = Url::to(
                [
                    'page/gate',
                    'slug' => $serviceTranslation['slug'],
                    'parentSlug' => PageHelper::pageSlug('services')
                ]
            );
            $serviceTranslation['active'] = ($serviceTranslation['slug'] === Yii::$app->controller->actionParams['slug']) ? $serviceTranslation['slug'] : '';
            $servicesTranslations[] = $serviceTranslation;
        }
        $tree = [];
        foreach ($servicesTranslations as $id => &$serviceTranslation) {
            if (!$serviceTranslation['parent_id']) {
                $tree[$serviceTranslation['service_id']] = &$serviceTranslation;
            } else {
                $tree[$serviceTranslation['parent_id']]['children'][$serviceTranslation['service_id']] = &$serviceTranslation;
            }
        }
        return $tree;
    }

    protected function getAboutsTree()
    {
        $id = Page::find()->where(['main_slug' => 'about-us'])->select('id')->one();
        $aboutsSample = Page::find()->where(['parent_id' => $id])->all();
        $abouts = [];
        foreach ($aboutsSample as $aboutSample) {
            $about = [];
            $aboutTranslation = PageTranslation::find()->where(['page_id' => $aboutSample->id, 'lang' => Lang::getCurrent()->url])->one();
            $about['title'] = $aboutTranslation->name;
            $about['url'] = Url::to(
                [
                    'page/gate',
                    'slug' => $aboutTranslation['slug'],
                    'parentSlug' => PageHelper::pageSlug('about-us')
                ]
            );
            $about['active'] = ($aboutTranslation['slug'] === Yii::$app->controller->actionParams['slug']) ? $aboutTranslation['slug'] : '';
            $abouts[] = $about;
        }
        return $abouts;
    }

    /**
     * @return string
     */
    public function run(): string
    {
        $active = '';
        $currentController = Yii::$app->controller;
        $action = $currentController->action->id;
//        var_dump($currentController->id, $action, $currentController->actionParams);
        switch ($action) {
            case 'home':
                $active = 'home';
                break;
            case'news':
                $active = 'blog';
                break;
            case 'index':
                $active = 'services';
                break;
            case 'view':
                $active = $currentController->id === 'service' ? 'services' : false;
                break;
            case 'about':
                $active = 'about-us';
                break;
            case  'page':
                $active = 'contacts';
                break;
        }

        $home = Page::find()->where(['main_slug' => 'home'])->one();
        $services = Page::find()->where(['main_slug' => 'services'])->one();
        $about = Page::find()->where(['main_slug' => 'about-us'])->one();
        $aboutFirm = Page::find()->where(['main_slug' => 'about-firm'])->one();
        $news = Page::find()->where(['main_slug' => 'news'])->one();
        $contacts = Page::find()->where(['main_slug' => 'contacts'])->one();

        $this->menuHtml = $this->getMenuHtml([
            [
                'url' => '/',
                'title' => $home->pageTranslationFrontend['name'],
                'active' => ($active === 'home') ? true : false
            ],
            [
                'url' => Url::to(['page/page', 'action' => $services->pageTranslationFrontend['slug']]),
                'title' => $services->pageTranslationFrontend['name'],
                'children' => $this->getServicesTree(),
                'active' => ($active === 'services') ? true : false
            ],
            [
                'url' => Url::to(['page/gate', 'parentSlug' => $about->pageTranslationFrontend['slug'], 'slug' => $aboutFirm->pageTranslationFrontend['slug']]),
                'title' => $about->pageTranslationFrontend['name'],
                'children' => $this->getAboutsTree(),
                'active' => ($active === 'about-us') ? true : false
            ],
            [
                'url' => Url::to(['page/page', 'action' => $news->pageTranslationFrontend['slug']]),
                'title' => $news->pageTranslationFrontend['name'],
                'active' => ($active === 'news') ? true : false

            ],
            [
                'url' => Url::to(['page/page', 'action' => $contacts->pageTranslationFrontend['slug']]),
                'title' => $contacts->pageTranslationFrontend['name'],
                'active' => ($active === 'contacts') ? true : false

            ],
        ]);
        return $this->menuHtml;
    }

    /**
     * @param array $routes
     * @return string
     */
    protected function getMenuHtml(array $routes): string
    {
        $str = '';
        foreach ($routes as $key => $route) {
            $str .= $this->menuToTemplate($route, $key);
        }
        return $str;
    }

    protected function menuToTemplate($route, $key)
    {
        return $this->render('menu/menu', [
            'route' => $route,
            'key' => $key
        ]);
    }
}
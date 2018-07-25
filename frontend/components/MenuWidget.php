<?php

namespace frontend\components;

use frontend\controllers\ServiceController;
use common\models\Lang;
use common\models\Page;
use common\models\Service;
use \common\models\ServiceTranslation;
use frontend\controllers\PageController;
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

    /**
     * @return string
     */
    public function run(): string
    {
        $active = '';
        $currentController = Yii::$app->controller;
        $class = get_class($currentController);
        switch ($class) {
            case PageController::class:
                $active = $currentController->action->id == 'home' ? 'home' : 'contacts';
                break;
            case PostController::class:
                $active = 'blog';
                break;
            case ServiceController::class:
                $active = 'services';
                break;

        }

        $home = Page::find()->where(['main_slug' => 'home'])->one();
        $services = Page::find()->where(['main_slug' => 'services'])->one();
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
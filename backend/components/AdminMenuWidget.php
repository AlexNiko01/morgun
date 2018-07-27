<?php

namespace backend\components;

use common\models\Page;
use Yii;
use yii\base\Widget;
use yii\helpers\Url;

class AdminMenuWidget extends Widget
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

    /**
     * @return array
     */
    private function getChildren()
    {
        $mainSlug = \yii::$app->getRequest()->getQueryParams()['mainSlug'];
        $id = Page::find()->select(['id'])->where(['main_slug' => 'about-us'])->one()->id;
        $abouts = [];
        $aboutsSample = Page::find()->where(['parent_id' => $id])->all();
        foreach ($aboutsSample as $key => $aboutSample) {
            $abouts[$key]['url'] = Url::to(['page/page', 'mainSlug' => $aboutSample->main_slug]);
            $abouts[$key]['title'] = $aboutSample->pageTranslationRu['name'];
            $abouts[$key]['active'] = ($aboutSample->main_slug === $mainSlug) ? true : false;
        }
        return $abouts;
    }

    public function run(): string
    {
        $active = '';
        $currentController = Yii::$app->controller;
        $class = get_class($currentController);
        $actionMethod = Yii::$app->controller->action->actionMethod;
        $mainSlug = \yii::$app->getRequest()->getQueryParams()['mainSlug'];

        if ($actionMethod == 'actionPage') {
            if ($mainSlug === 'contacts') {
                $active = 'contacts';
            } elseif ($mainSlug === 'home') {
                $active = 'home';
            } elseif ($mainSlug === 'about-us') {
                $active = 'about-us';
            } elseif ($mainSlug === 'news') {
                $active = 'news';
            } elseif ($mainSlug === 'publications') {
                $active = 'publications';
            } elseif ($mainSlug === 'services') {
                $active = 'services';
            }
        }
        $requestedRoute = $currentController->module->requestedRoute;
//        var_dump($requestedRoute);
//        die();
        switch ($requestedRoute) {
            case 'service/index':
                $active = 'services';
                break;
            case '':
                $active = 'home';
                break;
        }

        $abouts = $this->getChildren();
        $this->menuHtml = $this->getMenuHtml([
            [
                'url' => '/admin',
                'item' => '<i class="fa fa-home"></i>',
                'title' => 'Главная',
                'active' =>  $active === 'home' ? true : false
            ],
            [
                'url' => '/admin/service',
                'item' => '<i class="fa fa-eye"></i>',
                'title' => 'Услуги',
                'create_url' => 'service/create',
                'active' => $active === 'services' ? true : false
            ],
            [
                'url' => '/admin/post',
                'item' => '<i class="fa fa-newspaper-o"></i>',
                'title' => 'Статьи',
                'create_url' => 'post/create'
            ],
            [
                'url' => '#',
                'item' => '<i class="fa fa-wrench"></i>',
                'title' => 'Страници',
                'children' => [
                    [
                        'url' => Url::to(['page/page', 'mainSlug' => 'home']),
                        'title' => 'Главная',
                        'active' => ($active === 'home') ? true : false
                    ],
                    [
                        'url' => '#',
                        'title' => 'О нас',
                        'children' => $abouts,
                        'active' => ($active === 'about-us') ? true : false
                    ],
                    [
                        'url' => Url::to(['page/page', 'mainSlug' => 'news']),
                        'title' => 'Новости',
                        'active' => ($active === 'news') ? true : false
                    ],
                    [
                        'url' => Url::to(['page/page', 'mainSlug' => 'publications']),
                        'title' => 'Наши статьи',
                        'active' => ($active === 'publications') ? true : false
                    ],
                    [
                        'url' => Url::to(['page/page', 'mainSlug' => 'services']),
                        'title' => 'Сервисы',
                        'active' => ($active === 'services') ? true : false
                    ],
                    [
                        'url' => Url::to(['page/page', 'mainSlug' => 'contacts']),
                        'title' => 'Контакты',
                        'active' => ($active === 'contacts') ? true : false
                    ]
                ]
            ]
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
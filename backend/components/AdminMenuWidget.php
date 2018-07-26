<?php

namespace backend\components;

use common\models\Page;
use yii\base\Widget;
use yii\caching\FileCache;
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
            $abouts[$key]['active'] = $aboutSample->main_slug == $mainSlug ? true : false;
        }
        return $abouts;
    }

    public function run(): string
    {
        $mainSlug = \yii::$app->getRequest()->getQueryParams()['mainSlug'];
        $abouts = $this->getChildren();
        $this->menuHtml = $this->getMenuHtml([
            [
                'url' => '/admin',
                'item' => '<i class="fa fa-home"></i>',
                'title' => 'Главная',
                'active' => $mainSlug === 'home'
            ],
            [
                'url' => '/admin/service',
                'item' => '<i class="fa fa-eye"></i>',
                'title' => 'Услуги',
                'create_url' => 'service/create',
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
                        'title' => 'Главная'
                    ],
                    [
                        'url' => '#',
                        'title' => 'О нас',
                        'children' => $abouts
                    ],
                    [
                        'url' => Url::to(['page/page', 'mainSlug' => 'news']),
                        'title' => 'Новости'
                    ],
                    [
                        'url' => Url::to(['page/page', 'mainSlug' => 'publications']),
                        'title' => 'Наши статьи'
                    ],
                    [
                        'url' => Url::to(['page/page', 'mainSlug' => 'services']),
                        'title' => 'Сервисы'
                    ],
                    [
                        'url' => Url::to(['page/page', 'mainSlug' => 'contacts']),
                        'title' => 'Контакты'
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
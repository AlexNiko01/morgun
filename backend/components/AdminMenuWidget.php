<?php

namespace backend\components;

use yii\base\Widget;
use yii\caching\FileCache;

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
     * @return string
     */
    public function run(): string
    {
        $this->menuHtml = $this->getMenuHtml([
            [
                'url' => '/',
                'item' => '<i class="fa fa-home"></i>',
                'title' => 'Главная'
            ],
            [
                'url' => 'service/index',
                'item' => '<i class="fa fa-eye"></i>',
                'title' => 'Услуги',
                'create_url' => 'service/create',
            ],
            [
                'url' => 'post/index',
                'item' => '<i class="fa fa-newspaper-o"></i>',
                'title' => 'Статьи',
                'create_url' => 'post/create'
            ],
            [
                'url' => 'site/pages',
                'item' => '<i class="fa fa-wrench"></i>',
                'title' => 'Страници',
                'children' => [
                    [
                        'url' => 'page/home',
                        'title' => 'Главная'
                    ],
                    [
                        'url' => 'page/about-us',
                        'title' => 'О нас'
                    ],
                    [
                        'url' => 'page/news',
                        'title' => 'Новости'
                    ],
                    [
                        'url' => 'page/publications',
                        'title' => 'Наши статьи'
                    ],
                    [
                        'url' => 'page/services',
                        'title' => 'Сервисы'
                    ],
                    [
                        'url' => 'page/contacts',
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
        ob_start();
        include __DIR__ . '/admin_menu/' . $this->tpl;
        return ob_get_clean();
    }
}
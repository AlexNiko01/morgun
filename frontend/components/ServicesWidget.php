<?php

namespace frontend\components;


use common\models\Lang;
use common\models\Service;
use common\models\ServiceTranslation;
use yii\helpers\Url;

class ServicesWidget extends \yii\base\Widget
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
        $currentSlug = \yii::$app->getRequest()->getQueryParams()['slug'];
        $active = '';
        $results = Service::find()->select(['id', 'parent_id'])->indexBy(['id'])->asArray()->all();
        $servicesTranslations = [];
        foreach ($results as $result) {
            $serviceTranslation = ServiceTranslation::find()
                ->select(['slug', 'name as title', 'service_id'])
                ->where(['service_id' => $result['id'], 'lang' => Lang::getCurrent()->url])
                ->asArray()->one();
            $serviceTranslation['parent_id'] = $result['parent_id'];
            $serviceTranslation['url'] = Url::to(
                [
                    'page/gate',
                    'slug' => $serviceTranslation['slug'],
                    'parentSlug' => PageHelper::pageSlug('services')
                ]
            );
            if ($currentSlug == $serviceTranslation['slug']) {
                $serviceTranslation['active'] = true;
            } else {
                $serviceTranslation['active'] = false;
            }

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
        $services = $this->getServicesTree();
//        var_dump($services);
//        die();
        $this->menuHtml = $this->getMenuHtml($services);
        return $this->menuHtml;
    }

    /**
     * @param array $routes
     * @return string
     */
    protected function getMenuHtml(array $routes): string
    {
        $str = '<ul class="about_list_link">';
        foreach ($routes as $key => $route) {
            $str .= $this->menuToTemplate($route, $key);
        }
        return $str . '</ul><svg class="about_list_line" viewBox="0 0 3 500">
<path d="M 0 0 L 0 500"></path>
</svg>';
    }

    protected function menuToTemplate($route, $key)
    {
        return $this->render('services/menu', [
            'route' => $route,
            'key' => $key
        ]);
    }
}
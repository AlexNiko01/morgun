<?php


namespace frontend\components;


use common\models\Lang;
use common\models\Page;
use common\models\PageTranslation;
use Yii;
use yii\base\Widget;
use yii\helpers\Url;

class AboutWidget extends Widget
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
        $abouts = $this->getAboutsTree();
        $this->menuHtml = $this->getMenuHtml($abouts);
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
        return $str.'</ul><svg class="about_list_line" viewBox="0 0 3 500">
                        <path d="M 2 0 L 2 600"></path>
                    </svg>';
    }

    protected function menuToTemplate($route, $key)
    {
        return $this->render('abouts/menu', [
            'route' => $route,
            'key' => $key
        ]);
    }
}
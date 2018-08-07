<?php

namespace common\components;

use common\models\Page;
use common\models\PageTranslation;
use common\models\Post;
use common\models\PostsTranslations;
use common\models\Service;
use common\models\ServiceTranslation;
use frontend\controllers\PageController;
use frontend\controllers\PostController;
use frontend\controllers\ServiceController;
use yii\base\InvalidConfigException;
use yii\web\Request;
use common\models\Lang;

class LangRequest extends Request
{
    /**
     * @var
     */
    private $langUrl;

    /**
     * @return bool|string
     * @throws InvalidConfigException
     */
    public function getLangUrl()
    {
        if ($this->langUrl === null) {
            $this->langUrl = $this->getUrl();
            $this->langUrl = preg_replace("~\/(?!.*\/)~", '', $this->langUrl);
            $urlList = explode('/', $this->langUrl);
            $langUrl = isset($urlList[1]) ? $urlList[1] : null;
            Lang::setCurrent($langUrl);

            if ($langUrl !== null && $langUrl === Lang::getCurrent()->url &&
                strpos($this->langUrl, Lang::getCurrent()->url) === 1) {
                $this->langUrl = substr($this->langUrl, strlen(Lang::getCurrent()->url) + 1);
            }
        }

        return $this->langUrl;
    }

    /**
     * @return string
     * @throws InvalidConfigException
     */
    protected function resolvePathInfo()
    {
        $pathInfo = $this->getLangUrl();
        if (($pos = strpos($pathInfo, '?')) !== false) {
            $pathInfo = substr($pathInfo, 0, $pos);
        }
        $pathInfo = urldecode($pathInfo);


        if (!preg_match('%^(?:
            [\x09\x0A\x0D\x20-\x7E]              # ASCII
            | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
            | \xE0[\xA0-\xBF][\x80-\xBF]         # excluding overlongs
            | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
            | \xED[\x80-\x9F][\x80-\xBF]         # excluding surrogates
            | \xF0[\x90-\xBF][\x80-\xBF]{2}      # planes 1-3
            | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
            | \xF4[\x80-\x8F][\x80-\xBF]{2}      # plane 16
            )*$%xs', $pathInfo)
        ) {
            $pathInfo = utf8_encode($pathInfo);
        }

        $scriptUrl = $this->getScriptUrl();
        $baseUrl = $this->getBaseUrl();
        if (strpos($pathInfo, $scriptUrl) === 0) {
            $pathInfo = substr($pathInfo, strlen($scriptUrl));
        } elseif ($baseUrl === '' || strpos($pathInfo, $baseUrl) === 0) {
            $pathInfo = substr($pathInfo, strlen($baseUrl));
        } elseif (isset($_SERVER['PHP_SELF']) && strpos($_SERVER['PHP_SELF'], $scriptUrl) === 0) {
            $pathInfo = substr($_SERVER['PHP_SELF'], strlen($scriptUrl));
        } else {
            throw new InvalidConfigException('Unable to determine the path info of the current request.');
        }

        if (isset($pathInfo[0]) && $pathInfo[0] === '/') {
            $pathInfo = substr($pathInfo, 1);
        }

        return (string)$pathInfo;
    }

    /**
     * @param $lang
     * @param $url
     * @return string
     */
    public function buildLangUrl($lang, $url)
    {
        $controller = \Yii::$app->controller;
        if (is_null($controller)) return $lang . $url;
        $class = get_class($controller);
        switch ($class) {
            case PageController::class:
                $url = $this->proceedPage($lang, $url);
                break;
            case PostController::class:
                $url = $this->proceedPost($lang, $url);
                break;
            case ServiceController::class:
                $url = $this->proceedServices($lang, $url);
                break;
        }
        if ($lang === 'ru') {
            return $url;
        }
        return $lang . $url;
    }

    /**
     * @param string $lang
     * @param string $url
     * @return string
     */
    protected function proceedPage(string $lang, string $url): string
    {
        $slugAction = \Yii::$app->request->get('action') ?? \Yii::$app->request->get('parentSlug');
        $translationCur = PageTranslation::find()->where(['slug' => $slugAction])->one();


        if (!$translationCur) return $url;
        /**
         * @var Page $page
         */
        $page = $translationCur->page;
        $needleTranslation = $page->getPagesTranslations()->where(['lang' => $lang])->one();

        if ($translationCur->page->main_slug === 'about-us') {
            $urlArr = explode('/', $url);
            if (count($urlArr) == 3) {
                $childSlug = $urlArr[2];
                $translationChildCur = PageTranslation::find()->where(['slug' => $childSlug])->one();
                $childPage = $translationChildCur->page;
                $needleTranslationChild = $childPage->getPagesTranslations()->where(['lang' => $lang])->one();
                $url = str_replace($translationChildCur->slug, $needleTranslationChild->slug, $url);
                return str_replace($translationCur->slug, $needleTranslation->slug, $url);
            }
        }

        if (!$needleTranslation) return $url;

        return str_replace($translationCur->slug, $needleTranslation->slug, $url);
    }

    /**
     * @param string $lang
     * @param string $url
     * @return string
     */
    protected function proceedPost(string $lang, string $url): string
    {
        if (\Yii::$app->request->get('parentSlug') || \Yii::$app->request->get('action')) {
            $url = $this->proceedPage($lang, $url);
        }
        $slugAction = \Yii::$app->request->get('slug');
        $translationCur = PostsTranslations::find()->where(['slug' => $slugAction])->one();
        if (!$translationCur) return $url;
        /**
         * @var Post $post
         */
        $post = $translationCur->post;
        $needleTranslation = $post->getPostsTranslations()->where(['lang' => $lang])->one();
        if (!$needleTranslation) return $url;

        return str_replace($translationCur->slug, $needleTranslation->slug, $url);
    }

    /**
     * @param string $lang
     * @param string $url
     * @return string
     */
    protected function proceedServices(string $lang, string $url): string
    {
        if (\Yii::$app->request->get('parentSlug') || \Yii::$app->request->get('action')) {
            $url = $this->proceedPage($lang, $url);
        }
        $slugAction = \Yii::$app->request->get('slug');
        $translationCur = ServiceTranslation::find()->where(['slug' => $slugAction])->one();
        if (!$translationCur) return $url;
        /**
         * @var Service $service
         */
        $service = $translationCur->service;
        $needleTranslation = $service->getServicesTranslations()->where(['lang' => $lang])->one();
        if (!$needleTranslation) return $url;

        return str_replace($translationCur->slug, $needleTranslation->slug, $url);
    }
}
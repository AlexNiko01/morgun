<?php

namespace frontend\controllers;

use common\models\Lang;
use common\models\PostsTranslations;
use common\models\PostsTranslationsSearch;
use Yii;
use common\models\Post;
use common\models\PostSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends AppFrontendController
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

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostsTranslationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $postTranslation = new PostsTranslations();
        $postTranslationTags = $postTranslation->getAllTags();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'postTranslationTags' => $postTranslationTags
        ]);
    }


    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionSearch()
    {
        $searchModel = new PostsTranslationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $postTranslation = new PostsTranslations();
        $postTranslationTags = $postTranslation->getAllTags();
        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'postTranslationTags' => $postTranslationTags
        ]);
    }


    /**
     * @param $slug
     * @return string
     */
    public function actionView($slug)
    {

        $lang = Lang::getCurrent()->url;

        $postTranslation = new PostsTranslations();
        $postTranslation = $postTranslation->find()->where(['lang' => $lang, 'slug' => $slug])->one();

        $this->registerMetaTags($postTranslation);
        $searchModel = new PostsTranslationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $postTranslationTags = $postTranslation->getAllTags();
        return $this->render('view', [
            'postTranslation' => $postTranslation,
            'dataProvider' => $dataProvider,
            'postTranslationTags' => $postTranslationTags,
            'searchModel' => $searchModel,
        ]);
    }


    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

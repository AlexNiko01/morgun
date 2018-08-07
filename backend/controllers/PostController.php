<?php

namespace backend\controllers;

use backend\components\localization\AdminLocalizator;
use backend\components\uploader\ImgUploader;
use common\models\Lang;
use common\models\PostSearch;
use common\models\PostsTranslations;
use Yii;
use common\models\Post;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{

    public function actions()
    {
        return [
            'file' => 'yii\redactor\actions\FileUploadAction',
            'image' => 'yii\redactor\actions\ImageUploadAction',
            'image-json' => 'yii\redactor\actions\ImageManagerJsonAction',
            'file-json' => 'yii\redactor\actions\FileManagerJsonAction',
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['admin'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['admin'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['admin'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['admin'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['set-session-language'],
                        'roles' => ['admin'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['set-status'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
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
        $searchModel = new PostSearch();
        $post = new Post();
        $postTranslationRu = $post->getPostsTranslations()->where(['lang' => 'ru'])->one();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'postTranslationRu' => $postTranslationRu,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        $post = new Post();
        $postTranslation = new PostsTranslations();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($postTranslation->load(Yii::$app->request->post())) {
                $introId = null;
                $attachmentId = null;
                $thumbnailId = null;
                $intro = Yii::$app->request->post('intro');
                if ($introId['fileEncoded']
                    && $introId['fileName']
                    && $introId['alt']
                ) {
                    $introId = (new ImgUploader($intro))
                        ->saveUpload()
                        ->cropImage(1680)
                        ->getAttachment();
                    $postTranslation->intro_id = $introId;
                }
                $attachment = Yii::$app->request->post('attachment');
                if ($attachment['fileEncoded']
                    && $attachment['fileName']
                    && $attachment['alt']
                ) {
                    $attachmentId = (new ImgUploader($attachment))
                        ->saveUpload()
                        ->cropImage(1680)
                        ->getAttachment();
                    $postTranslation->attachment_id = $attachmentId;
                }
                $thumbnail = Yii::$app->request->post('thumbnail');
                if ($thumbnail['fileEncoded']
                    && $thumbnail['fileName']
                    && $thumbnail['alt']
                ) {
                    $thumbnailId = (new ImgUploader($thumbnail))
                        ->saveUpload()
                        ->cropImage(400)
                        ->getAttachment();
                    $postTranslation->thumbnail_id = $thumbnailId;
                }

                $userID = \Yii::$app->user->identity->getId();
                $post->user_id = $userID;

                if ($post->save()) {
                    $curLang = AdminLocalizator::getLanguage();
                    $postTranslation->lang = $curLang;
                    $postTranslation->post_id = $post->id;

                    if ($postTranslation->save()) {
                        $resultTranslation = $this->createTranslations($post, $attachmentId, $thumbnailId, $curLang);
                        if ($resultTranslation) {
                            $transaction->commit();
                            \Yii::$app->getSession()->setFlash('success', 'статья была успешно создана');
                            return $this->redirect(['update', 'id' => $post->id]);
                        }
                    } else {
                        \Yii::$app->getSession()->setFlash('error', 'Ошибка при создании');
                    }
                } else {
                    \Yii::$app->getSession()->setFlash('error', 'Ошибка при создании');
                }
            }
            $transaction->rollBack();
        } catch (\Exception $e) {
            $transaction->rollBack();
            \Yii::$app->getSession()->setFlash('error', 'Ошибка при создании');
        }

        return $this->render('create', [
            'post' => $post,
            'postTranslation' => $postTranslation,

        ]);
    }

    /**
     * @param Post $post
     * @param $attachmentId
     * @param $thumbnailId
     * @param $curLang
     * @return bool
     */
    protected function createTranslations(Post $post, $attachmentId, $thumbnailId, $curLang)
    {
        $langs = Lang::getAllLangs();
        $request = Yii::$app->request->post();
        $success = true;
        foreach ($langs as $lang) {
            if ($lang === $curLang) {
                continue;
            }
            $postTranslation = PostsTranslations::saveTranslation($request, $post, $lang, $attachmentId, $thumbnailId);
            if ($postTranslation->hasErrors()) {
                $success = false;
            }
        }
        return $success;
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     * @throws \yii\db\Exception
     */
    public function actionUpdate($id)
    {
        $post = $this->findModel($id);
        $request = Yii::$app->request->post();
        $lang = AdminLocalizator::getLanguage();
        $postTranslation = $post->getPostsTranslations()->where(['lang' => $lang])->one();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $postLoad = $post->load(Yii::$app->request->post());
            $postSave = false;
            if ($postLoad) {
                $postSave = $post->save();
            }

            if ($postSave) {
                $introId = null;
                $attachmentId = null;
                $thumbnailId = null;
                $attachmentId = null;
                $thumbnailId = null;


                $attachment = Yii::$app->request->post('attachment');
                if ($attachment['fileEncoded']
                    && $attachment['fileName']
                    && $attachment['alt']
                ) {
                    \Yii::debug('postSaving2');
                    $attachmentId = (new ImgUploader($attachment))
                        ->saveUpload()
                        ->cropImage(1680)
                        ->getAttachment();
                    $postTranslation->attachment_id = $attachmentId;
                }
                $thumbnail = Yii::$app->request->post('thumbnail');
                if ($thumbnail['fileEncoded']
                    && $thumbnail['fileName']
                    && $thumbnail['alt']
                ) {

                    $thumbnailId = (new ImgUploader($thumbnail))
                        ->saveUpload()
                        ->cropImage(400)
                        ->getAttachment();
                    $postTranslation->thumbnail_id = $thumbnailId;
                }
                if ($postTranslation->load($request) && $postTranslation->save()) {

                    $transaction->commit();
                    \Yii::$app->getSession()->setFlash('success', 'статья была успешно обновлена');
                    return $this->redirect(['update', 'id' => $post->id]);
                } else {

                    \Yii::$app->getSession()->setFlash('error', 'Ошибка при обновлении');
                }
                $transaction->rollBack();

            } else if ($post->hasErrors()) {

                \Yii::$app->getSession()->setFlash('error', 'Ошибка при обновлении');
            }
        } catch (\Exception $e) {

            \Yii::$app->getSession()->setFlash('error', 'Ошибка при обновлении');
            $transaction->rollBack();
        }

        return $this->render('update', [
            'post' => $post,
            'postTranslation' => $postTranslation
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete()
    {
        $response = [];
        $response['success'] = false;
        if (Yii::$app->request->isAjax && Yii::$app->request->post()) {
            $data = Yii::$app->request->post();
            if (isset($data['data'])) {
                $data = json_decode($data['data'], true);
            }
            $id = $data['id'];
            $response['success'] = $this->findModel($id)->delete();
        }
        return json_encode($response);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionSetStatus()
    {

        $response['success'] = false;
        if (Yii::$app->request->isAjax && Yii::$app->request->post()) {
            $data = Yii::$app->request->post();
            if (isset($data['data'])) {
                $data = json_decode($data['data'], true);
            }
            $id = $data['id'];

            $post = $this->findModel($id);
            $post->status = $post->status ? 0 : 1;

            $result = $post->save();
            $response['status'] = $post->status;
            if ($result) {
                $response['success'] = true;
            }

        }
        return json_encode($response);
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

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

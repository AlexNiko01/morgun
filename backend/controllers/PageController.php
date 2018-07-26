<?php

namespace backend\controllers;

use backend\components\localization\AdminLocalizator;
use backend\components\uploader\ImgUploader;
use common\models\PageTranslation;
use Yii;
use common\models\Page;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
{
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
                        'actions' => ['page'],
                        'roles' => ['admin'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,

            ],
        ];
    }

    /**
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     * @throws \yii\db\Exception
     */
//    public function actionHome()
//    {
//        /**
//         * @var $home Page
//         */
//        $home = $this->findModel('home')->one();
//        /**
//         * @var $homeTranslation PageTranslation
//         */
//        $homeTranslation = $home->getPagesTranslation($home->id);
//        $transaction = Yii::$app->db->beginTransaction();
//        try {
//
//            if ((Yii::$app->request->post())) {
//                if ($home->load(Yii::$app->request->post()) && $home->save()) {
//                    $settings = json_encode(Yii::$app->request->post('PageTranslation')['settings']);
//                    if ($homeTranslation->load(Yii::$app->request->post())) {
//                        $homeTranslation->settings = $settings;
//                        $homeTranslation->save();
//                        $transaction->commit();
//                        \Yii::$app->getSession()->setFlash('success', 'Страница была успешно обновлена');
//                        return $this->redirect(['home', [
//                            'home' => $home,
//                            'homeTranslation' => $homeTranslation
//                        ]]);
//                    }
//                }
//            }
//        } catch (\Exception $e) {
//            $transaction->rollBack();
//            \Yii::$app->getSession()->setFlash('error', 'Ошибка при создании');
//        }
//        return $this->render('home', [
//            'home' => $home,
//            'homeTranslation' => $homeTranslation
//        ]);
//    }
//
//    /**
//     * @return string|\yii\web\Response
//     * @throws NotFoundHttpException
//     * @throws \yii\db\Exception
//     */
//    public function actionContacts()
//    {
//        /**
//         * @var $contacts Page
//         */
//        $contacts = $this->findModel('contacts')->one();
//        /**
//         * @var $contactsTranslation PageTranslation
//         */
//        $contactsTranslation = $contacts->getPagesTranslation($contacts->id);
//        $transaction = Yii::$app->db->beginTransaction();
//        try {
//            if ((Yii::$app->request->post())) {
//                if ($contacts->load(Yii::$app->request->post()) && $contacts->save()) {
//                    $settings = json_encode(Yii::$app->request->post('PageTranslation')['settings']);
//                    if ($contactsTranslation->load(Yii::$app->request->post())) {
//                        $contactsTranslation->settings = $settings;
//                        $contactsTranslation->save();
//                        $transaction->commit();
//                        \Yii::$app->getSession()->setFlash('success', 'Страница была успешно обновлена');
//                        return $this->redirect(['contacts', [
//                            'contacts' => $contacts,
//                            'contactsTranslation' => $contactsTranslation
//                        ]]);
//                    }
//                }
//            }
//        } catch (\Exception $e) {
//            $transaction->rollBack();
//            \Yii::$app->getSession()->setFlash('error', 'Ошибка при редактировании');
//        }
//
//        return $this->render('contacts', [
//            'contacts' => $contacts,
//            'contactsTranslation' => $contactsTranslation
//        ]);
//    }
//
//    public function actionNews()
//    {
//        /**
//         * @var $News Page
//         */
//        try {
//            $news = $this->findModel('news')->one();
//        } catch (NotFoundHttpException $e) {
//            echo $e->getMessage();
//        }
//
//        /**
//         * @var $NewsTranslation PageTranslation
//         */
//        $newsTranslation = $news->getPagesTranslation($news->id);
////        var_dump($newsTranslation);
////        die();
//        $transaction = Yii::$app->db->beginTransaction();
//        try {
//            if ((Yii::$app->request->post())) {
//                if ($news->load(Yii::$app->request->post()) && $news->save()) {
//                    $newsTranslation->load(Yii::$app->request->post());
//                    $newsTranslation->save();
//                    $transaction->commit();
//                    \Yii::$app->getSession()->setFlash('success', 'Страница была успешно обновлена');
//                    return $this->redirect(['blog', [
//                        'blog' => $news,
//                        'blogTranslation' => $newsTranslation
//                    ]]);
//                }
//            }
//        } catch (\Exception $e) {
//            $transaction->rollBack();
//            \Yii::$app->getSession()->setFlash('error', 'Ошибка при редактировании');
//        }
//
//        return $this->render('blog', [
//            'blog' => $news,
//            'blogTranslation' => $newsTranslation
//        ]);
//    }
//
//    public function actionPublications()
//    {
//        /**
//         * @var $publications Page
//         */
//        try {
//            $publications = $this->findModel('publications')->one();
//        } catch (NotFoundHttpException $e) {
//            echo $e->getMessage();
//        }
//        /**
//         * @var $NewsTranslation PageTranslation
//         */
//        $publicationsTranslation = $publications->getPagesTranslation($publications->id);
//        $transaction = Yii::$app->db->beginTransaction();
//        try {
//            if ((Yii::$app->request->post())) {
//                if ($publications->load(Yii::$app->request->post()) && $publications->save()) {
//                    $publicationsTranslation->load(Yii::$app->request->post());
//                    $publicationsTranslation->save();
//                    $transaction->commit();
//                    \Yii::$app->getSession()->setFlash('success', 'Страница была успешно обновлена');
//                    return $this->redirect(['publications', [
//                        'publications' => $publications,
//                        'publicationsTranslation' => $publicationsTranslation
//                    ]]);
//                }
//            }
//        } catch (\Exception $e) {
//            $transaction->rollBack();
//            \Yii::$app->getSession()->setFlash('error', 'Ошибка при редактировании');
//        }
//
//        return $this->render('publications', [
//            'publications' => $publications,
//            'publicationsTranslation' => $publicationsTranslation
//        ]);
//    }
//
//    public function actionServices()
//    {
//        /**
//         * @var $services Page
//         */
//        try {
//            $services = $this->findModel('services')->one();
//        } catch (NotFoundHttpException $e) {
//            echo $e->getMessage();
//        }
//
//        /**
//         * @var $servicesTranslation PageTranslation
//         */
//        $servicesTranslation = $services->getPagesTranslation($services->id);
//        $transaction = Yii::$app->db->beginTransaction();
//
//        try {
//            if ((Yii::$app->request->post())) {
//                if ($services->load(Yii::$app->request->post()) && $services->save()) {
//                    $servicesTranslation->load(Yii::$app->request->post());
//                    $servicesTranslation->save();
//                    $transaction->commit();
//                    \Yii::$app->getSession()->setFlash('success', 'Страница была успешно обновлена');
//                    return $this->redirect(['services', [
//                        'services' => $services,
//                        'servicesTranslation' => $servicesTranslation
//                    ]]);
//                }
//            }
//        } catch (\Exception $e) {
//            $transaction->rollBack();
//            \Yii::$app->getSession()->setFlash('error', 'Ошибка при редактировании');
//        }
//
//        return $this->render('services', [
//            'services' => $services,
//            'servicesTranslation' => $servicesTranslation
//        ]);
//    }
    /**
     * @return array
     */
    private function getPages()
    {
        $samplePages = Page::find()->all();
        $pages = [];
        array_push($pages, null);
        foreach ($samplePages as $samplePage) {
            $pages[$samplePage->id] = $samplePage->main_slug;
        }
        return $pages;
    }

    public function actionPage($mainSlug)
    {
        $parents = $this->getPages();
        /**
         * @var $model Page
         */
        try {
            $model = $this->findModel($mainSlug)->one();
        } catch (NotFoundHttpException $e) {
            echo $e->getMessage();
        }
        /**
         * @var $modelTranslation PageTranslation
         */
        $modelTranslation = $model->getPagesTranslation($model->id);

        $transaction = Yii::$app->db->beginTransaction();

        try {
            if ((Yii::$app->request->post())) {
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    $modelTranslation->load(Yii::$app->request->post());
                    $modelTranslation->save();
                    $transaction->commit();
                    \Yii::$app->getSession()->setFlash('success', 'Страница была успешно обновлена');
                    return $this->redirect(['page/page', 'mainSlug' => $mainSlug], 302);
                }
            }
        } catch (\Exception $e) {
            $transaction->rollBack();
            \Yii::$app->getSession()->setFlash('error', 'Ошибка при редактировании');
        }

        return $this->render('page', [
            'model' => $model,
            'modelTranslation' => $modelTranslation,
            'parents' => $parents
        ]);
    }

    /**
     * @param $slug
     * @return \yii\db\ActiveQuery
     * @throws NotFoundHttpException
     */
    protected function findModel($main_slug)
    {
        if (($model = Page::find()->where(['main_slug' => $main_slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

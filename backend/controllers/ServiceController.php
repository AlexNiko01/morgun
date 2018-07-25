<?php

namespace backend\controllers;

use backend\components\localization\AdminLocalizator;
use backend\components\uploader\ImgUploader;
use common\models\Lang;
use common\models\ServiceTranslation;
use backend\components\traits\DeleteEntity;
use Yii;
use common\models\Service;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;


/**
 * ServiceController implements the CRUD actions for Service model.
 */
class ServiceController extends Controller
{
    use DeleteEntity;
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
                    ]
                ],

            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],

        ];
    }

    /**
     * Lists all Service models.
     * @return mixed
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => ServiceTranslation::find()->where(['lang' => 'ru']),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return string
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {

//        \Yii::$app->cache->flush();
        $service = new Service();
        $serviceTranslation = new ServiceTranslation();
//        var_dump($service,$serviceTranslation);
//        die();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if ($serviceTranslation->load(Yii::$app->request->post())) {
                if ($service->save()) {
                    $curLang = AdminLocalizator::getLanguage();
                    $serviceTranslation->lang = $curLang;
                    $serviceTranslation->service_id = $service->id;

                    if ($serviceTranslation->save()) {
                        $resultTranslation = $this->createTranslations($service, $curLang);
                        if ($resultTranslation) {
                            $transaction->commit();
                            \Yii::$app->getSession()->setFlash('success', 'Услуга была успешно создана',true);
                            return $this->redirect(['update', 'id' => $service->id]);
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
            'service' => $service,
            'serviceTranslation' => $serviceTranslation,

        ]);
    }

    protected function createTranslations(Service $service, $curLang)
    {
        $langs = Lang::getAllLangs();
        $request = Yii::$app->request->post();
        $success = true;
        foreach ($langs as $lang) {
            if ($lang === $curLang) {
                continue;
            }
            $serviceTranslation = ServiceTranslation::saveTranslation($request, $service, $lang);
            if ($serviceTranslation->hasErrors()) {
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
        $service = $this->findModel($id);
        $request = Yii::$app->request->post();
        $lang = AdminLocalizator::getLanguage();
        $serviceTranslation = $service->getServicesTranslations()->where(['lang' => $lang])->one();
        $transaction = Yii::$app->db->beginTransaction();

        try {
            if ($service->load(Yii::$app->request->post()) && $service->save()) {
                if ($serviceTranslation->load($request) && $serviceTranslation->save()) {
                    $transaction->commit();
                    \Yii::$app->getSession()->setFlash('success', 'Услуга была успешно обновлена');
                    return $this->redirect(['update', 'id' => $service->id]);
                }
                $transaction->rollBack();
                \Yii::$app->getSession()->setFlash('error', 'Ошибка при обновлении');

            }
        } catch (\Exception $e) {
            $transaction->rollBack();
            \Yii::$app->getSession()->setFlash('error', 'Ошибка при обновлении');
        }

        return $this->render('update', [
            'service' => $service,
            'serviceTranslation' => $serviceTranslation
        ]);
    }

    /**
     * Finds the Service model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Service the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Service::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


}

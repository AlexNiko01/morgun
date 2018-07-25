<?php

namespace frontend\controllers;

use common\models\Lang;
use common\models\ServiceTranslation;
use Yii;
use common\models\Service;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServiceController implements the CRUD actions for Service model.
 */
class ServiceController extends AppFrontendController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
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
        $servicesArr = Service::find()->all();
        $services = $this->sortServices($servicesArr);
        return $this->render('index', [
            'services' => $services,
        ]);
    }

    private function sortServices($servicesArr)
    {
        $services = [];
        foreach ($servicesArr as $service) {
            $order = $service->order;
            $name = $service->serviceTranslationFrontend->name;
            $excerpt = $service->serviceTranslationFrontend->excerpt;
            $thumbnailUrl = $service->serviceTranslationFrontend->thumbnail_url;
            $slug = $service->serviceTranslationFrontend->slug;
            if ($order != null && $order > 0) {
                $services[$order]['name'] = $name;
                $services[$order]['thumbnailUrl'] = $thumbnailUrl;
                $services[$order]['excerpt'] = $excerpt;
                $services[$order]['slug'] = $slug;
            } else {
                $serviceArr['name'] = $name;
                $serviceArr['thumbnailUrl'] = $thumbnailUrl;
                $serviceArr['excerpt'] = $excerpt;
                $serviceArr['slug'] = $slug;
                $services[] = $serviceArr;
            }
        }
        return $services;
    }

    /**
     * Displays a single Service model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($slug)
    {
        $this->registerMetaTags($this->findModel($slug));
        return $this->render('view', [
            'service' => $this->findModel($slug),
        ]);
    }




    /**
     * @param $slug
     * @return array|null|\yii\db\ActiveRecord
     * @throws NotFoundHttpException
     */
    protected function findModel($slug)
    {
        $lang = Lang::getCurrent()->url;
        if (($model = ServiceTranslation::find()->where(['lang' => $lang, 'slug' => $slug])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

<?php
namespace backend\components\traits;

use Yii;

trait DeleteEntity
{
    /**
     * @return string
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
}
<?php

namespace backend\components\uploader;

use backend\models\UploadForm;
use common\models\Attachment;
use yii\web\UploadedFile;

trait Uploader
{

    /**
     * @return string
     */
    private function uploadAttachment()
    {
        $model = new UploadForm();

        if (\Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if ($model->upload()) {
                // file is uploaded successfully
               $attachmentId =  $this->saveAttachment($model->imageFile);
               return $attachmentId;
            }
        }
        return false;
    }

    /**
     * @param $file
     * @return int
     */
    private function saveAttachment($file): int
    {

        $attachment = new Attachment();
        $attachment->path = 'frontend/web/uploads/' . $file->name;
        $attachment->url = 'uploads/' . $file->name;
        $attachment->alt = substr($file->name, 0, strpos($file->name, '.'));
        $attachment->save();
        return $attachment->id;

    }

}
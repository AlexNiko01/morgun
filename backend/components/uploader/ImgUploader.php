<?php

namespace backend\components\uploader;

use common\models\Attachment;

class ImgUploader
{
    private $fileEncoded;
    private $fileName;
    private $alt;
    private $path;
    private $url;
    private $attachment;

    public function __construct($postField)
    {
        if ($postField && $postField['fileEncoded']
            && $postField['fileName'] && $postField['alt']) {
            $this->fileEncoded = $postField['fileEncoded'];
            $this->fileName = $postField['fileName'];
            $this->alt = $postField['alt'];

            if(!file_exists(\Yii::$app->basePath . '/../frontend/web/uploads/')){
                mkdir(\Yii::$app->basePath . '/../frontend/web/uploads/', 0755, true);
            }
            $this->path = \Yii::$app->basePath . '/../frontend/web/uploads/' . $this->fileName;
            $this->url = '/uploads/' . $this->fileName;
        }

    }

    public function saveUpload()
    {
        if (!$this->fileName || !$this->fileEncoded || !$this->alt) {
            return false;
        }
        $attachment = new Attachment();
        $attachment->alt = $this->alt;
        $attachment->path = $this->path;
        $attachment->url = $this->url;
        if (!$this->convertFile()) {
            return false;
        }
        $attachment->save();
        $this->attachment = $attachment;
        return $this;
    }

    private function convertFile()
    {
        $imageParts = explode(";base64,", $this->fileEncoded);

        $imageBase64 = base64_decode($imageParts[1]);
        $file = $this->path;
        return file_put_contents($file, $imageBase64);
    }


    public function cropImage($width)
    {
        $image = new SimpleImage($this->path);
        if (!($image->getWidth() <= $width)) {
            $image->resizeToWidth($width);
        };

        $image->save($this->path);
        return $this;
    }

    public function getAttachment()
    {
        return $this->attachment->id;
    }

}
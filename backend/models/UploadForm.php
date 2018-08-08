<?php

namespace backend\models;

use backend\components\uploader\SimpleImage;
use common\models\Attachment;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;
    public $file;


    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * @param $desktopWidth
     * @param $mobileWidth
     * @param $file UploadedFile
     * @return bool|string
     */
    public function upload($desktopWidth, $mobileWidth, $file)
    {
        if ($this->validate()) {
            if (!file_exists(\Yii::$app->basePath . '/../frontend/web/uploads/mobile')) {
                mkdir(\Yii::$app->basePath . '/../frontend/web/uploads/mobile', 0755, true);
            }
            if (!file_exists(\Yii::$app->basePath . '/../frontend/web/uploads/desktop')) {
                mkdir(\Yii::$app->basePath . '/../frontend/web/uploads/desktop', 0755, true);
            }

            $file->saveAs('../../frontend/web/uploads/desktop/' . $file->baseName . '.' . $file->extension);
            $this->cropImage($desktopWidth, '../../frontend/web/uploads/desktop/' . $file->baseName . '.' . $file->extension);

            copy('../../frontend/web/uploads/desktop/' . $file->baseName . '.' . $file->extension, '../../frontend/web/uploads/mobile/' . $file->baseName . '.' . $file->extension);
            $this->cropImage($mobileWidth, '../../frontend/web/uploads/mobile/' . $file->baseName . '.' . $file->extension);

            $this->file = $file;
            return $this->file;

        } else {
            return false;
        }
    }

    /**
     * @param $width
     * @param $path
     * @return void
     */
    public function cropImage($width, $path)
    {
        $image = new SimpleImage($path);
        $image->resizeToWidth($width);
        $image->save($path);
    }

    /**
     * @param $alt
     * @param $name
     * @return int
     */
    public function saveUpload($alt, $name)
    {
        $attachment = new Attachment();
        $attachment->alt = $alt;
        $attachment->path = null;
        $attachment->url = '/uploads/' . $name . '.' . $this->file->extension;
        $attachment->save();

        return $attachment->id;
    }
}
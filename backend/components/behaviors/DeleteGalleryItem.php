<?php

namespace backend\components\behaviors;


use yii\base\Behavior;
use yii\db\ActiveRecord;

class DeleteGalleryItem extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_DELETE => 'deleteGalleryItem',
        ];
    }

    public function deleteGalleryItem($event)
    {

        if (isset($event->sender->galleryItems) && !empty($event->sender->galleryItems)) {
            $galleryItems = $event->sender->galleryItems;
            foreach ($galleryItems as $galleryItem) {
                $galleryItem->delete();
            }

        }

    }
}
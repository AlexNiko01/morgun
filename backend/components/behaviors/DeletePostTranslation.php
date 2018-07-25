<?php

namespace backend\components\behaviors;

use yii\db\ActiveRecord;
use yii\base\Behavior;

class DeletePostTranslation extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_DELETE => 'deletePostTranslation',
        ];
    }

    public function deletePostTranslation($event)
    {
        if (isset($event->sender->postsTranslations) && !empty($event->sender->postsTranslations)) {
            $postTranslations = $event->sender->postsTranslations;
            foreach ($postTranslations as $postTranslation) {
                $postTranslation->delete();
            }
        }
    }
}
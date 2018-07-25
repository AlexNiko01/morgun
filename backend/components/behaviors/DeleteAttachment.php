<?php

namespace backend\components\behaviors;

use yii\db\ActiveRecord;
use yii\base\Behavior;

class DeleteAttachment extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_DELETE => 'deleteAttachment',
        ];
    }

    public function deleteAttachment($event)
    {
        if (isset($event->sender->attachment) && !empty($event->sender->attachment)) {
            $event->sender->attachment->delete();
        }
        if (isset($event->sender->thumbnail) && !empty($event->sender->thumbnail)) {
            $event->sender->thumbnail->delete();
        }
    }
}
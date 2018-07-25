<?php

namespace backend\components\behaviors;

use yii\db\ActiveRecord;
use yii\base\Behavior;

class DeleteServiceTranslation extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_DELETE => 'deleteServiceTranslation',
        ];
    }

    public function deleteServiceTranslation($event)
    {
        if (isset($event->sender->servicesTranslations) && !empty($event->sender->servicesTranslations)) {
            $servicesTranslations = $event->sender->servicesTranslations;
            foreach ($servicesTranslations as $serviceTranslation) {
                $serviceTranslation->delete();
            }
        }
    }
}
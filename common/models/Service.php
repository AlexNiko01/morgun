<?php

namespace common\models;

use backend\components\behaviors\DeleteServiceTranslation;
use backend\components\localization\AdminLocalizator;
use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $updated_at
 * @property string $created_at
 * @property string $order
 *
 * @property ServiceTranslation[] $serviceTranslation
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
            'deleteServiceTranslation' => DeleteServiceTranslation::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'order'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'order' => 'Order'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicesTranslations()
    {
        return $this->hasMany(ServiceTranslation::class, ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceTranslationRu()
    {
        return $this->getServicesTranslations()->where(['lang' => 'ru']);
    }

    public function getServiceTranslation()
    {
        return $this->getServicesTranslations()->where(['lang' => AdminLocalizator::getLanguage()])->one();
    }

    public function getServiceTranslationFrontend()
    {

        return $this->getServicesTranslations()->where(['lang' => Lang::getCurrent()->url])->one();
    }

    /**
     * @return array|null|\yii\db\ActiveRecord
     */
    public function getSingleTranslationRu()
    {
        return $this->getServicesTranslations()->where(['lang' => 'ru'])->one();
    }


}

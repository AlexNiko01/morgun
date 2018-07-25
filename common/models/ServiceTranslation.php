<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "services_translations".
 *
 * @property int $id
 * @property int $service_id
 * @property string $attachment_url
 * @property string $thumbnail_url
 * @property string $name
 * @property string $slug
 * @property string $heading
 * @property string $content
 * @property string $quote
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $lang
 *
 * @property Service $service
 */
class ServiceTranslation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services_translations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'slug'], 'required'],
            [['service_id'], 'integer'],
            [['heading', 'content', 'excerpt', 'quote', 'description', 'keywords', 'attachment_url', 'thumbnail_url'], 'string'],
            [['name', 'slug', 'title', 'lang'], 'string', 'max' => 255],
            [['excerpt'], 'string', 'max' => 700],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::class, 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => 'Service ID',
            'attachment_url' => 'Attachment Url',
            'thumbnail_url' => 'Thumbnail Url',
            'name' => 'Name',
            'slug' => 'Slug',
            'heading' => 'Heading',
            'content' => 'Content',
            'quote' => 'Quote',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'lang' => 'Lang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::class, ['id' => 'service_id']);
    }

    public static function saveTranslation($request, Service $service, $lang = 'ru')
    {
        $serviceTranslation = new self();
        $serviceTranslation->load($request);
        $serviceTranslation->lang = $lang;
        $serviceTranslation->service_id = $service->id;
        $serviceTranslation->save();
        return $serviceTranslation;
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pages_translations".
 *
 * @property int $id
 * @property int $page_id
 * @property int $attachment_id
 * @property string $name
 * @property string $slug
 * @property string $settings
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $lang
 *
 * @property Page $page
 */
class PageTranslation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages_translations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'slug'], 'required'],
            [['page_id','attachment_id'], 'integer'],
            [['settings', 'description', 'keywords'], 'string'],
            [['name', 'slug', 'title', 'lang'], 'string', 'max' => 255],
            [['page_id'], 'exist', 'skipOnError' => true, 'targetClass' => Page::class, 'targetAttribute' => ['page_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'page_id' => Yii::t('app', 'Page ID'),
            'attachment_id' => Yii::t('app', 'Attachment ID'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'settings' => Yii::t('app', 'Settings'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'keywords' => Yii::t('app', 'Keywords'),
            'lang' => Yii::t('app', 'Lang'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPage()
    {
        return $this->hasOne(Page::class, ['id' => 'page_id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachment()
    {
        return $this->hasOne(Attachment::class, ['id' => 'attachment_id']);
    }
}

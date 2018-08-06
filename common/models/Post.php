<?php

namespace common\models;

use backend\components\behaviors\DeletePostTranslation;
use Yii;
use common\models\Lang;
use common\models\PostsTranslations;
use yii\db\Expression;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property int $user_id
 * @property int $updated_at
 * @property int $created_at
 * @property int $status
 * @property int $post_type
 *
 */
class Post extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
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
            'deletePostTranslation' => DeletePostTranslation::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['user_id', 'status'], 'integer'],
            [['post_type'], 'string'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostsTranslations()
    {
        return $this->hasMany(PostsTranslations::class, ['post_id' => 'id']);
    }

    /**
     * @return array|null|\yii\db\ActiveRecord
     */
    public function getPostTranslationFrontend()
    {
        return $this->getPostsTranslations()->where(['lang' => Lang::getCurrent()->url])->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostsTranslationRu()
    {
        return $this->getPostsTranslations()->where(['lang' => 'ru']);
    }

    /**
     * @return array|null|\yii\db\ActiveRecord
     */
    public function getRuTranslation()
    {
        return $this->getPostsTranslations()->where(['lang' => 'ru'])->one();
    }

    /**
     * @return array|null|\yii\db\ActiveRecord
     */
    public function getAuthor()
    {
        return $this->getUser()->one();
    }
}

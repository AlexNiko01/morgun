<?php

namespace common\models;

use backend\components\behaviors\DeleteAttachment;
use backend\components\behaviors\DeletePostTranslation;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "posts_translations".
 *
 * @property int $id
 * @property int $post_id
 * @property int $intro_id
 * @property int $attachment_id
 * @property int $thumbnail_id
 * @property string $name
 * @property string $slug
 * @property string $content
 * @property string $excerpt
 * @property string $tag
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $lang
 *
 * @property Post $post
 * @property Attachment $attachment
 */
class PostsTranslations extends ActiveRecord
{
    public function behaviors()
    {
        return [
            'deleteAttachment' => DeleteAttachment::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts_translations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id', 'slug', 'name'], 'required'],
            [['attachment_id', 'intro_id', 'post_id'], 'integer'],
            [['slug'], 'string', 'max' => 255],
            [['content', 'description', 'keywords', 'tag'], 'string'],
            [['name', 'excerpt', 'title', 'lang'], 'string', 'max' => 700],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::class, 'targetAttribute' => ['post_id' => 'id']],
            [['attachment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attachment::class, 'targetAttribute' => ['attachment_id' => 'id']],
            [['thumbnail_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attachment::class, 'targetAttribute' => ['thumbnail_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'attachment_id' => 'Attachment ID',
            'thumbnail_id' => 'Thumbnail ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'content' => 'Content',
            'excerpt' => 'Excerpt',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'lang' => 'Lang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachment()
    {
        return $this->hasOne(Attachment::class, ['id' => 'attachment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThumbnail()
    {
        return $this->hasOne(Attachment::class, ['id' => 'thumbnail_id']);
    }

    public static function saveTranslation($request, Post $post, $lang = 'ru', $introId, $attachmentId, $thumbnailId)
    {
        $postTranslation = new self();
        $postTranslation->load($request);
        $postTranslation->lang = $lang;
        $postTranslation->post_id = $post->id;
        $postTranslation->intro_id = $introId;
        $postTranslation->attachment_id = $attachmentId;
        $postTranslation->thumbnail_id = $thumbnailId;
        $postTranslation->save();
        return $postTranslation;
    }

    public function getAllTags()
    {
        $lang = Lang::getCurrent()->url;
        $tagsObj = self::find()->select('tag')->where(['lang' => $lang])->all();
        $tagsArr = [];
        foreach ($tagsObj as $obj) {
            $tags = explode(',', $obj->tag);
            foreach ($tags as $tag) {
                $tagsArr[] = $tag;
            }
        }
        return array_unique($tagsArr);
    }
}

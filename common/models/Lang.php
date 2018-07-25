<?php

namespace common\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * This is the model class for table "lang".
 *
 * @property int $id
 * @property string $url
 * @property string $local
 * @property string $name
 * @property int $default
 * @property string $date_update
 * @property string $date_create
 */
class Lang extends ActiveRecord
{
    /**
     * @var null Variable, to store the current language object
     */
    static $current = null;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lang';
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
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create', 'date_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_update'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['default'], 'integer'],
            [['url', 'local', 'name', 'date_update', 'date_create'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'local' => 'Local',
            'name' => 'Name',
            'default' => 'Default',
            'date_update' => 'Date Update',
            'date_create' => 'Date Create',
        ];
    }


    /**
     * @return array|null|\yii\db\ActiveRecord
     * Getting the current language object
     */
    static function getCurrent()
    {
        if (self::$current === null) {
            self::$current = self::getDefaultLang();
        }
        return self::$current;
    }

    /**
     * @param null $url
     * Set the current language object and user locale
     */
    static function setCurrent($url = null)
    {
        $language = self::getLangByUrl($url);
        self::$current = ($language === null) ? self::getDefaultLang() : $language;
        Yii::$app->language = self::$current->local;
    }

    /**
     * @return array|null|\yii\db\ActiveRecord
     * Get the default language object
     */
    static function getDefaultLang()
    {
        return Lang::find()->where('`default` = :default', [':default' => 1])->one();
    }

    /**
     * @param null $url
     * @return array|null|\yii\db\ActiveRecord
     * Obtaining a language object by letter identifier
     */
    static function getLangByUrl($url = null)
    {
        if ($url === null) {
            return null;
        } else {
            $language = Lang::find()->where('url = :url', [':url' => $url])->one();
            if ($language === null) {
                return null;
            } else {
                return $language;
            }
        }
    }

    /**
     * @return array
     */
    static function getAllLangs()
    {
       $langsModels =  self::findBySql("SELECT url FROM `lang`")->all();
       $langs = [];
       foreach ($langsModels as $langsModel){
           $langs[]=$langsModel->url;
       }
       return $langs;
    }

}

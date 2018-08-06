<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Post;

/**
 * PostSearch represents the model behind the search form of `common\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'status'], 'integer'],
            [['updated_at', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Post::find();
        if (!empty($params['range'])) {
            $range = isset($params['range']) ? $params['range'] : '';
            $rangeArr = explode('—', $range);
            $from = date('Y-m-d h:i:s', strtotime($rangeArr[0]));
            $to = date('Y-m-d h:i:s', strtotime($rangeArr[1]));

            if (!empty($params['range'])) {
                $query->where(['>', 'updated_at', $from])->
                andWhere(['<', 'updated_at', $to]);
            }
        }

        $query->joinWith('postsTranslations', true, 'RIGHT JOIN');
        $query->andWhere(['lang' => 'ru']);
        if (!empty($params['search'])) {
            $query->andWhere(['like', 'posts_translations.name', $params['search']]);
        }
        $query->indexBy('id');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => isset($params['per-page']) ? (int)$params['per-page'] : 4

            ]
        ]);


        return $dataProvider;
    }
}

<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "categories_blog".
 *
 * @property integer $id
 * @property string $title
 * @property integer $is_work
 * @property integer $order
 * @property integer $created_at
 */
class CategoryBlog extends ActiveRecord
{
    const GRID_SIZE = 20;

    const SCENARIO_UPDATE = "SCENARIO_UPDATE";
    const SCENARIO_FILTER = "SCENARIO_FILTER";

    public static function tableName()
    {
        return 'categories_blog';
    }

    public function rules()
    {
        return [
            [['id',
                'title',
                'is_work',
                'order',
                'created_at'], 'safe'],

            /* SCENARIO_FILTER */
            [['title', 'created_at'], 'safe', 'on' => self::SCENARIO_FILTER],

            /* SCENARIO_UPDATE */
            [['title', 'created_at'], 'safe', 'on' => self::SCENARIO_UPDATE],
            [['title', 'order'], 'required', 'on' => self::SCENARIO_UPDATE],
            [['order'], 'integer', 'on' => self::SCENARIO_UPDATE],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ]
            ]
        ];
    }

    public function search($params)
    {
        return new ActiveDataProvider([
            'query' => $this->getQuery($params),
            'sort' => [
                'defaultOrder' => [
                    'order' => SORT_ASC,
                ]
            ],
            'pagination' => [
                'pageSize' => self::GRID_SIZE
            ],
        ]);
    }

    public function getQuery($params)
    {
        /** @var CategoryBlog $class */
        $class = get_class();
        $query = $class::find();

        $this->load($params);

        if ($this->is_work === null) {
            $this->is_work = 0;
        }

        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->andFilterWhere(['like', 'is_work', $this->is_work]);

        if ($this->created_at) {
            $query->andFilterWhere(['>=', 'created_at', strtotime($this->created_at . ' 00:00:00')]);
            $query->andFilterWhere(['<', 'created_at', strtotime($this->created_at . ' 23:59:59')]);
        }

        return $query;
    }
}

<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "sentences".
 *
 * @property integer $id
 * @property integer $translations_data_id
 * @property string $eng
 * @property string $ru
 * @property integer $paragraph
 * @property integer $order
 * @property integer $updated_at
 * @property integer $created_at
 */
class Sentence extends ActiveRecord
{
    const GRID_SIZE = 20;

    const SCENARIO_FILTER = "SCENARIO_FILTER";
    const SCENARIO_UPDATE = "SCENARIO_UPDATE";

    public static function tableName()
    {
        return 'sentences';
    }

    public function rules()
    {
        return [
            [['id',
                'translations_data_id',
                'eng',
                'ru',
                'paragraph',
                'order',
                'updated_at',
                'created_at'], 'safe'],

            /* SCENARIO_FILTER */
            [['created_at'], 'safe', 'on' => self::SCENARIO_FILTER],

            /* SCENARIO_UPDATE */
            [['translations_data_id', 'eng'], 'required', 'on' => self::SCENARIO_UPDATE],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ]
            ]
        ];
    }

    public function search($params, $translations_data_id)
    {
        return new ActiveDataProvider([
            'query' => $this->getQuery($params, $translations_data_id),
            'sort' => [
                'defaultOrder' => [
                    'order' => SORT_ASC,
                ]
            ],
            'pagination' => [
                'defaultPageSize' => self::GRID_SIZE
            ],
        ]);
    }

    public function getQuery($params, $translations_data_id)
    {
        /** @var TranslationData $class */
        $class = get_class();
        $query = $class::find();

        $this->load($params);

        $query->andFilterWhere(['=', 'translations_data_id', $translations_data_id]);

        if ($this->created_at) {
            $query->andFilterWhere(['>=', 'created_at', strtotime($this->created_at . ' 00:00:00')]);
            $query->andFilterWhere(['<', 'created_at', strtotime($this->created_at . ' 23:59:59')]);
        }

        return $query;
    }
}

<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "translations_data".
 *
 * @property integer $id
 * @property integer $translation_id
 * @property integer $audio_index
 * @property string $audio_full_name
 * @property string $audio_author_name
 * @property string $video_author_url
 * @property string $url
 * @property string $title
 * @property integer $updated_at
 * @property integer $created_at
 */
class TranslationData extends ActiveRecord
{
    const GRID_SIZE = 20;
    const GRID_SIZE_F = 12;

    const SCENARIO_FILTER = "SCENARIO_FILTER";
    const SCENARIO_UPDATE = "SCENARIO_UPDATE";
    const SCENARIO_ADD_SEN = "SCENARIO_ADD_SEN";

    public $_parser;
    public $_is_parse = 0;
    public $_is_add = 0;
    public $_is_audio = 0;

    public $eng;
    public $ru;
    public $paragraph;

    public static function tableName()
    {
        return 'translations_data';
    }

    public function rules()
    {
        return [
            [['id',
                'translation_id',
                'audio_index',
                'audio_full_name',
                'audio_author_name',
                'video_author_url',
                'url',
                'title',
                'updated_at',
                'created_at',
                '_is_parse',
                '_is_add',
                '_is_audio',
                'eng',
                'ru',
                'paragraph',
                '_parser'], 'safe'],

            /* SCENARIO_FILTER */
            [['created_at'], 'safe', 'on' => self::SCENARIO_FILTER],

            /* SCENARIO_UPDATE */
            [['translation_id', 'url', 'title'], 'required', 'on' => self::SCENARIO_UPDATE],
            [['audio_index'], 'integer', 'on' => self::SCENARIO_UPDATE],

            /* SCENARIO_ADD_SEN */
            [['eng', 'paragraph'], 'required', 'on' => self::SCENARIO_ADD_SEN],
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        if (!empty($this->_is_parse)) {
            Sentence::deleteAll(['translations_data_id' => $this->id]);
            $i = 0;
            foreach (preg_split("/([^.!?]+[.!?]+)/", $this->_parser, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY) as $index => $sentence) {

                if (empty($sentence)) {
                    continue;
                }

                $model = new Sentence();
                $model->paragraph = strstr($sentence, "\n") === false ? 0 : 1;
                if ($i == 0) {
                    $model->paragraph = 1;
                }

                $sentence = preg_replace('/\s+/', ' ', $sentence);
                $sentence = preg_replace('/\"+/', '"', $sentence);
                $sentence = preg_replace('/\n+/', '', $sentence);
                $sentence = preg_replace('/\"\s/', '"', $sentence);

                if (strstr($sentence, '"') !== false && count(explode('"', $sentence)) == 2) {
                    $sentence = preg_replace('/\"/', '', $sentence);
                }

                $model->translations_data_id = $this->id;
                $model->order = $index;
                $model->eng = trim($sentence);
                $model->save();

                $i++;
            }
        }

        return parent::afterSave($insert, $changedAttributes);
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

    public function search($params)
    {
        return new ActiveDataProvider([
            'query' => $this->getQuery($params),
            'sort' => [
                'defaultOrder' => [
                    'updated_at' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => self::GRID_SIZE
            ],
        ]);
    }

    public function getQuery($params)
    {
        /** @var TranslationData $class */
        $class = get_class();
        $query = $class::find();

        $this->load($params);

        if ($this->created_at) {
            $query->andFilterWhere(['>=', 'created_at', strtotime($this->created_at . ' 00:00:00')]);
            $query->andFilterWhere(['<', 'created_at', strtotime($this->created_at . ' 23:59:59')]);
        }

        return $query;
    }

    public function searchFrontend($params)
    {
        return new ActiveDataProvider([
            'query' => $this->getQueryFrontend($params),
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_ASC,
                ]
            ],
            'pagination' => [
                'defaultPageSize' => self::GRID_SIZE_F
            ],
        ]);
    }

    public function getQueryFrontend($params)
    {
        /** @var TranslationData $class */
        $class = get_class();
        $query = $class::find();
        $this->load($params);

        $query->leftJoin(Translation::tableName(), Translation::tableName() . '.id=translation_id');
        $query->andFilterWhere(\Yii::$app->user->isGuest ? ['is_user' => 0] : []);

        if (!empty($this->translation_id)) {
            $query->andFilterWhere(['=', 'translation_id', $this->translation_id]);
        }

        return $query;
    }

    public function getYouTubeId() {
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i', $this->video_author_url, $match)) {
            return $match[1];
        }
        return "";
    }
}

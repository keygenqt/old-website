<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "blog".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $image
 * @property string $code
 * @property string $url
 * @property string $url_download
 * @property string $url_snapcraft
 * @property string $url_repository
 * @property string $file_path
 * @property string $title
 * @property string $description
 * @property integer $blocked
 * @property integer $is_soon
 * @property integer $is_user
 * @property integer $post_type
 * @property integer $is_work
 * @property integer $update_at
 * @property integer $created_at
 * @property integer $text
 * @property integer $image_body
 */
class Post extends ActiveRecord
{
    const TYPE_DEFAULT = '0';
    const TYPE_FILE = '1';
    const TYPE_URL = '2';

    const GRID_SIZE = 20;
    const GRID_SIZE_F = 12;

    const SCENARIO_UPDATE_URL = "SCENARIO_UPDATE_URL";
    const SCENARIO_UPDATE_FILE = "SCENARIO_UPDATE_FILE";
    const SCENARIO_UPDATE_DB = "SCENARIO_UPDATE_DB";
    const SCENARIO_FILTER = "SCENARIO_FILTER";

    public static $CODES = [
        'c++' => '#af117d',
        'java' => '#af1111',
        'php' => '#777BB3',
        'shell' => '#6b6b6b',
        'kotlin' => '#746DD9',
        'JS' => '#F0D91B',
        'python' => '#366C9B',
    ];

    public function init() {
        if ($this->isNewRecord && $this->getScenario() != self::SCENARIO_FILTER) {
            $this->post_type = 0;
        }
        parent::init();
    }

    public static function tableName()
    {
        return 'posts';
    }

    public function rules()
    {
        return [
            [['category_id',
                'code',
                'image',
                'url',
                'url_download',
                'url_snapcraft',
                'url_repository',
                'file_path',
                'title',
                'description',
                'blocked',
                'is_soon',
                'is_user',
                'post_type',
                'is_work',
                'text',
                'image_body'], 'safe'],

            ['image', 'string', 'length' => [3, 255]],
            ['url', 'string', 'length' => [3, 255]],
            ['file_path', 'string', 'length' => [3, 255]],
            ['title', 'string', 'length' => [3, 255]],

            /* SCENARIO_FILTER */
            [['category_id', 'title', 'blocked', 'update_at', 'created_at'], 'safe', 'on' => self::SCENARIO_FILTER],

            /* SCENARIO_UPDATE_FILE */
            [['category_id', 'image', 'url', 'title', 'description'], 'required', 'on' => self::SCENARIO_UPDATE_FILE],

            /* SCENARIO_UPDATE_FILE */
            [['category_id', 'image', 'title', 'description'], 'required', 'on' => self::SCENARIO_UPDATE_URL],

            /* SCENARIO_UPDATE_DB */
            [['category_id', 'image', 'url', 'title', 'description'], 'required', 'on' => self::SCENARIO_UPDATE_DB],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'update_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_at'],
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
                    'update_at' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => self::GRID_SIZE
            ],
        ]);
    }

    public function getQuery($params)
    {
        /** @var Post $class */
        $class = get_class();
        $query = $class::find();

        $this->load($params);

        if ($this->blocked === null) {
            $this->blocked = 0;
        }

        if ($this->is_work === null) {
            $this->is_work = 0;
        }

        if (!empty($params['work'])) {
            $this->is_work = 1;
        }

        if ($this->created_at) {
            $query->andFilterWhere(['>=', 'created_at', strtotime($this->created_at . ' 00:00:00')]);
            $query->andFilterWhere(['<', 'created_at', strtotime($this->created_at . ' 23:59:59')]);
        }

        $query->orderBy('length(text) > 0');
        $query->andFilterWhere(['=', 'is_work', $this->is_work]);
        $query->andFilterWhere(['=', 'post_type', $this->post_type]);
        $query->andFilterWhere(['=', 'blocked', $this->blocked]);


        return $query;
    }

    public function searchFrontend($params, $sort = SORT_DESC)
    {
        return new ActiveDataProvider([
            'query' => $this->getQueryFrontend($params),
            'sort' => [
                'defaultOrder' => [
//                    'is_soon' => SORT_DESC,
                    'created_at' => $sort,
                ]
            ],
            'pagination' => [
                'defaultPageSize' => self::GRID_SIZE_F
            ],
        ]);
    }

    public function getQueryFrontend($params)
    {
        /** @var Post $class */
        $class = get_class();
        $query = $class::find();
        $this->load($params);

//        $query->orderBy('length(text) > 0');

        if (!empty($this->category_id)) {
            $query->andFilterWhere(['=', 'category_id', $this->category_id]);
        }
        $query->andFilterWhere(['=', 'is_work', $this->is_work]);
        $query->andFilterWhere(['=', 'blocked', 0]);

        if (\Yii::$app->user->isGuest) {
            $query->andFilterWhere(['=', 'is_user', 0]);
        }
        return $query;
    }

    public function getTitle()
    {
        return trim(preg_replace('/\s+/', ' ',
            str_replace('<p>', ' ',
                str_replace('</p>', ' ',
                    str_replace('<div>', ' ',
                        str_replace('</div>', ' ',
                            str_replace('<br>', ' ',
                                str_replace('<br />', ' ', $this->title))))))));
    }
}

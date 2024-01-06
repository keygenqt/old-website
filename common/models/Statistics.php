<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "statistics".
 *
 * @property integer $id
 * @property string $key
 * @property integer $count
 * @property integer $update_at
 * @property integer $create_at
 * @property integer $ip
 * @property integer $model_id
 */
class Statistics extends ActiveRecord
{
    public static function tableName()
    {
        return 'statistics';
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

    public static function count($scenario)
    {
        $model = Statistics::findOne(['key' => $scenario]);
        if ($model == null) {
            return 0;
        }
        return $model->count;
    }

    public function rules()
    {
        return [
            /* SCENARIO_UPDATE_WORK_VIEW */
            [['key', 'count', 'update_at', 'create_at', 'ip', 'model_id'], 'safe'],
        ];
    }

    public static function addStatistic($key, $modelId = null)
    {
        if ($modelId != null) {
            $key = $key . '-' . $modelId;
        }
        if ($key == 'site-error') {
            return;
        }

        $model = Statistics::findOne(['key' => $key, 'ip' => Yii::$app->getRequest()->getUserIP()]);

        if ($model == null) {
            $model = new Statistics();
        }
        $model->ip = Yii::$app->getRequest()->getUserIP();
        $model->count = $model->count + 1;
        $model->model_id = $modelId;
        $model->key = $key;
        $model->save();
    }
}

<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "test".
 *
 * @property integer $id
 * @property string $email
 */
class Test extends ActiveRecord
{
    public static function tableName()
    {
        return 'test';
    }
}

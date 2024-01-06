<?php

namespace common\models;

use DateTimeZone;
use Yii;
use yii\base\Model;

/**
 * @property string $timestamp
 * @property string $timezone
 * @property string $date
 */
class Timestamp extends Model
{
    public $_submit;
    public $timestamp;
    public $timezone;
    public $date;

    public function rules()
    {
        return [
            [['timestamp', 'timezone', '_submit'], 'safe'],
            [['timestamp'], 'integer'],
        ];
    }

    public function date()
    {
        if ($this->timestamp == null) {
            $this->timestamp = time();
        }
        if ($this->timezone == null) {
            $this->timezone = 'Europe/London';
        }
        $dt = new \DateTime();
        $dt->setTimezone(new DateTimeZone($this->timezone));
        $dt->setTimestamp($this->timestamp);
        $this->date = $dt->format('d.m.Y, H:i:s');
    }
}

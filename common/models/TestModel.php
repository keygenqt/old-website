<?php

namespace common\models;

use keygenqt\sceditor\SCEditor;
use yii\base\InvalidArgumentException;
use yii\base\Model;
use yii\base\ModelEvent;

/**
 * @property string $autocomplete
 * @property string $image
 * @property string $integer
 * @property string $email
 */
class TestModel extends Model
{
    const SCENARIO_AUTOCOMPLETE = "SCENARIO_AUTOCOMPLETE";
    const SCENARIO_IMAGE = "SCENARIO_IMAGE";
    const SCENARIO_JSON = "SCENARIO_JSON";
    const SCENARIO_SCEDITOR = "SCENARIO_SCEDITOR";
    const SCENARIO_NUMBERMASK = "SCENARIO_NUMBERMASK";

    public $editor;
    public $autocomplete;
    public $image;
    public $json;
    public $integer;
    public $email;
    public $phone;
    public $card;
    public $cvc;

    public function rules()
    {
        return [
            [['autocomplete', 'integer', 'email'], 'required', 'on' => TestModel::SCENARIO_AUTOCOMPLETE],

            [['image', 'integer', 'email'], 'required', 'on' => TestModel::SCENARIO_IMAGE],

            [['json', 'integer', 'email'], 'required', 'on' => TestModel::SCENARIO_JSON],

            [['editor', 'integer', 'email'], 'required', 'on' => TestModel::SCENARIO_SCEDITOR],

            [['cvc', 'card', 'phone'], 'required', 'on' => TestModel::SCENARIO_NUMBERMASK],

            [['integer'], 'integer'],
            [['email'], 'email'],
        ];
    }

    public function clear()
    {
        if ($this->getScenario() == TestModel::SCENARIO_NUMBERMASK) {
            if ($this->phone == '+_ (___) ___-__-__') {
                $this->phone = null;
            }
            if ($this->card == '____-____-____-____') {
                $this->card = null;
            }
            if ($this->cvc == '___') {
                $this->cvc = null;
            }
        }
    }

    public function attributeLabels()
    {
        return [
            'cvc' => 'CVC',
        ];
    }
}

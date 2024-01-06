<?php

namespace common\models;

use \Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property integer $blocked
 * @property integer $created_at
 */

class User extends ActiveRecord implements IdentityInterface
{
    const GRID_SIZE = 20;

    const SCENARIO_FILTER = "filter";
    const SCENARIO_UPDATE = "update";
    const SCENARIO_LOGIN = "login";
    const SCENARIO_GET_EMAIL = "get_email";

    private $rememberMe = true;
    private $_user;
    public $_password;

    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            /* SCENARIO_FILTER */
            [['email', 'blocked', 'created_at'], 'safe', 'on' => self::SCENARIO_FILTER],

            /* SCENARIO_UPDATE */
            [['email'], 'required', 'on' => self::SCENARIO_UPDATE],
            [['password', 'blocked', '_password'], 'safe', 'on' => self::SCENARIO_UPDATE],
            [['email'], 'email', 'on' => self::SCENARIO_UPDATE],
            [['email'], 'unique', 'on' => self::SCENARIO_UPDATE],

            /* SCENARIO_LOGIN */
            [['email', 'password'], 'required', 'on' => self::SCENARIO_LOGIN],
            [['email'], 'email', 'on' => self::SCENARIO_LOGIN],
            [['email'], 'findUser', 'on' => self::SCENARIO_LOGIN],

            /* SCENARIO_LOGIN */
            [['email'], 'required', 'on' => self::SCENARIO_GET_EMAIL],
            [['email'], 'email', 'on' => self::SCENARIO_GET_EMAIL],
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->_password = Yii::$app->security->generateRandomString(10);
            /** @todo send email with password */
        }

        if ($this->_password) {
            $this->password = Yii::$app->security->generatePasswordHash($this->_password);
        }

        return parent::beforeSave($insert);
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findUserLogin($email)
    {
        return static::find()->where('email = :email AND blocked=0', [
            'email' => $email,
        ])->one();
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($this->password, $password);
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

    public function getAuthKey() {}

    public function validateAuthKey($authKey) {}

    public static function findIdentityByAccessToken($token, $type = null) {}

    public function getQuery($params)
    {
        /** @var User $class */
        $class = get_class();
        $query = $class::find();

        $this->load($params);

        if ($this->blocked === null) {
            $this->blocked = 0;
        }

        if ($this->created_at) {
            $query->andFilterWhere(['>=', 'created_at', strtotime($this->created_at . ' 00:00:00')]);
            $query->andFilterWhere(['<', 'created_at', strtotime($this->created_at . ' 23:59:59')]);
        }

        $query->andFilterWhere(['like', 'email', $this->email]);
        $query->andFilterWhere(['like', 'blocked', $this->blocked]);

        return $query;
    }

    public function search($params)
    {
        return new ActiveDataProvider([
            'query' => $this->getQuery($params),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            'pagination' => [
                'pageSize' => self::GRID_SIZE
            ],
        ]);
    }

    public function findUser($attribute, $params, $validator)
    {
        /** @var User $user */
        $this->_user = User::find()->where(['email' => $this->$attribute, 'blocked' => 0])->one();

        if ($this->_user === null || !$this->validatePassword($this->_user->password)) {
            $this->addError($attribute, 'Email not found or password invalid.');
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->_user);
        } else {
            return false;
        }
    }
}

<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\web\IdentityInterface;

class User extends BaseRecord implements IdentityInterface {

    const STATUS_DEF = array(
        'normal' => 0,  // 未激活
        'active' => 1,  // 激活
        );

    public static function tableName () {
        return "mars_user";
    }

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['name', 'email'], 'required'],
            [['name'], 'unique']
        ];
    }

    /**
     * 根据用户名获取用户
     * @param $username 用户名
     * @return User 查找的用户
     */
    public static function findByUsername($name) {
        return static::find()->where([
            'name' => strip_tags($name),
            'status' => static::STATUS_DEF['active'],
        ])->one();
    }

    /**
     * @override
     */
    public static function findIdentity($id) {
        return static::findOne($id);
    }

    /**
     * @override
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @override
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @override
     */
    public function getAuthKey() {
        return $this->authKey;
    }

    /**
     * @override
     */
    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }
}

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

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->password = crypt($this->password, Yii::$app->params['passwordKey']);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['username', 'password', 'email'], 'required'],
            [['username'], 'unique']
        ];
    }

    /**
     * 检查用户登录
     * @param $username 用户名
     * @param $password 密码
     * @return boolean 验证是否通过
     */
    public static function validateLogin($username, $password) {

        return static::find()->where([
            'username' => strip_tags($username),
            'password' => crypt(strip_tags($password), Yii::$app->params['passwordKey']),
            'status' => self::STATUS_DEF['active'],
            ])->one();
    }

    /**
     * 根据用户名获取用户
     * @param $username 用户名
     * @return User 查找的用户
     */
    public static function findByUsername($username) {
        return static::find()->where([
            'username' => strip_tags($username),
            'status' => static::STATUS_DEF['active'],
        ])->one();
    }

    /**
     *  判断用户登录密码是否正确
     * @param $password 密码
     * @return boolean 是否匹配
     */
    public function validatePassword($password) {
        return $this->password == crypt(strip_tags($password), Yii::$app->params['passwordKey']);
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

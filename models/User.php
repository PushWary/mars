<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

class User extends BaseRecord {

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
            ])->exists();
    }
}

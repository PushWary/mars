<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\Query;

class User extends ActiveRecord {

    public static function tableName () {
        return "mars_user";
    }

    /**
     * 检查用户登录
     * @param $username 用户名
     * @param $password 密码
     * @return boolean 验证是否通过
     */
    public static function validateLogin($username, $password) {

        return static::find()->where(['username'=>strip_tags($username), 'password'=>strip_tags($password)])->exists();
    }
}

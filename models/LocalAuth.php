<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

class LocalAuth extends BaseRecord {

    public static function tableName() {
        return "mars_localauth";
    }

    // 登录类型
    const TYPES = array(
        'USERNAME' => 1,
        'USEREMAIL' => 2
    );

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
    public function rules()
    {
        return [
            [['password'], 'validatePassword'],
            [['uid','username','password','type'], 'required']
        ];
    }

    public function validatePassword($password) {
        if (!$this->isNewRecord) {
            return $this->password == crypt(strip_tags($password), Yii::$app->params['passwordKey']);
        } else {
            return true;
        }

    }

    /**
     * 用户名的方式保存本地登录记录
     * @param $uid 用户id
     * @param $name 用户名
     * @param $password 用户密码
     * @return true or false
     */
    public static function saveByName($uid, $name, $password) {
        $localAuth = new LocalAuth();
        return $localAuth->saveAuth(array('_uid'=>$uid, '_key'=>$name, '_password'=>$password), static::TYPES['USERNAME']);
    }

    /**
     * 邮箱的方式保存本地登录记录
     * @param $uid 用户id
     * @param $email 用户名
     * @param $password 用户密码
     * @return true or false
     */
    public static function saveByEmail($uid, $email, $password) {
        $localAuth = new LocalAuth();
        return $localAuth->saveAuth(array('_uid'=>$uid, '_key'=>$email, '_password'=>$password), static::TYPES['USEREMAIL']);
    }

    /**
     * 保存本地登录
     * @param $params 保存参数列表
     * @param $type 保存类型
     * @return true or false
     */
    private function saveAuth($params = array(), $type) {
        $this->uid = $params['_uid'];
        $this->username = $params['_key'];
        $this->password = $params['_password'];
        $this->type = $type;
        if ( !$this->save() ) {
            return false;
        }

        return true;
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'uid']);
    }
}
?>

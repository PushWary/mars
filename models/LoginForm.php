<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login($ip)
    {
        if ($this->validate()) {
            $user = $this->getUser();
            $logContent = array('options'=>'登录', 'ip'=>$ip);
            $resultLog = OperationLog::saveLog(json_encode($logContent), $user->id, OperationLog::TYPE_USER);
            if (!$resultLog['result']) {
                return false;
            }
            return Yii::$app->user->login($user, $this->rememberMe ? 60 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $auth = LocalAuth::find()->where(['username'=>$this->username])->one();
            if ($auth != null) {
                $this->_user = $auth->user;
            }
        }

        return $this->_user;
    }
}

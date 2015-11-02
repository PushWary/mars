<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

class UserValidate extends BaseRecord {

    public static function tableName() {
        return "mars_user_validate";
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->token = parent::getUUID();
            return true;
        } else {
            return false;
        }
    }
}

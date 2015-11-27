<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

class BaseRecord extends ActiveRecord {

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $this->created = date("Y-m-d H:i:s", time());
            return true;
        } else {
            return false;
        }
    }

    /**
     * 获取全局唯一的uuid
     */
    public function getUUID() {
        $command = Yii::$app->db->createCommand("SELECT UUID()");
        $value = $command->queryScalar();
        return $value;
    }
}

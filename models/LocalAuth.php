<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

class LoaclAuth extends BaseRecord {

    public static function tableName() {
        return "mars_localauth";
    }

    // 登录类型
    const TYPES = array(
        'USERNAME' => 1,
        'USEREMAIL' => 2
    );
}
?>

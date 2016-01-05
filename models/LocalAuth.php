<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

class LoaclAuth extends BaseRecord {

    public static function tableName() {
        return "mars_localauth";
    }
}
?>

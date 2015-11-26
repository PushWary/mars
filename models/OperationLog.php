<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

class OperationLog extends BaseRecord {

    public static function tableName() {
        return "mars_operation_log";
    }

    /**
     * 保存日志
     * @param $content 日志内容
     * @param $targetid 所属对象id
     * @param $targetType 所属对象类型
     * @param $creatorid 创建人id
     * @param $remark 备注
     */
    public static saveLog($content, $targetid, $targetType, $creatorid, $remark=null) {
        $operationLog = new OperationLog();
        $operationLog->content = $content;
        $operationLog->targetid = $targetid;
        $operationLog->target_type = $targetType;
        $operationLog->creatorid = $creatorid;
        if ($remark != null) {
            $operationLog->remark = $remark;
        }

        $result = array();
        if (!$operationLog->save()) {
            $result['result'] = false;
            $result['message'] = "保存日志失败";
        }else {
            $result['result'] = true;
            $result['message'] = "保存日志成功";
        }

        return $result;
    }
}

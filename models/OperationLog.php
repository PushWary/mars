<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

class OperationLog extends BaseRecord {

    public static function tableName() {
        return "mars_operation_log";
    }

    const TYPE_USER = 1;  // 用户操作

    /**
     * 保存日志
     * @param $content 日志内容
     * @param $targetid 所属对象id
     * @param $targetType 所属对象类型
     * @param $creatorid 创建人id
     * @param $remark 备注
     */
    public function saveLog($content,$targetId,$targetType,$remark=null) {
        $operationLogModel = new OperationLog();
        $operationLogModel ->targetid = $targetId;
        $operationLogModel ->content = $content;
        if($remark != null) {
            $operationLogModel->remark = $remark;
        }
        $operationLogModel->target_type = $targetType;
        $operationLogModel->creatorid = 0;  // 暂时未0
        if(!$operationLogModel->save()) {
            $data['result']=false;
            $data['message']=$careerError;
            return $data;
        }

        $data['result']=true;
        return $data;
    }
}

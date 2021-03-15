<?php

namespace app\common\model;

use think\Model;


class Shop extends Model
{

    // 數據庫
    protected $connection = 'database';
    // 表名
    protected $name = 'shop';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updateTime';
    // protected $deleteTime = false;

    // 追加属性
    protected $append = [

    ];
    

}

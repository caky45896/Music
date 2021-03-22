<?php

namespace app\admin\model;

use think\Model;
use think\Route;

class Email extends Model
{

    protected $connection = 'database';
    // 表名
    protected $name = 'email';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    // protected $updateTime = false;
    // protected $deleteTime = false;

    // 追加属性
    protected $append = [

    ];
    
<<<<<<< HEAD
}
=======
}
>>>>>>> 4b9c27688925dfb50b26dfeab5f01ebf82916ee9

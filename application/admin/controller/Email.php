<?php

namespace app\admin\controller;

use app\common\controller\Backend;


<<<<<<< HEAD

class Email extends Backend
{

=======
/**
 * 管理员日志管理
 *
 * @icon fa fa-circle-o
 */
class Email extends Backend
{

    /**
     * AdminLog模型对象
     * @var \app\admin\model\Email
     */
>>>>>>> 4b9c27688925dfb50b26dfeab5f01ebf82916ee9
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = new \app\admin\model\Email;

    }

    public function import()
    {
        parent::import();
    }


    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */

}
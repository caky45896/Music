<?php

namespace app\api\controller;

use app\common\controller\Api;
use think\log;
<<<<<<< HEAD

=======
use think\Route;
>>>>>>> 4b9c27688925dfb50b26dfeab5f01ebf82916ee9

class Email extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    public function EmailAdd()
    {
        $data = $this->request->param();
<<<<<<< HEAD

=======
        
>>>>>>> 4b9c27688925dfb50b26dfeab5f01ebf82916ee9
        Log::info("接收內容");
        Log::info($data);
        Log::info("接收內容");

<<<<<<< HEAD
        // 使用 Email 這模塊 (裡面是撈表的)
        $user = new \app\common\model\Email();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->message = $data['message'];

        $user->save();

        $this->success('請求成功');
=======

        $Email = new \app\common\model\Email();
        $Email->name = $data['name'];
        $Email->email = $data['email'];
        $Email->message = $data['message'];
        $Email->save();

        $this->success('请求成功');
>>>>>>> 4b9c27688925dfb50b26dfeab5f01ebf82916ee9
    }
}

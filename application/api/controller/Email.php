<?php

namespace app\api\controller;

use app\common\controller\Api;
use think\log;


class Email extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    public function EmailAdd()
    {
        $data = $this->request->param();

        Log::info("接收內容");
        Log::info($data);
        Log::info("接收內容");

        // 使用 Email 這模塊 (裡面是撈表的)
        $user = new \app\common\model\Email();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->message = $data['message'];

        $user->save();

        $this->success('請求成功');
    }
}

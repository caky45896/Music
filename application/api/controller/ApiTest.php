<?php

namespace app\api\controller;

use app\common\controller\Api;
use think\log;


class ApiTest extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    public function getApitest()
    {
        $data = $this->request->param();

        Log::info("接收內容");
        Log::info($data);
        Log::info("接收內容");

        // 使用 ApiTest 這模塊 (裡面是撈表的)
        $user = new \app\common\model\ApiTest();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->msg = $data['message'];

        $user->save();

        $this->success('請求成功');
    }
}

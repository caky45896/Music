<?php

namespace app\api\controller;

use app\common\controller\Api;
use think\log;
use think\Route;

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


        $Email = new \app\common\model\Email();
        $Email->name = $data['name'];
        $Email->email = $data['email'];
        $Email->message = $data['message'];
        $Email->save();

        $this->success('请求成功');
    }
}

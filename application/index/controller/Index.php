<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\log;

class Index extends Frontend
{

    protected $noNeedLogin = ['*'];
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        // 取得登入狀態
        $this->view->assign("checklogin", $this->auth->isLogin());
        Log::info($this->auth->isLogin());

        if($this->auth->isLogin() == true){
            Log::info("Log: 用戶" . $this->auth->username . ", 成功登入");
            $this->view->assign("user_name", $this->auth->username);
            $this->view->assign("check", $this->auth->isLogin());
        }else{
            Log::info("Log: 用戶未登入");
        }

        return $this->view->fetch();
    }
}

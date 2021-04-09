<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\log;

class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        // 取得登入狀態
        $checklogin = $this->auth->isLogin();
        $this->view->assign("checklogin", $checklogin);

        if($this->auth->isLogin() == true){
            Log::info('成功登入');
            $user_name = $this->auth->username;
            // 取得用戶username
            $this->view->assign("user_name", $user_name);
            $this->view->assign("check", $checklogin);
        }

        return $this->view->fetch();
    }

}

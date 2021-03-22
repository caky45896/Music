<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\Log;

class Music extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        Log::info('接收內容');
        Log::info('Login Status: ');
        Log::info($this->auth->isLogin());

        if($this->auth->isLogin() == true){
            Log::info('成功登入');
        }else{
            Log::info('尚未登入');
            return $this->redirect('music/nologin');
        }

        $this->MusicHouse();
        return $this->view->fetch();
    }

    // 尚未登入的頁面
    public function nologin()
    {

        return $this->view->fetch();
    }

    // 顯示現有的房間
    public function MusicHouse(){
        $Houselist = new \app\common\model\MusicHouse(); 

        $list = $Houselist
            ->where($Houselist)
            ->select();

        $this->view->assign("list", $list);
        return $this->view->fetch();
    }
}

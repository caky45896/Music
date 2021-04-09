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
        // 判斷有沒有登入
        // 沒登入給08去登入
        // 登入之後 顯示現有房間
        Log::info('接收內容');
        Log::info('Login Status: ');
        Log::info($this->auth->isLogin());

        // 取得登入狀態
        $checklogin = $this->auth->isLogin();
        $this->view->assign("checklogin", $checklogin);

        // 取得房間狀態
        $status = $this->auth->music_status;
        $this->view->assign("status", $status);

        if ($this->auth->isLogin() == true) {
            Log::info('成功登入');
            $user_name = $this->auth->username;
            $user_id = $this->auth->id;
            // 取得用戶username
            $this->view->assign("user_name", $user_name);
            $this->view->assign("user_id", $user_id);
            $this->MusicHouse();
        } else {
            Log::info('尚未登入');
            return $this->redirect('music/nologin');
        }
        return $this->view->fetch();
    }


    // 顯示現有的房間
    public function MusicHouse()
    {
        $checklogin = $this->auth->isLogin();
        $this->view->assign("checklogin", $checklogin);
        
        $MusicHouse = new \app\common\model\MusicHouse();

        $list = $MusicHouse
            ->select();

        $this->view->assign("list", $list);
        return $this->view->fetch();
    }

    // 尚未登入的頁面
    public function nologin()
    {
        $checklogin = $this->auth->isLogin();
        $this->view->assign("checklogin", $checklogin);
        return $this->view->fetch();
    }

    // 顯示現有的房間
    public function musicRoom($uuid)
    {
        // 取得登入狀態
        $checklogin = $this->auth->isLogin();
        $this->view->assign("checklogin", $checklogin);

        $MusicHouse = new \app\common\model\MusicHouse();

        $oMusicHouse = $MusicHouse
        ->where('user_id', $this->auth->username)
        ->where('token', $uuid)
        ->find();

        $this->view->assign("is_admin", !empty($oMusicHouse));
        $this->view->assign("user_name", $this->auth->username);
        $this->view->assign("room_id", $uuid);
        return $this->view->fetch();
    }
}

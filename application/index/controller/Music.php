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
        Log::info('Log: 登入狀態 0:否 1:是,  當前狀態:'. $this->auth->isLogin());


        $this->view->assign("checklogin", $this->auth->isLogin()); // 取得登入狀態
        $this->view->assign("status", $this->auth->music_status); // 取得房間狀態

        if ($this->auth->isLogin() == true) {
            Log::info("Log: 用戶 " . $this->auth->username . " 成功登入");
            $this->view->assign("user_name", $this->auth->username); // 取得用戶username
            $this->view->assign("auth_id", $this->auth->id); // 給index 創建點歌房的api-'user_id'使用
            $this->MusicHouse();
        } else {
            Log::info("Log: 用戶未登入");
            return $this->redirect('music/nologin');
        }
        
        
        return $this->view->fetch();
    }


    // 顯示現有的房間
    public function MusicHouse()
    {
        $this->view->assign("checklogin", $this->auth->isLogin());

        $MusicHouse = new \app\common\model\MusicHouse();
        $list = $MusicHouse
        ->select();
        $this->view->assign("list", $list);

        return $this->view->fetch();
    }

    // 尚未登入的頁面
    public function nologin()
    {
        $this->view->assign("checklogin", $this->auth->isLogin());
        return $this->view->fetch();
    }

    // 房間頁面
    public function musicRoom($uuid)
    {
        // 取得登入狀態
        $this->view->assign("checklogin", $this->auth->isLogin());

        $MusicHouse = new \app\common\model\MusicHouse();

        $oMusicHouse = $MusicHouse
        ->where('name', $this->auth->username)
        ->where('token', $uuid)
        ->find();

        $this->view->assign("is_admin", !empty($oMusicHouse));
        $this->view->assign("user_name", $this->auth->username);
        $this->view->assign("room_id", $uuid);
        return $this->view->fetch();
    }
}

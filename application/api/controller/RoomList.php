<?php

namespace app\api\controller;

use app\common\controller\Api;
use think\log;

class RoomList extends Api
{
    protected $noNeedLogin = [''];
    protected $noNeedRight = ['*'];

    public function ListAdd(){
        // 新增
        $data = $this->request->param();
        Log::info("接收內容");
        Log::info($data);

        $list = new \app\common\model\RoomList();
        $list->title = $data['title'];
        $list->url_split = $data['roomid'];
        $list->token = $data['token'];
        $list->room_token = $data['room'];
        $list->yt_url = $data['url'];
        $list->user_name = $data['user_name'];

        $list->save();
        
        $this->success('請求成功');
    }

    public function ListDel(){
        $data = $this->request->param();
        Log::info("接收內容");
        Log::info($data);

        
        // 透過user_id 跟 使用者id
        $listdel = \app\common\model\RoomList::where('id', $data['id'])->find();
        $listdel->delete();

        $this->success('請求成功');
    }
}

?>
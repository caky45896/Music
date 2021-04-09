<?php

namespace app\api\controller;

use app\common\controller\Api;
use think\log;

class MusicList extends Api
{
    protected $noNeedLogin = ['*'];
    protected $noNeedRight = ['*'];

    public function MusicListDel()
    {
        // 刪除
        $data = $this->request->param();
        Log::info("接收內容");
        Log::info($data);

        // 在user表找到username 修改music_status狀態
        $music_status = \app\common\model\User::where('username', $data['name'])->find();
        $music_status->music_status = $data['status'];
        $music_status->save();

        // 透過$row.id 與資料庫相同 刪除
        $listdel = \app\common\model\MusicHouse::where('id', $data['id'])->find();
        $listdel->delete();


        $this->success('請求成功');
    }
    public function MusicListAdd()
    {
        // 新增
        $data = $this->request->param();
        Log::info("接收內容");
        Log::info($data);

        $token = md5(strtotime(date("Y-m-d H:i:s"), time()));

        $listadd = new \app\common\model\MusicHouse();
        $listadd->title = $data['title'];
        $listadd->name = $data['name'];
        $listadd->token = $token;
        $listadd->save();

        // 在user表找到username 修改music_status狀態
        $music_status = \app\common\model\User::where('username', $data['name'])->find();
        $music_status->music_status = $data['status'];
        $music_status->save();
        $this->success('請求成功');
    }
}

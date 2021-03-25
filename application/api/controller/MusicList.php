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
        Log::info("接收內容");

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
        Log::info("接收內容");

        $listadd = new \app\common\model\MusicHouse();
        $listadd->title = $data['title'];
        $listadd->name = $data['name'];
        $listadd->save();

        $this->success('請求成功');
    }
}

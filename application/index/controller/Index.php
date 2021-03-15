<?php

namespace app\index\controller;

use app\common\controller\Frontend;

class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        // 這句的意思 等同於 select * from fa_shop ;
        // $Shoplist = new \app\common\model\Shop(); 

        // $getlist = $Shoplist->where($Shoplist)->select();

        // $this->view->assign("getlist", $getlist);
        return $this->view->fetch();
    }

}

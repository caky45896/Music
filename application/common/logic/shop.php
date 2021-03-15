<?php

namespace app\common\logic;


use app\common\library\enum\CodeEnum;

class Shop extends BaseLogic
{
    public function getShopList($where = [] , $field = true, $order = 'id asc',$paginate = 0){
        $this->modelShop->limit = !$paginate;
        $this->modelShop->join = false;
        return $this->modelShop->select();
    }
}
<?php

namespace app\index\controller;

use app\common\controller\Frontend;
use think\Log;

class About extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
        $settext = "成立于2012年3月8日，至今專注于網路整合營銷，是一家技術服務型企業。
        智匯運用最新型的雲技術，區塊鏈技術為中國、越南、馬來西亞等東南亞國家等眾多行業企業客戶提供了低成本，高價值的網絡服務，並獲得客戶的一致好評。
        公司豐富的產品線包括雲全網壟斷營銷，網絡整營銷(口碑推廣、新聞營銷、論壇營銷)，電腦手機微信APP小程五合一動態HTML5網站建設優化三、四方金流媒合系統(無現金支付)，線上遊戲、VR互娛遊戲、跨境商城系統、VR整體解決方案(VR教育、VR遊戲)等。<br>
        可以滿足客戶的各種不同需求！";
        $this->view->assign('getText', $settext);
        
        // 取得狀態
        $this->view->assign("checklogin", $this->auth->isLogin());
        Log::info($this->auth->isLogin());
        
        if($this->auth->isLogin() == true){
            Log::info("Log: 用戶" . $this->auth->username . ", 成功登入");
            // 取得用戶username
            $this->view->assign("user_name", $this->auth->username);
            $this->view->assign("check", $this->auth->isLogin());
        }else{
            Log::info("Log: 用戶未登入");
        }

        return $this->view->fetch();
    }

}

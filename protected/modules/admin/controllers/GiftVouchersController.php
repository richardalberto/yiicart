<?php

class GiftVouchersController extends BackendController {

    public function actionIndex() {
        $giftVouchers = GiftVoucher::model()->findAll();
        
        $this->render('index', array(
            'giftVouchers'=>$giftVouchers            
        ));
    }

}
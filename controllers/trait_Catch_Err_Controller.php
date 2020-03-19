<?php

namespace app\controllers;


use Yii;
use yii\helpers\Url;
trait trait_Catch_Err_Controller {

    public function err ( $ex ){

//        echo "<pre>";
//        print_r( $ex->getMessage());
//        print_r( $ex->getCode() );
//        print_r( $ex->getTraceAsString());
//        die;

        Yii::error(print_r( $ex->getMessage(), true ). "\r\n" .  print_r( $ex->getCode(), true ). "\r\n" . print_r( $ex->getTraceAsString(), true), 'site-fault' );

        if ( !$this->session->isActive ) {
            $this->session = Yii::$app->session;
            $this->session->open();
        }

        if( ( int ) $ex->getCode() < 0) {
            $this->session->set('Message', Yii::t('app/base_err', $ex->getCode() ) );
        } else {
            $this->session->set('Message', Yii::t('app', $ex->getCode() ) );
        }

        $this->session->set('Code', $ex->getCode());

        if ($this->request->isAjax) {

            return $this->erroci();
        } else {

            Yii::$app->response->redirect(Url::to(['site/fault/']));
        }
    }
}
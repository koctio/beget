<?php

namespace app\controllers;


use Yii;

trait trait_Translate {

    public function Translate( $model ){
        foreach ($model->getErrors() as $key => $value) {
            foreach ($value as $k => $v) {
                $err[$key][$k] = Yii::t('app', $v);
            }
        }

        return $err;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: avtorpc
 * Date: 18.03.20
 * Time: 13:39
 */

namespace app\controllers;


class AdminController extends WebAuthController{

   public function actionIndex(){

       return $this->render('index.twig');
   }

}
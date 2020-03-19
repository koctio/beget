<?php
/**
 * Created by PhpStorm.
 * User: avtorpc
 * Date: 16.07.18
 * Time: 18:59
 */

namespace app\controllers;


use models\Models;
use yii\helpers\Url;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class WebAuthController extends Controller {

    use trait_Catch_Err_Controller;
    use trait_Translate;

    private $session = null;
    private $request = null;
    public $layout = false;

    public function beforeAction($action) {
        try {

            $this->session = Yii::$app->session;

            $this->session->open();

            if ( !isset( $this->session['AUTH_DATA'] ) ) {
                $this->session['AUTH_DATA'] = [ 'ROLE' => 'guest'];
            }

                $acl = Yii::$app->params['acl_list'];


            if ( isset( $acl[ $this->session['AUTH_DATA']['ROLE'] ] ) ) {

                    if (isset($acl[ $this->session['AUTH_DATA']['ROLE'] ][Yii::$app->controller->id])) {
                        if (in_array(Yii::$app->controller->action->id, $acl[ $this->session['AUTH_DATA']['ROLE'] ][Yii::$app->controller->id])) {

                            return parent::beforeAction($action);
                        } else {
                            die( 1 );
                            $this->session->set("Message", Yii::t('app', 'Forbidden'));
                            $this->session->set("Code", 403);
                            Yii::$app->response->redirect(Url::to( 'site/fault/'));
                        }
                    } else {
                        die( 2 );
                        $this->session->set("Message", Yii::t('app', 'Forbidden'));
                        $this->session->set("Code", 403);
                        Yii::$app->response->redirect(Url::to( 'site/fault/'));
                    }
                } else {
                    die( 3 );
                    $this->session->set("Message", Yii::t('app', 'Forbidden'));
                    $this->session->set("Code", 403);
                    Yii::$app->response->redirect(Url::to( 'site/fault/'));
                }


        } catch (\Exception $ex) {

            return $this->err($ex);
        }

    }


    public function setLang() {

        if ($this->session->has('language')) {
            $lang = explode('-', $this->session->get('language'));
            if ($lang[0] == 'de') {
                $lang[0] = 'en';
            }

            Models::callProc("SET_LANG",
                [
                    "in_lang" => strtolower($lang[0])
                ],
                []
            );

        } else {
            throw new \Exception(Yii::t('app', 'Err lang'), 200);
        }

    }


    public function __destruct( ) {
        Models::close_connection( get_called_class()  );
    }

}
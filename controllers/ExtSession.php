<?php
/**
 * Created by PhpStorm.
 * User: avtorpc
 * Date: 04.05.18
 * Time: 14:52
 */

namespace app\controllers;


use yii\web\Session;

class ExtSession extends  Session
{


    /**
     * Removes all session variables
     */
    public function clear()
    {
        if (isset($_SESSION)) {
            foreach (array_keys($_SESSION) as $key)
                unset($_SESSION[$key]);
        }
    }


    /**
     * @param string $value the session ID for the current session
     */
    public function setSessionID($value)
    {
        $this->setId($value);
    }


    /**
     * Adds a session variable.
     * Note, if the specified name already exists, the old value will be removed first.
     * @param mixed $key session variable name
     * @param mixed $value session variable value
     */
    public function add($key,$value)
    {
        $_SESSION[$key]=$value;
    }


    /**
     * Frees all session variables and destroys all data registered to a session.
     */
    public function destroy()
    {
        if(session_id()!=='')
        {
            @session_unset();
            @session_destroy();
        }
    }
}
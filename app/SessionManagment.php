<?php
/**
 * Created by PhpStorm.
 * User: ARJONA_An
 * Date: 20/11/2018
 * Time: 09:13
 */

/* gestion des sessions*/

class SessionManagment {

     public function create($name, $value) {
        $_SESSION[$name] = $value;
    }

    public function destroy($name) {
        $_SESSION[$name] = null;
    }

    public function load($name) {
         return $_SESSION[$name];
    }

    /* session flash qui se détruit apres utilisation */
    public function flash($name) {
         $session = $_SESSION[$name];
         unset($_SESSION[$name]);
         return $session;
    }

    public function isValid($name) {
        return isset($_SESSION[$name]) ? true : false;
    }

}
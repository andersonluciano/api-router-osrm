<?php
/**
 * Created by PhpStorm.
 * User: desnot01
 * Date: 22/10/18
 * Time: 17:52
 */

namespace App\Helpers;


class AuthCheck
{


    static $passwd = "";

    static function check($passwd)
    {
        if (self::$passwd == $passwd) {
            return true;
        } else {
            sleep(rand(1, 4));

            return false;
        }
    }


}
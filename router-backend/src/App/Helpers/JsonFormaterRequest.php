<?php
/**
 * Created by PhpStorm.
 * User: desnot01
 * Date: 22/10/18
 * Time: 17:52
 */

namespace App\Helpers;


use Psr\Http\Message\ServerRequestInterface;

class JsonFormaterRequest
{

    static function toArray(ServerRequestInterface $request)
    {
        $json = $request->getBody()->getContents();
        if (trim($json) == "") {
            throw new \Exception("Conteúdo vazio", 400);
        }

        $array = json_decode($json, true);
        if ($array == null) {
            throw new \Exception("JSON não identificado", 400);
        }

        return $array;
    }


}
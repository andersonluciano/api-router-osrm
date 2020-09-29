<?php

declare(strict_types=1);

namespace App\Router;

use GuzzleHttp\Client;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

use function time;

class Trace
{
    static function driving($coordinates = [])
    {
        $coordinates = implode(";", $coordinates);

        $cliente = new Client(
            [
                "base_uri" => OsrmConfig::$address
            ]
        );

        $response = $cliente->get(
            OsrmConfig::$driving . $coordinates,
            [
                "query" => [
                    "geometries" => "geojson"
                ]
            ]
        );
        $route    = json_decode($response->getBody()->getContents(), true);

        if ($route['code'] == "Ok") {
            return $route;
        } else {
            throw new \Exception("Não foi possível traçar a rota entre as localizações", 400);
        }
    }
}

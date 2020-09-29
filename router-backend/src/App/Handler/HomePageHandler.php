<?php

declare(strict_types=1);

namespace App\Handler;

use App\Helpers\JsonFormaterRequest;
use App\Router\Trace;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HomePageHandler implements RequestHandlerInterface
{


    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $data = [];

        $body = JsonFormaterRequest::toArray($request);

        foreach ($body as $item) {
            $coordinates[] = $item['lon'] . "," . $item['lat'];
        }

        try {
            $route = Trace::driving($coordinates);

            return new JsonResponse($route);
        } catch (\Exception $e) {
            return new JsonResponse(["error" => $e->getMessage()]);
        }
    }
}

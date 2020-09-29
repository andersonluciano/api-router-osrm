<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Helpers\AuthCheck;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthCheckMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $auth = $request->getHeader('Authorization');

        if (count($auth) == 0 || $auth[0] == "") {
            sleep(rand(1, 5));

            throw new \Exception("", 401);
        }

        if (AuthCheck::check($auth[0]) == true) {
            return $handler->handle($request);
        }

        throw new \Exception("", 401);
    }
}

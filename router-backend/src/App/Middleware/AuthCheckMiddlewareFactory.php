<?php

declare(strict_types=1);

namespace App\Middleware;

use Psr\Container\ContainerInterface;

class AuthCheckMiddlewareFactory
{
    public function __invoke(ContainerInterface $container) : AuthCheckMiddleware
    {
        return new AuthCheckMiddleware();
    }
}

<?php

namespace Project\System;

/**
 * App
 */
final class App
{    
    /**
     * __construct
     *
     * @param Router $router
     * @return void
     */
    public function __construct(
        private Router $router = new Router()
    ) {}

    public function run(): void
    {
        session_start();
        $this->router->navigate();
    }
}
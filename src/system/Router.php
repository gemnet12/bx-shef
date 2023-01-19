<?php

namespace Project\System;

use Project\App\Controllers\Controller;

/**
 * Router
 */
final class Router
{    
    /**
     * __construct
     *
     * @param Controller $controller
     * @return void
     */
    public function __construct(
        private Controller $controller = new Controller()
    ) {}
    
    /**
     * navigate
     *
     * @return void
     */
    public function navigate(): void
    {
        $url = $_SERVER["REQUEST_URI"];

        switch ($url) {
            case '/':
                $this->redirectToAction('index');
                break;
            case '/new':
                $this->redirectToAction('new');
                break;
            case '/create':
                $this->redirectToAction('create');
                break;
            case '/show':
                $this->redirectToAction('show');
                break;
        }
    }
    
    /**
     * redirectToAction
     *
     * @param  string $action
     * @return void
     */
    private function redirectToAction(string $action): void
    {
        $this->controller->$action();
    }
}
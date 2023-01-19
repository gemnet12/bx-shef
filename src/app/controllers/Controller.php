<?php

namespace Project\App\Controllers;

use Project\App\Services\Service;

/**
 * Controller
 */
class Controller
{
    public function __construct(
        private Service $service = new Service()
    ) {}
    
    /**
     * index
     *
     * @return void
     */
    public function index(): void
    {
        $this->render('index');
    }
    
    /**
     * new
     *
     * @return void
     */
    public function new(): void
    {
        $this->render('form');
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create(): void
    {
        $data = $_POST;
        $signatures = $this->service->generateSignature($data, ['red' , 'green']);
        $_SESSION['signatures'] = $signatures;
        $this->redirect('show');
    }
    
    /**
     * show
     *
     * @return void
     */
    public function show(): void
    {
        $signatures = $_SESSION['signatures'];
        $this->render('show', ['signatures' => $signatures]);
    }
    
    /**
     * render
     *
     * @param  string $templateName
     * @param  array<string> $data
     * @return void
     */
    private function render(string $templateName, array $data = []): void
    {
        extract($data);
        require_once __VIEWS_PATH . $templateName . '.php';
    }
    
    /**
     * redirect
     *
     * @param  string $url
     * @return void
     */
    private function redirect(string $url): void
    {
        header('Location: ' . $url);
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\Vyrobce;


class Main extends BaseController
{
    public $data;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $vyrobce = new Vyrobce();
        $dataVyrobce = $vyrobce->findAll();

        $this->data = [
          "vyrobce" => $dataVyrobce  
        ];
    }

    public function index()
    {
        echo view('index', $this->data);
    }
}

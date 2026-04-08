<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\Vyrobce;


class Main extends BaseController
{
    public $vyrobce;
    public $data;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->vyrobce = new Vyrobce();
        $dataVyrobce = $this->vyrobce->findAll();

        $this->data = [
          "vyrobce" => $dataVyrobce  
        ];
    }

    public function index()
    {
        echo view('index', $this->data);
    }

    public function vyrobce($id)
    {
        $dataKomponent = $this->vyrobce->join('komponent', 'vyrobce.idVyrobce = komponent.vyrobce_id', 'inner')
            ->join('typkomponent', 'komponent.typKomponent_id = typkomponent.idKomponent', 'inner')
            ->where('vyrobce.idVyrobce', $id)
            ->findAll();
        
        $this->data += [
            "komponent" => $dataKomponent
        ];

        echo view('vyrobce', $this->data);
    }
    
    public function komponent($id)
    {
        echo view('komponent', $this->data);
    }
}

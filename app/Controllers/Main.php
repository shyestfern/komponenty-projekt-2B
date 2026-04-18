<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\Vyrobce;
use App\Models\Komponent;


class Main extends BaseController
{
    public $vyrobce;
    public $komponent;
    public $data;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->vyrobce = new Vyrobce();
        $dataVyrobce = $this->vyrobce->findAll();

        $this->komponent = new Komponent();

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
        $nazevVyrobce = $this->vyrobce->find($id)->vyrobce;

        $dataKomponent = $this->vyrobce->join('komponent', 'vyrobce.idVyrobce = komponent.vyrobce_id', 'inner')
            ->join('typkomponent', 'komponent.typKomponent_id = typkomponent.idKomponent', 'inner')
            ->where('vyrobce.idVyrobce', $id)
            ->findAll();
        
        $this->data += [
            "komponent" => $dataKomponent,
            "nazevVyrobce" => $nazevVyrobce
        ];

        echo view('vyrobce', $this->data);
    }
    
    public function komponent($id)
    {
        $nazevKomponenty = $this->komponent->find($id)->nazev;

        $infoKomponent = $this->vyrobce->join('komponent', 'vyrobce.idVyrobce = komponent.vyrobce_id', 'inner')
            ->join('typkomponent', 'komponent.typKomponent_id = typkomponent.idKomponent', 'inner')
            ->join('parametr', 'komponent.id = parametr.komponent_id', 'inner')
            ->join('nazevparametr', 'parametr.nazevParametr_id = nazevparametr.id', 'inner')
            ->join('typpocitace_has_komponent', 'parametr.komponent_id = typpocitace_has_komponent.komponent_id', 'inner')
            ->join('typpocitace', 'typpocitace_has_komponent.typPocitace_id = typpocitace.idTyp', 'inner')
            ->where('komponent.id', $id)
            ->findAll();

        $this->data += [
            "infoKomponent" => $infoKomponent,
            "nazevKomponenty" => $nazevKomponenty
        ];

        echo view('komponent', $this->data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class IndexController extends Controller
{
    public function index(){
        
        $dolares = $this->dolar();

        $cripto = $this->cripto();

        $feriados = $this->feriados();

        return view('index')
            ->with(compact('dolares'))
            ->with(compact('feriados'))
            ->with(compact('cripto'));
    }
    public function dolar(){

        $client = new Client();
        $response = $client->get('https://www.dolarsi.com/api/api.php?type=valoresprincipales');
        $dolares = json_decode($response->getBody());
        return $dolares;
    }
    public function cripto(){

        $client = new Client();

        $response = $client->get('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&ids=bitcoin%2Cethereum%2Ccardano&order=market_cap_desc&per_page=100&page=1&sparkline=false');

        $cripto = json_decode($response->getBody());


        return $cripto;
    }

    public function feriados(){

        $client = new Client();
        $response = $client->get('http://nolaborables.com.ar/api/v2/feriados/2021?formato=mensual');
        $feriados = json_decode($response->getBody());
        return $feriados;
        
    }

    public function export(){
        $file = public_path("exports/LeandroCepeda.pdf");
        return response()->download($file);
    }
}

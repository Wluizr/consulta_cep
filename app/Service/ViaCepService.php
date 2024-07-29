<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class ViaCepService{
    private $url = "";
    private $type = "";

    //Aqui está o buscador de ceps
    public function __construct($url = "viacep.com.br/ws/", $type = "/json") {
        $this->url = $url;
        $this->type = $type;
    }

    public function searchCep($cep){

        $cepNumber = $cep;
        
        // dd($this->url.$cepNumber.$this->type);
        $response = Http::get($this->url.$cepNumber.$this->type);

        return $response->json();
    }
}
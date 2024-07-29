<?php

namespace App\Http\Controllers;

use App\Service\ViaCepService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class cepController extends Controller
{

    protected $viaCepService;

    public function __construct(ViaCepService $viaCepService)
    {
        $this->viaCepService = $viaCepService; // Serviço que irá prover a busca dos ceps.
    }

    public function searchMyCep(Request $request){
        $cep = $request->input('myCep');

        
        try {
            // Consome api de ViaCep
            $response = $this->viaCepService->searchCep($cep);

            return view('mycep', ['address' => $response]);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}

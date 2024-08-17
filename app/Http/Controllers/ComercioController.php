<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ComercioController extends Controller
{
    public function guardarComercio(Request $request){

        //crear una nueva instancia Guzzle client
        $cliente = new Client();

        $response = $cliente->post('http://localhost:8080/api/comercio/crear',['json'=>[
            'id'=>$request->id,
            'nombre'=>$request->nombre,          
              'imagen'=>$request->imagen,
            'ubicacion'=>[
                'latitud'=>$request->latitud,
                'longitud'=>$request->longitud,
                'descripcion'=>$request->longitud
            ]
   
            ]]);
    
        echo $response->getBody();
    }
}

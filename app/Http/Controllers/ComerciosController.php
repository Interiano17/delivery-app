<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ComerciosController extends Controller
{
    public function mostrarComercios(){
        // Create a new Guzzle client instance
        $client = new Client();

        // API endpoint URL with your desired location and units (e.g., London, Metric units)
        $apiUrl = "http://127.0.0.1:8091/api/comercio/todos";

        try {
            // Make a GET request to the API
            $response = $client->get($apiUrl);

            // Get the response body as an array
            $data = json_decode($response->getBody(), true);

            // Handle the retrieved weather data as needed (e.g., pass it to a view)
            return view('inicio', ['comercios' => $data]);
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('api_error', ['error' => $e->getMessage()]);
        }


    }

    public function mostrarComerciosAdmin(){
        // Create a new Guzzle client instance
        $client = new Client();

        // API endpoint URL with your desired location and units (e.g., London, Metric units)
        $apiUrl = "http://127.0.0.1:8091/api/comercio/todos";

        try {
            // Make a GET request to the API
            $response = $client->get($apiUrl);

            // Get the response body as an array
            $data = json_decode($response->getBody(), true);

            // Handle the retrieved weather data as needed (e.g., pass it to a view)
            return view('comercioAdmin', ['comercios' => $data]);
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('api_error', ['error' => $e->getMessage()]);
        }


    }
    
    public function guardarComercio(Request $request){

        //crear una nueva instancia Guzzle client
        $cliente = new Client();

       try {
        //code...
        $response = $cliente->post('http://127.0.0.1:8091/api/comercio/crear',['json'=>[
            'id'=>$request->id,
            'nombre'=>$request->nombre,          
              'imagen'=>$request->imagen,
            'ubicacion'=>[
                'latitud'=>$request->latitud,
                'longitud'=>$request->longitud,
                'descripcion'=>$request->descripcion
            ]
   
            ]]);
    
       return redirect(route('comercios.mostrar'));
       } catch (\Exception $e) {
        
        return view('api_error', ['error' => $e->getMessage()]);
       } 
    }
}

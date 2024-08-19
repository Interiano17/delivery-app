<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client; 

class mapaController extends Controller
{
    // Create a new Guzzle client instance
    // public function repartidorMasCercano(Request $request, Client $client){

    //     $comercioID = $request->route('id');
    //     $apiUrl = "http://localhost:8091/api/repartidor/mascercano/$comercioID";
    //     try {
    //         $response = $client->get($apiUrl);

    //         $repartidor = json_decode($response->getBody(), true);
            
    //         return $repartidor;
    //     } catch (\Exception $e) {
            
    //         return view('api_error', ['error' => $e->getMessage()]);
    //     }
    // }


    public function mostrarUbicaciones(Request $request){
        $client = new Client();

        // API endpoint URL with your desired location and units (e.g., London, Metric units)
        $apiUrl = "http://127.0.0.1:8091/api/repartidor/todos/disponibles";

        try {
            // Make a GET request to the API
            $response = $client->get($apiUrl);

            // Get the response body as an array
            $data = json_decode($response->getBody(), true);

            $repartidor = $this->repartidorMasCercano($request,$client);

            $comercio = $this->obtenerComercio($request, $client);

            $destino = $this->obtenerUbicacionDestino($request, $client);
            // Handle the retrieved weather data as needed (e.g., pass it to a view)
            return view('seguimientoorden', 
                ['infos' => $data, 'repartidorCercano' => $repartidor,
                'comercio' => $comercio, 'ubicacionDestino' => $destino]);
            //$data es un arreglo con todos los repartidores disponibles en este momento
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }

    public function repartidorMasCercano(Request $request, Client $client){

        $comercioID = $request->route('id');
        $apiUrl = "http://localhost:8091/api/repartidor/mascercano/$comercioID";
        try {
            $response = $client->get($apiUrl);

            $repartidor = json_decode($response->getBody(), true);
            
            return $repartidor;
        } catch (\Exception $e) {
            
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }

    public function obtenerComercio(Request $request, Client $client){
        $comercioID = $request->route('id');
        $apiUrl = "http://localhost:8091/api/comercio/$comercioID";
        try {
            $response = $client->get($apiUrl);

            $comercio = json_decode($response->getBody(), true);
            
            return $comercio;
        } catch (\Exception $e) {
            
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }

    public function obtenerUbicacionDestino(Request $request, Client $client){
        $comercioID = $request->route('id');
        $apiUrl = "http://localhost:8091/api/persona/$comercioID";
        try {
            $response = $client->get($apiUrl);

            $comercio = json_decode($response->getBody(), true);
            
            return $comercio;
        } catch (\Exception $e) {
            
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }

}

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


    public function mostrarUbicaciones(Request $request, String $correo){
        $client = new Client();

        // API endpoint URL with your desired location and units (e.g., London, Metric units)
        $apiUrl = "http://127.0.0.1:8091/api/repartidor/todos/disponibles";

        try {
            // Make a GET request to the API
            $response = $client->get($apiUrl);
            
            // Get the response body as an array
            $data = json_decode($response->getBody(), true);
            //echo  json_encode($data) ;
            $repartidor = $this->repartidorMasCercano($request,$client);
            // echo json_encode($repartidor);
            // echo ".................";
            $comercio = $this->obtenerComercio($request, $client);
            // echo json_encode($comercio);
            // echo "---------";
            $cliente = $this->obtenerUbicacionDestino($request, $client, $correo);
            $ubicacionCliente = json_encode($cliente['ubicacion']);
            
            // echo $ubicacionCliente;
            // echo "---------";
            // Handle the retrieved weather data as needed (e.g., pass it to a view)
            return view('seguimientoorden', 
                ['infos' => $data, 'repartidorCercano' => $repartidor,
                'comercio' => $comercio, 'ubicacionCliente'=> $ubicacionCliente]);
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
        $correoCliente = $request->route('correo');
        $apiUrl = "http://localhost:8091/api/persona/correo/".$correoCliente;
        try {
            $response = $client->get($apiUrl);

            $persona = json_decode($response->getBody(), true);
            
            return $persona;
        } catch (\Exception $e) {
            
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }

}

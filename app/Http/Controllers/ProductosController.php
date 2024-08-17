<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductosController extends Controller
{
    public function mostrarProductosAdmin(){
        // Create a new Guzzle client instance
        $client = new Client();

        // API endpoint URL with your desired location and units (e.g., London, Metric units)
        $apiUrl = "http://127.0.0.1:8091/api/producto/todos";
        $apiUrlComercio = "http://127.0.0.1:8091/api/comercio/todos";

        try {
            // Make a GET request to the API
            $response = $client->get($apiUrl);
            $responseComercio = $client->get($apiUrlComercio);
            // Get the response body as an array
            $data = json_decode($response->getBody(), true);
            $dataComercio = json_decode($responseComercio->getBody(),true);

            // Handle the retrieved weather data as needed (e.g., pass it to a view)
            return view('productosAdmin', ['productos' => $data,'comercios' => $dataComercio]);
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }

    public function mostrarProductosComercio($id, $nombre){
        // Create a new Guzzle client instance
        $client = new Client();

        // API endpoint URL with your desired location and units (e.g., London, Metric units)
        $apiUrl = "http://127.0.0.1:8091/api/producto/obtener/comercio/{$id}";

        try {
            // Make a GET request to the API
            $response = $client->get($apiUrl);

            // Get the response body as an array
            $data = json_decode($response->getBody(), true);

            // Handle the retrieved weather data as needed (e.g., pass it to a view)
            return view('productosComercio', ['productos' => $data, 'nombre' => $nombre]);
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('api_error', ['error' => $e->getMessage()]);
        }


    }

    public function crearProducto(Request $request){
        $cliente = new Client();
        $apiUrl = 'http://127.0.0.1:8091/api/producto/crear';
     
        try {
            //code...
            $response = $cliente->post($apiUrl,['json'=>[
                'id'=>$request->id,
                'nombre'=>$request->nombre,                      
                  'descripcion'=>$request->descripcion,
                  'precio'=>$request->precio,
                  'imagen'=>$request->imagen,
                  'comercios'=>$request->comercios
               
                ] ]);
                return redirect(route('productosAdmin.mostrar'));
        } catch (\Exception $e) {
           
            return view('api_error', ['error' => $e->getMessage()]);
        } 
        
      

    }
}

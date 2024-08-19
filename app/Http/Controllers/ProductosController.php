<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductosController extends Controller
{ 

    public function editarProductoSave($id){
        // Crear una nueva instancia de Guzzle Client
        $cliente = new Client();
    
        try {
            // Realizar la solicitud PUT
            $response = $cliente->put("http://127.0.0.1:8091/api/producto/editar/{$id}", [
                'json' => [
                    'nombre'=>$request->nombre,                      
                      'descripcion'=>$request->descripcion,
                      'precio'=>$request->precio,
                      'imagen'=>$request->imagen,
                      'comercios'=>$request->comercios
                   
                ]
            ]);
    
            // Decodificar la respuesta JSON
            $data = json_decode($response->getBody(), true);
    
            // Mostrar la respuesta JSON
            echo json_encode($data);
    
            // Redirigir en función del estado de la respuesta
            if (isset($data['status']) && $data['status']) {
                return redirect()->route('productos.admin.mostrar');
            }
    
            return redirect()->route('productos.admin.mostrar');
    
        } catch (\Exception $e) {
            // Manejar errores y mostrar vista de error
            return view('api_error', ['error' => $e->getMessage()]);
        }
    
    
      


    }
    public function editarProducto($id){
        // Create a new Guzzle client instance
        $client = new Client();
     
        // API endpoint URL with your desired location and units (e.g., London, Metric units)
        $apiUrl = "http://127.0.0.1:8091/api/producto/obtener/".$id;
        $apiUrlComercio = "http://127.0.0.1:8091/api/comercio/todos";
     
        try {
            // Make a GET request to the API
            $response = $client->get($apiUrl);
            $responseComercio = $client->get($apiUrlComercio);
            // Get the response body as an array
            $data = json_decode($response->getBody(), true);
            $dataComercio = json_decode($responseComercio->getBody(),true);
     
            // Handle the retrieved weather data as needed (e.g., pass it to a view)
            return view('editarProductoAdmin', ['producto' => $data,'comercios' => $dataComercio]);
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('api_error', ['error' => $e->getMessage()]);
        }

    }
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


                
            $data = json_decode($response->getBody(),true);
                 
            $message = '<div class="alert alert-'.$data['alert'].' alert-dismissible fade show" role="alert">
            '.$data['message'].'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
                        
          session()->flash('message', $message);

            if(
                $data['status']
            ){
        return redirect(route('productos.admin.mostrar'));
            }        
            return redirect(route('productos.admin.mostrar'));
            
               
        } catch (\Exception $e) {
           
            return view('api_error', ['error' => $e->getMessage()]);
        } 
        
      

    }

    public function verProductosAdmin($id){
   // Create a new Guzzle client instance
   $client = new Client();

   // API endpoint URL with your desired location and units (e.g., London, Metric units)
   $apiUrl = "http://127.0.0.1:8091/api/producto/obtener/".$id;
  

   try {
       // Make a GET request to the API
       $response = $client->get($apiUrl);
 
       // Get the response body as an array
       $data = json_decode($response->getBody(), true);
      

       // Handle the retrieved weather data as needed (e.g., pass it to a view)
       return view('verProductoAdmin', ['producto' => $data]);
   } catch (\Exception $e) {
       // Handle any errors that occur during the API request
       return view('api_error', ['error' => $e->getMessage()]);
   }
    }
}

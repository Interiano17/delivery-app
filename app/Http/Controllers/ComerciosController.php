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
    public function editarComercio($id){
 // Create a new Guzzle client instance
 $client = new Client();

 // API endpoint URL with your desired location and units (e.g., London, Metric units)

 $apiUrl = "http://127.0.0.1:8091/api/comercio/".$id;


 try {
     // Make a GET request to the API
     $response = $client->get($apiUrl);

     // Get the response body as an array
     $data = json_decode($response->getBody(), true);

     // Handle the retrieved weather data as needed (e.g., pass it to a view)
     return view('editarcomercio', ['comercio' => $data]);
 } catch (\Exception $e) {
     // Handle any errors that occur during the API request
     return view('api_error', ['error' => $e->getMessage()]);
 }


    }


    public function validarUsuario(Request $request){
        // Create a new Guzzle client instance
        $client = new Client();

        // API endpoint URL with your desired location and units (e.g., London, Metric units)
        $apiUrl = "http://127.0.0.1:8091/api/usuario/validar?correo={$request->correo}&contrasenia={$request->contrasenia}";

        try {
            // Make a GET request to the API
            $response = $client->get($apiUrl);

            // Get the response body as an array
            $data = json_decode($response->getBody(), true);

            // Handle the retrieved weather data as needed (e.g., pass it to a view)
            if($response->getBody() == "validado"){
                return redirect('/inicio');
            }else{
                return view('welcome');
            }
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
            $data = json_decode($response->getBody(),true);

            
            $message = '<div class="alert alert-'.$data['alert'].' alert-dismissible fade show" role="alert">
            '.$data['message'].'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
                        
          session()->flash('message', $message);
            if(
                $data['status']
            ){ 
            return redirect(route('comercios.mostrar.admin'));
            }

            return redirect(route('comercios.mostrar.admin'));
           
      
       } catch (\Exception $e) {
        
        return view('api_error', ['error' => $e->getMessage()]);
       } 
    }

    public function editarComercioSave($id,Request $request){
     
            // Crear una nueva instancia de Guzzle Client
            $cliente = new Client();
        
            try {
                // Realizar la solicitud PUT
                $response = $cliente->put("http://127.0.0.1:8091/api/comercio/editar/{$id}", [
                    'json' => [
                        'nombre' => $request->nombre,
                        'imagen' => $request->imagen,
                        'ubicacion' => [
                            'latitud' => $request->latitud,
                            'longitud' => $request->longitud,
                            'descripcion' => $request->descripcion
                        ]
                    ]
                ]);
        
                // Decodificar la respuesta JSON
                $data = json_decode($response->getBody(), true);
        
                // Mostrar la respuesta JSON
                echo json_encode($data);
        
                // Redirigir en función del estado de la respuesta
                if (isset($data['status']) && $data['status']) {
                    return redirect()->route('comercios.mostrar.admin');
                }
        
                return redirect()->route('comercios.mostrar.admin');
        
            } catch (\Exception $e) {
                // Manejar errores y mostrar vista de error
                return view('api_error', ['error' => $e->getMessage()]);
            }
        
        

    }

    public function verComercioAdmin($id){
        // Create a new Guzzle client instance
 $client = new Client();

 // API endpoint URL with your desired location and units (e.g., London, Metric units)

 $apiUrl = "http://127.0.0.1:8091/api/comercio/".$id;


 try {
     // Make a GET request to the API
     $response = $client->get($apiUrl);

     // Get the response body as an array
     $data = json_decode($response->getBody(), true);

     // Handle the retrieved weather data as needed (e.g., pass it to a view)
     return view('verComercio', ['comercio' => $data]);
 } catch (\Exception $e) {
     // Handle any errors that occur during the API request
     return view('api_error', ['error' => $e->getMessage()]);
 }

    }

}

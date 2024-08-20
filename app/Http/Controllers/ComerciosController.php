<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ComerciosController extends Controller
{
    public function mostrarComercios(){
        
        $client = new Client();

        

        $apiUrl = "http://127.0.0.1:8091/api/comercio/todos";


        try {
            $response = $client->get($apiUrl);

            $data = json_decode($response->getBody(), true);
            
            return view('inicio', ['comercios' => $data]);
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }


    }
    public function editarComercio($id){
        $client = new Client();


        $apiUrl = "http://127.0.0.1:8091/api/comercio/".$id;


        try {
            $response = $client->get($apiUrl);

            $data = json_decode($response->getBody(), true);

            return view('editarcomercio', ['comercio' => $data]);
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }


    }


    public function validarUsuario(Request $request){
        $client = new Client();

        $apiUrl = "http://127.0.0.1:8091/api/usuario/validar?correo={$request->correo}&contrasenia={$request->contrasenia}";

        try {
            $response = $client->get($apiUrl);
            
            session()->put('correo', $request->correo);
            $data = json_decode($response->getBody(), true);

            if($response->getBody() == "validado"){
                return redirect('/inicio');
            }else{
                return view('welcome');
            }
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }

    public function mostrarComerciosAdmin(){
        $client = new Client();

        $apiUrl = "http://127.0.0.1:8091/api/comercio/todos";

        try {
            $response = $client->get($apiUrl);

            $data = json_decode($response->getBody(), true);

            return view('comercioAdmin', ['comercios' => $data]);
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }


    }

    
    public function guardarComercio(Request $request){

        //crear una nueva instancia Guzzle client
        $cliente = new Client();

       try {
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
        $client = new Client();


        $apiUrl = "http://127.0.0.1:8091/api/comercio/".$id;


        try {
            $response = $client->get($apiUrl);

            $data = json_decode($response->getBody(), true);

            return view('verComercio', ['comercio' => $data]);
        } catch (\Exception $e) {
            return view('api_error', ['error' => $e->getMessage()]);
        }

    }

}

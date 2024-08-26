<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ProductosController extends Controller
{ 

    public function editarProductoSave($id, Request $request){
        // Crear una nueva instancia de Guzzle Client
        $cliente = new Client();
    
        try {
            // Realizar la solicitud PUT
            echo json_encode($request->comercios);
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
        
        $client = new Client();
     
        
        $apiUrl = "http://127.0.0.1:8091/api/producto/obtener/".$id;
        $apiUrlComercio = "http://127.0.0.1:8091/api/comercio/todos";
     
        try {
            
            $response = $client->get($apiUrl);
            $responseComercio = $client->get($apiUrlComercio);
            
            $data = json_decode($response->getBody(), true);
            $dataComercio = json_decode($responseComercio->getBody(),true);
     
            
            return view('editarProductoAdmin', ['producto' => $data,'comercios' => $dataComercio]);
        } catch (\Exception $e) {
            
            return view('api_error', ['error' => $e->getMessage()]);
        }

    }
    public function mostrarProductosAdmin(){
        
        $client = new Client();

        
        $apiUrl = "http://127.0.0.1:8091/api/producto/todos";
        $apiUrlComercio = "http://127.0.0.1:8091/api/comercio/todos";

        try {

            $response = $client->get($apiUrl);
            $responseComercio = $client->get($apiUrlComercio);

            $data = json_decode($response->getBody(), true);
            $dataComercio = json_decode($responseComercio->getBody(),true);

            return view('productosAdmin', ['productos' => $data,'comercios' => $dataComercio]);
        } catch (\Exception $e) {
            
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }

    public function mostrarProductosComercio($id, $nombre){
        
        $client = new Client();
        

        
        $apiUrl = "http://127.0.0.1:8091/api/producto/obtener/comercio/{$id}";

        try {
            
            $response = $client->get($apiUrl);

            
            $data = json_decode($response->getBody(), true);
            $correo  = session('correo');
            
            return view('productosComercio', ['productos' => $data, 'nombre' => $nombre, 'id' => $id, 'correo' => $correo]);
        } catch (\Exception $e) {
            
            return view('api_error', ['error' => $e->getMessage()]);
        }


    }

    public function crearProducto(Request $request){
        $cliente = new Client();
        $apiUrl = 'http://127.0.0.1:8091/api/producto/crear';
     
        try {
            
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
   
   $client = new Client();

   
   $apiUrl = "http://127.0.0.1:8091/api/producto/obtener/".$id;
  

   try {
       
       $response = $client->get($apiUrl);
 
       
       $data = json_decode($response->getBody(), true);
      

       
       return view('verProductoAdmin', ['producto' => $data]);
   } catch (\Exception $e) {
       
       return view('api_error', ['error' => $e->getMessage()]);
   }
    }
}

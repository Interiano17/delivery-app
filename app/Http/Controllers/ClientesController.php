<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ClientesController extends Controller
{
    
    public function mostrarClientesAdmin(){
        // Create a new Guzzle client instance
        $client = new Client();

        // API endpoint URL with your desired location and units (e.g., London, Metric units)
        $apiUrl = "http://127.0.0.1:8091/api/persona/clientes/todos";

        try {
            // Make a GET request to the API
            $response = $client->get($apiUrl);

            // Get the response body as an array
            $data = json_decode($response->getBody(), true);

            // Handle the retrieved weather data as needed (e.g., pass it to a view)
            return view('clientes', ['clientes' => $data]);
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('api_error', ['error' => $e->getMessage()]);
        }


    }

    //metodo para crear nuevos clientes

    public function crearCliente(Request $request){

        //crear una nueva instancia Guzzle client
        $cliente = new Client();

       try {
        //code...
        $response = $cliente->post('http://127.0.0.1:8091/api/persona/crear',['json'=>[
            'dni'=>$request->dni,
            'primerNombre'=>$request->primerNombre,          
              'segundoNombre'=>$request->segundoNombre,
              'primerApellido'=>$request->primerApellido,
              'segundoApellido'=>$request->segundoApellido,
              'telefono'=>$request->telefono,
              'correo'=>$request->correo,
            'usuario'=>[
                'nombre'=>$request->nombreUsuario,
                'contrasenia'=>$request->contrasenia,                
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
            return redirect(route('comercios.mostrar'));
            }

            return redirect(Route('nuevo.cliente'));

       } catch (\Exception $e) {
        
        return view('api_error', ['error' => $e->getMessage()]);
       } 


    }

}

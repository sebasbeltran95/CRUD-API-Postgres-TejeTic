<?php

namespace App\Http\Controllers;

use App\Models\historial;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function index(){
        try {
            $historiales = historial::all();
    
            return response()->json([
                'success' => true,
                'data' => $historiales
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al obtener los historiales',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Request $request){
        try {
            $historiales = Historial::where('id',$request->id)->get();
    
            return response()->json([
                'success' => true,
                'data' => $historiales
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al obtener los historiales',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(){
        // esta linea lee el array que le mando || trae el ultimo campo insertado
        $data = json_decode(file_get_contents("php://input"), true); 
        // incializo lista en array 
        $lista = array();
        // el foreach toma la data que le manda data y lo inserta luego lo mete dentro de lista =  array() y ya lo mostraria con el return
        foreach($data as $item){
            $historial = new Historial();
            $historial->nombre_completo = $item['nombre_completo'];
            $historial->edad = $item['edad'];
            $historial->save();
            array_push($lista, $historial);
        }
        return $lista;
    }

    public function update(){
        // esta linea lee el array que le mando || trae el ultimo campo insertado
        $data = json_decode(file_get_contents("php://input"), true); 
            // incializo lista en array 
        $lista = array();
        // este foreach me va a isnertar los items del array que lee stoy mandando 
        foreach($data as $item){
            $historial = Historial::findOrFail($item['id']);
            $historial->nombre_completo =  $item['nombre_completo'];
            $historial->edad =  $item['edad'];
            $historial->save();
            array_push($lista, $historial); 

        }
        return $lista;
    }

    public function delete(Request $request){
        try {
            $historiales = Historial::where('id',$request->id)->first()->delete();
            
            return response()->json([
                'success' => true,
                'data' => $historiales
            ], 200);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error al obtener los historiales',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

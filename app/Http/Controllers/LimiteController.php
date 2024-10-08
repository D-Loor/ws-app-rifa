<?php

namespace App\Http\Controllers;

use App\Models\Limite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LimiteController extends Controller
{
    protected $reglasValidacion = [
        'cifras' => 'required|numeric',
        'valor' => 'required|numeric'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response = Limite::get();
            if ($response) {
                return response()->json(['result' => $response, 'code' => '200']);
            } else
                return response()->json(['result' => "No hay registros", 'code' => '204']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $reglasEspecificas = $this->reglasValidacion;
            $reglasEspecificas['cifras'] = 'required|numeric|unique:limites,cifras';
            $validator = Validator::make($request->all(), $reglasEspecificas);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'code' => '400']);
            }

            $data = new Limite();
            $data->fill($request->all());
            $data->save();

            return response()->json(['result' => "Dato Registrado", 'code' => '200']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Limite  $limite
     * @return \Illuminate\Http\Response
     */
    public function show(Limite $limite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Limite  $limite
     * @return \Illuminate\Http\Response
     */
    public function edit(Limite $limite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Limite  $limite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Limite $limite)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer|exists:limites,id',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors(), 'code' => '400']);
            }

            $data = Limite::find($request->id);
            $data->fill($request->all());
            $data->update();
            return response()->json(['result' => "Dato Actualizado", 'code' => '200']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Limite  $limite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Limite $limite)
    {
        try {
            $response = Limite::find($limite->id);
            if ($response) {
                $response->delete();
                return response()->json(['result' => "Dato Eliminado", 'code' => '200']);
            }
            return response()->json(['result' => "Registro no encontrado", 'code' => '404']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'code' => '500']);
        }
    }
}

<?php

namespace Modules\Races\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Races\Models\Races;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Races\Http\Requests\RacesValidateRequest;

class RacesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        try {
            $races = Races::where('status', true)->get();
            if ($races) {
                $response = [
                    "message" => "Listado generado con exito",
                    "data" => $races
                ];
            } else {
                $response = [
                    "message" => "No hay razas activas",
                    "data" => $races
                ];
            }
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Store a newly created resource in storage.
     * @param RacesValidateRequest  $request
     * @return Renderable
     */
    public function store(RacesValidateRequest $request, Races $races)
    {
        try {
            $veryify = Races::where('name', 'like', '%' . $request->name . '%')->exist();
            if ($veryify) {
                $response = [
                    "message" => "Esta raza ya se encuentra creada",
                    "data" => $request->name
                ];
            } else {
                $races->name          = $request->name;
                $races->status        = $request->status;
                $races->save();
                $response = [
                    "message" => "La raza fue creada con exito",
                    "data" => $races
                ];
            }
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        try {
            $races = Races::findOrFail($id);
            return response()->json(["message" => "Raza encontrada", "data" => $races], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => "Error al buscar la raza con el id", "data" => $id], 400);
            throw $th;
        }
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(RacesValidateRequest $request)
    {
        try {
            $verify = Races::find($request->id);
            if ($verify) {
                $update = Races::where('id', $request->id)->update([
                    "name"          => $request->name,
                    "status"        => $request->status
                ]);
                $response = [
                    "message" => "Datos de la raza actualizado con exito",
                    "data"    => $update
                ];
            } else {
                $response = [
                    "message" => "Error al actualizar los datos de la raza",
                    "data"    => $verify
                ];
            }
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $verify = Races::find($id);
        if ($verify) {
            $destroy = Races::where('id', $id)->update([
                "status" => false
            ]);
            $response = [
                "message" => "Raza eliminada con exito del sistema",
                "data"    => $destroy
            ];
        } else {
            $response = [
                "message" => "Error al eliminar la raza del sistema",
                "data"    => $verify
            ];
        }
        return response()->json($response, 200);
    }
}

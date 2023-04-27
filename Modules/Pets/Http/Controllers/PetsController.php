<?php

namespace Modules\Pets\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Pets\Models\Pets;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Pets\Http\Requests\PetsValidateRequest;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        try {
            $pets = Pets::with('cliente')->get();
            $response=[
                "message"=>"Listado de mascotas generado con exito",
                "data"=>$pets
            ];
            return response($response,200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param PetsValidateRequest $request
     * @return Renderable
     */
    public function store(PetsValidateRequest $request, Pets $pets)
    {
        try {
            $verify = Pets::where('client_id',$request->client_id)->where('name','like', '%' . $request->name . '%')->first();
            if ($verify) {
                $response=[
                    "message"=> "La mascota ya se encuentra registrada",
                    "data"=> $verify
                ];
            }else {
               $pets->name          = $request->name;
               $pets->age           = $request->age;
               $pets->client_id     = $request->client_id;
               $pets->race          = $request->race;
               $pets->species       = $request->species;
               $pets->sex           = $request->sex;
               $pets->registered_by = $request->registered_by;
               $pets->status        = $request->status;
               $pets->save();
                $response=[
                    "message"=> "Mascota registrada con exito",
                    "data"=> $pets
                ];
            }
            return response()->json($response,200);
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
            if ($id) {
                $pets = Pets::with('cliente')->find($id);
                $response= [
                    "message"=>"Mascota encontrada",
                    "data"=>$pets
                ];
            }else {
                $response=[
                    "message"=>"Error al buscar la mascota con el id",
                    "data"=> $id
                ];
            }
            return response()->json($response,200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     * @param PetsValidateRequest $request
     * @return Renderable
     */
    public function update(PetsValidateRequest $request )
    {
        try {
            $verify = Pets::find($request->id);
            if ($verify) {
                $update = Pets::where('id',$request->id)->update([
                    "name"          =>$request->name,
                    "age"           =>$request->age,
                    "client_id"     =>$request->client_id,
                    "race"          =>$request->race,
                    "species"       =>$request->species,
                    "sex"           =>$request->sex,
                    "registered_by" =>$request->registered_by,
                    "status"        =>$request->status
                ]);
                $response= [
                    "message" => "Datos de la mascota actualizado con exito",
                    "data"    => $update
                ];
            }else {
                $response= [
                    "message" => "Error al actualizar los datos de la mascota",
                    "data"    => $verify
                ];
            }
            return response()->json($response,200);
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
        $verify = Pets::find($id);
        if ($verify) {
            $destroy=Pets::where('id',$id)->update([
                "status"=> false
            ]);
            $response= [
                "message" => "Mascota eliminada con exito del sistema",
                "data"    => $destroy
            ];
        }else {
            $response= [
                "message" => "Error al eliminar la mascota del sistema",
                "data"    => $verify
            ];
        }
        return response()->json($response,200);
    }
}

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
            $pets = Pets::all();
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
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('pets::create');
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
               $pets->name      = $request->name;
               $pets->age       = $request->age;
               $pets->client_id = $request->client_id;
               $pets->status    = $request->status;
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
        return view('pets::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('pets::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}

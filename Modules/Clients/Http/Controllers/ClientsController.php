<?php

namespace Modules\Clients\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Clients\Models\Clients;
use Illuminate\Contracts\Support\Renderable;
use Modules\Clients\Http\Requests\ClientsValidateRequest;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        try {
            $list = Clients::all();
            $response = [
                "message" => "Listado de clientes cargado con exito",
                "data"    => $list
            ];
            return response()->json($response,200);
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
        return view('clients::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param ClientsValidateRequest $request
     * @return Renderable
     */
    public function store(ClientsValidateRequest $request, Clients $client)
    {
        try {
            $verify = $client::where('email', $request->email)->first();
            if ($verify) {
                $response = [
                    "message" => "El email ya se encuentra registrado",
                    "data"    => $verify
                ];
            }else {
                $client->name      = $request->name;
                $client->last_name = $request->last_name;
                $client->cellphone = $request->cellphone;
                $client->address   = $request->address;
                $client->email     = $request->email;
                $client->status    = $request->status;
                $client->save();
                $response = [
                    "message" => "Usuario creado con exito",
                    "data"    => $client
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
        return "Hola mundo";
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id, Clients $client)
    {
        // return $id
        try {
            $verify = $client::find($id);
            $response= [
                "message" => "Usuario encontrado con exito",
                "data"    => $verify
            ];
            return response()->json($response,200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     * @param ClientsValidateRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(ClientsValidateRequest $request)
    {
        try {
            $verify = Clients::find($request->id);
            if ($verify) {
                $update=Clients::where('id',$request->id)->update([
                    "name"=>$request->name,
                    "last_name"=>$request->last_name,
                    "cellphone"=>$request->cellphone,
                    "address"=>$request->address,
                    "email"=>$request->email,
                    "status"=>$request->status
                ]);
                $response= [
                    "message" => "Usuario actualizado con exito",
                    "data"    => $update
                ];
            }else {
                $response= [
                    "message" => "Error al actualizar usuario",
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
        $verify = Clients::find($id);
        if ($verify) {
            $destroy=Clients::where('id',$id)->update([
                "status"=> false
            ]);
            $response= [
                "message" => "Usuario eliminado con exito",
                "data"    => $destroy
            ];
        }else {
            $response= [
                "message" => "Error al eliminar usuario",
                "data"    => $verify
            ];
        }
        return response()->json($response,200);
    }
}

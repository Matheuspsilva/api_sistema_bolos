<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoBoloRequest;
use App\Models\TipoBolo;
use Illuminate\Http\Request;
use App\Api\ApiMessages;

class TipoBoloController extends Controller
{

    private $tipo_bolo;

    public function __construct(TipoBolo $tipo_bolo)
    {
        $this->tipo_bolo = $tipo_bolo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_bolos = $this->tipo_bolo->paginate('10');
        return response()->json($tipo_bolos, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TipoBoloRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipoBoloRequest $request)
    {
        $data = $request->all();

        try {
            $tipo_bolo = $this->tipo_bolo->create($data);

            return response()->json(['data' => [
                'msg' => 'O tipo de bolo foi cadastrado com sucesso '
                ]
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
		    return response()->json($message->getMessage(), 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $tipo_bolo = $this->tipo_bolo->findOrFail($id);

            return response()->json(['data' => [
                'data' => $tipo_bolo
                ]
            ], 200);
        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
		    return response()->json($message->getMessage(), 401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TipoBoloRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->all();

        try {

            $tipo_bolo = $this->tipo_bolo->findOrFail($id);
            $tipo_bolo->update($data);

            return response()->json(['data' => [
                'msg' => 'O tipo de bolo foi atualizado com sucesso '
                ]
            ], 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
		    return response()->json($message->getMessage(), 401);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $tipo_bolo = $this->tipo_bolo->findOrFail($id);
            $tipo_bolo->delete();

            return response()->json(['data' => [
                'msg' => 'O tipo de bolo foi removido com sucesso ']
            ]
            , 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
		    return response()->json($message->getMessage(), 401);
        }
    }
}

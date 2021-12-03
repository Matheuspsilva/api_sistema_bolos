<?php

namespace App\Http\Controllers;

use App\Api\ApiMessages;
use App\Http\Requests\BoloRequest;
use App\Models\Bolo;
use Illuminate\Http\Request;

class BoloController extends Controller
{

    private $bolo;

    public function __construct(Bolo $bolo)
    {
        $this->bolo = $bolo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bolos = $this->bolo->paginate('10');
        return response()->json($bolos, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoloRequest $request)
    {
        $data = $request->all();

        try {
            $bolo = $this->bolo->create($data);

            return response()->json(['data' => [
                'msg' => 'O bolo foi cadastrado com sucesso '
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
            $bolo = $this->bolo->findOrFail($id);

            return response()->json(['data' => [
                'data' => $bolo
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        try {

            $bolo = $this->bolo->findOrFail($id);
            $bolo->update($data);

            return response()->json(['data' => [
                'msg' => 'O bolo foi atualizado com sucesso '
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

            $bolo = $this->bolo->findOrFail($id);
            $bolo->delete();

            return response()->json(['data' => [
                'msg' => 'O bolo foi removido com sucesso ']
            ]
            , 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
		    return response()->json($message->getMessage(), 401);
        }
    }
}

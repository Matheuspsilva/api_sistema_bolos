<?php

namespace App\Http\Controllers;

use App\Api\ApiMessages;
use App\Http\Requests\ListaInteresseRequest;
use App\Mail\ListaInteresseMail;
use App\Models\ListaInteresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ListaInteresseController extends Controller
{
    private $lista_interesse;

    public function __construct(ListaInteresse $lista_interesse)
    {
        $this->lista_interesse = $lista_interesse;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista_interesses = $this->lista_interesse->paginate('10');
        return response()->json($lista_interesses, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListaInteresseRequest $request)
    {
        $data = $request->all();

        try {
            $lista_interesse = $this->lista_interesse->create($data);

            \App\Jobs\ListaInteresseMail::dispatch($lista_interesse);

            return response()->json(['data' => [
                'msg' => 'A lista de interesse foi cadastrado com sucesso'
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
            $lista_interesse = $this->lista_interesse->findOrFail($id);

            return response()->json(['data' => [
                'data' => $lista_interesse
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

            $lista_interesse = $this->lista_interesse->findOrFail($id);
            $lista_interesse->update($data);

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

            $lista_interesse = $this->lista_interesse->findOrFail($id);
            $lista_interesse->delete();

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

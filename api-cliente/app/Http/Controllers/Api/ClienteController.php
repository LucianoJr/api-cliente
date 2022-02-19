<?php

namespace App\Http\Controllers\Api;

use App\Cliente;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ClienteController extends Controller
{
    private $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index()
    {
        return response()->json($this->cliente->paginate(10));
    }

    public function show($id)
    {
        $cliente = $this->cliente->find($id);

        if (! $cliente) return response()->json(['mensagem' => ['Cliente não encontrado!']], 404);
      	$data = ['data' => $cliente];
	    return response()->json($data);
    }

    public function store(Request $request)
    {
        try{

            $clienteData = $request->all();
			$this->cliente->create($clienteData);

			$return = ['data' => ['mensagem' => 'Cliente cadastrado com sucesso!']];
			return response()->json($return, 201);

        }catch (\Exception $e) {

            if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao salvar registro', 1010),  500);
        }
        
    }

    public function update(Request $request, $id)
    {
        try{

            $clienteData = $request->all();
			$cliente = $this->cliente->find($id);
            $cliente->update($clienteData);

			$return = ['data' => ['mensagem' => 'Cliente atualizado com sucesso!']];
			return response()->json($return, 201);

        }catch (\Exception $e) {

            if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1011), 500);
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar a atualização', 1011),  500);
        }
        
    }

    public function delete(Cliente $id)
    {
        try{
            $id->delete();
            return response()->json(['data' => ['mensagem' => 'Cliente ' . $id->Nome . ' excluído com sucesso!']], 200);

        }catch (\Exception $e) {

            if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1012), 500);
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar exclusão do registro', 1012),  500);
        }
    }

    public function showbyPlaca($numero)
    {
        $final = Str::substr();
        $cliente = $this->cliente->find($final);

        if (! $cliente) return response()->json(['mensagem' => ['Cliente não encontrado!']], 404);
      	$data = ['data' => $cliente];
	    return response()->json($data);
    }
}

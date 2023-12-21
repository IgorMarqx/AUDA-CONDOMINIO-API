<?php

namespace App\Http\Controllers\condominium;

use App\Http\Controllers\Controller;
use App\Http\Requests\condominium\CondominiumCreateRequest;
use App\Http\Resources\GlobalResource;
use App\Services\condominium\CondominiumService;
use Exception;
use Illuminate\Http\Request;

class CondominiumController extends Controller
{
    public function __construct(private CondominiumService $condominiumService)
    {
        $this->condominiumService = $condominiumService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): GlobalResource
    {
        $condominium = $this->condominiumService->getAll();

        try{
            return new GlobalResource(['error' => false, 'message' => $condominium], 200);
        } catch (\Exception $e) {
            throw new Exception('Error to get condominium' . $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CondominiumCreateRequest $request): GlobalResource
    {
        $this->condominiumService->createCondominium($request);

        try {
            return new GlobalResource(['error' => false, 'message' => 'Condominio criado com sucesso'], 201);
        }catch (Exception $e) {
            throw new Exception('Error to create condominium' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $condominium = $this->condominiumService->getCondominiumById($id);

        if(!$condominium){
            return new GlobalResource(['error' => true, 'message' => 'Condominio não encontrado'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RealState;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RealStateController extends Controller
{

    /**
     * @var RealState
     * @type RealState
     */
    private RealState $realState;

    /**
     * @param RealState $realState
     */
    public function __construct(RealState $realState)
    {
        $this->realState = $realState;
    }

    public function index(): JsonResponse
    {
        $realState = $this->realState->paginate('10');

        return response()->json($realState, 200);
    }

    public function show(int $id): JsonResponse
    {
        try {
            $realState = $this->realState->findOrFail($id);

            return response()->json([
                'date' => [
                    'data' => $realState
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $this->realState->create($request->toArray());

            return response()->json([
                'date' => [
                    'msg' => 'Imóvel cadastrado com sucesso!'
                ]
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function update(int $id, Request $request): JsonResponse
    {
        try {
            $realState = $this->realState->findOrFail($id);

            $realState->update($request->toArray());

            return response()->json([
                'date' => [
                    'msg' => 'Imóvel atualizado com sucesso!'
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->realState->findOrFail($id)->delete();

            return response()->json([
                'date' => [
                    'msg' => 'Imóvel excluído com sucesso!'
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}

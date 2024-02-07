<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BeneficiaryRequest;
use App\Http\Resources\BeneficiaryResource;
use App\Models\Beneficiary;
use Illuminate\Http\JsonResponse;

class BeneficiaryController extends Controller
{
    public function index()
    {
        $beneficiaries = BeneficiaryResource::collection(Beneficiary::latest()->get());

        if ($beneficiaries->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No se encontraron beneficiarios.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Beneficiarios encontrados exitosamente.',
            'data' => $beneficiaries,
        ], 200);
    }

    public function store(BeneficiaryRequest $request)
    {
        $beneficiary = Beneficiary::create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Beneficiario creado exitosamente.',
            'data' => new BeneficiaryResource($beneficiary),
        ], 201);
    }

    public function update(BeneficiaryRequest $request, Beneficiary $beneficiary)
    {
        if (is_null($beneficiary)) {
            return response()->json([
                'status' => 'failed',
                'message' => '¡No se ha encontrado el beneficiario indicado!',
            ], 404);
        }

        $beneficiary->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => '¡Se ha actualizado exitosamente el beneficiario!',
            'data' => new BeneficiaryResource($beneficiary),
        ], 200);
    }

    public function destroy(Beneficiary $beneficiary)
    {
        if (is_null($beneficiary)) {
            return response()->json([
                'status' => 'failed',
                'message' => '¡No se ha encontrado el beneficiario indicado!',
            ], 404);
        }

        $beneficiary->delete();

        return response()->json([
            'status' => 'success',
            'message' => '¡Beneficiario eliminado exitosamente!',
            'data' => null,
        ], 200);
    }

    public function error()
    {
        return response()->json([
            'status' => 'error',
            'message' => 'Ha ocurrido un error.',
        ], 400);
    }
}

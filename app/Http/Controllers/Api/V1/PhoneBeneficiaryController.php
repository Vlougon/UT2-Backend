<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\PhoneBeneficiary;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PhoneBeneficiaryRequest;
use App\Http\Resources\PhoneBeneficiaryResource;
use Illuminate\Http\Request;

class PhoneBeneficiaryController extends Controller
{
    public function index()
    {
        $phoneBeneficiaries = PhoneBeneficiaryResource::collection(PhoneBeneficiary::all());

        if ($phoneBeneficiaries->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No se encontraron teléfonos para este beneficiario.',
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Teléfonos de Beneficiario obtenidos correctamente.',
            'data' => $phoneBeneficiaries,
        ], 200);
    }

    public function store(PhoneBeneficiaryRequest $request)
    {
        $phoneBeneficiary = PhoneBeneficiary::create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario creado exitosamente.',
            'data' => new PhoneBeneficiaryResource($phoneBeneficiary),
        ], 201);
    }

    public function update(PhoneBeneficiaryRequest $request, PhoneBeneficiary $phoneBeneficiary)
    {
        $phoneBeneficiary->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Teléfono de Beneficiario actualizado correctamente.',
            'data' => $phoneBeneficiary,
        ], 200);
    }

    public function destroy(PhoneBeneficiary $phoneBeneficiary)
    {
        $phoneBeneficiary->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Teléfono de Beneficiario eliminado correctamente.',
            'data' => null,
        ], 200);
    }

    public function error(Request $request)
    {
        return response()->json([
            'status' => 'error',
            'message' => 'Ha ocurrido un error.',
        ], 400);
    }
}

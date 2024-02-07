<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MedicalDataRequest;
use App\Http\Resources\MedicalDataResource;
use App\Models\MedicalData;
use Illuminate\Http\Request;

class MedicalDataController extends Controller
{
    public function index()
    {
        $medicalData = MedicalDataResource::collection(MedicalData::all());

        if ($medicalData->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No se encontraron datos médicos.',
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Datos médicos obtenidos correctamente.',
            'data' => $medicalData,
        ], 200);
    }

    public function update(MedicalDataRequest $request, MedicalData $medicalDatum)
    {
        $medicalDatum->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Datos médicos actualizados correctamente.',
            'data' => $medicalDatum,
        ], 200);
    }

    public function destroy(MedicalData $medicalDatum)
    {
        $medicalDatum->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Datos médicos eliminados correctamente.',
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

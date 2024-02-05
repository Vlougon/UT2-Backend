<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MedicalDataControllerStoreRequest;
use App\Models\MedicalData;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MedicalDataController extends Controller
{
    public function index(Request $request): Response
    {
        $medicalData = MedicalDatum::all();

        return response()->noContent(200);
    }

    public function create(Request $request): Response
    {
        return response()->noContent(200);
    }

    public function store(MedicalDataControllerStoreRequest $request): Response
    {
        $medicalData = MedicalData::create($request->validated());

        return response()->noContent(201);
    }

    public function show(Request $request, MedicalDatum $medicalDatum): Response
    {
        return response()->noContent(200);
    }

    public function edit(Request $request, MedicalDatum $medicalDatum): Response
    {
        return response()->noContent(200);
    }

    public function update(Request $request, MedicalDatum $medicalDatum): Response
    {
        $medicalData->update([]);

        return response()->noContent(200);
    }

    public function destroy(Request $request, MedicalDatum $medicalDatum): Response
    {
        $medicalData->delete();

        return response()->noContent();
    }
}

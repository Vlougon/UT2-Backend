<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BeneficiaryRequest;
use App\Models\Beneficiary;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BeneficiaryController extends Controller
{
    public function index(Request $request): Response
    {
        $beneficiaries = Beneficiary::all();

        return response()->noContent(200);
    }

    public function create(Request $request): Response
    {
        return response()->noContent(200);
    }

    public function store(BeneficiaryRequest $request): Response
    {
        $beneficiary = Beneficiary::create($request->validated());

        return response()->noContent(201);
    }

    public function show(Request $request, Beneficiary $beneficiary): Response
    {
        return response()->noContent(200);
    }

    public function edit(Request $request, Beneficiary $beneficiary): Response
    {
        return response()->noContent(200);
    }

    public function update(BeneficiaryRequest $request, Beneficiary $beneficiary): Response
    {
        $beneficiary->update($request->validated());

        return response()->noContent(200);
    }

    public function destroy(Request $request, Beneficiary $beneficiary): Response
    {
        $beneficiary->delete();

        return response()->noContent();
    }

    public function error(Request $request): Response
    {
        return response()->noContent(400);
    }
}

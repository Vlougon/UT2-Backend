<?php

namespace App\Http\Controllers\Api;

use App\Api\PhoneBeneficiary;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PhoneBeneficiaryControllerStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PhoneBeneficiaryController extends Controller
{
    public function index(Request $request): Response
    {
        $phoneBeneficiaries = PhoneBeneficiary::all();

        return response()->noContent(200);
    }

    public function create(Request $request): Response
    {
        return response()->noContent(200);
    }

    public function store(PhoneBeneficiaryControllerStoreRequest $request): Response
    {
        $phoneBeneficiary = PhoneBeneficiary::create($request->validated());

        return response()->noContent(201);
    }

    public function show(Request $request, PhoneBeneficiary $phoneBeneficiary): Response
    {
        return response()->noContent(200);
    }

    public function edit(Request $request, PhoneBeneficiary $phoneBeneficiary): Response
    {
        return response()->noContent(200);
    }

    public function update(Request $request, PhoneBeneficiary $phoneBeneficiary): Response
    {
        $phoneBeneficiary->update([]);

        return response()->noContent(200);
    }

    public function destroy(Request $request, PhoneBeneficiary $phoneBeneficiary): Response
    {
        $phoneBeneficiary->delete();

        return response()->noContent();
    }

    public function error(Request $request): Response
    {
        return response()->noContent(400);
    }
}

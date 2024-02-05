<?php

namespace App\Http\Controllers\Api;

use App\Api\PhoneUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PhoneUserControllerStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PhoneUserController extends Controller
{
    public function index(Request $request): Response
    {
        $phoneUsers = PhoneUser::all();

        return response()->noContent(200);
    }

    public function create(Request $request): Response
    {
        return response()->noContent(200);
    }

    public function store(PhoneUserControllerStoreRequest $request): Response
    {
        $phoneUser = PhoneUser::create($request->validated());

        return response()->noContent(201);
    }

    public function show(Request $request, PhoneUser $phoneUser): Response
    {
        return response()->noContent(200);
    }

    public function edit(Request $request, PhoneUser $phoneUser): Response
    {
        return response()->noContent(200);
    }

    public function update(Request $request, PhoneUser $phoneUser): Response
    {
        $phoneUser->update([]);

        return response()->noContent(200);
    }

    public function destroy(Request $request, PhoneUser $phoneUser): Response
    {
        $phoneUser->delete();

        return response()->noContent();
    }

    public function error(Request $request): Response
    {
        return response()->noContent(400);
    }
}

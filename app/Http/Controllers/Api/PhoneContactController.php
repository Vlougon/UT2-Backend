<?php

namespace App\Http\Controllers\Api;

use App\Api\PhoneContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PhoneContactControllerStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PhoneContactController extends Controller
{
    public function index(Request $request): Response
    {
        $phoneContacts = PhoneContact::all();

        return response()->noContent(200);
    }

    public function create(Request $request): Response
    {
        return response()->noContent(200);
    }

    public function store(PhoneContactControllerStoreRequest $request): Response
    {
        $phoneContact = PhoneContact::create($request->validated());

        return response()->noContent(201);
    }

    public function show(Request $request, PhoneContact $phoneContact): Response
    {
        return response()->noContent(200);
    }

    public function edit(Request $request, PhoneContact $phoneContact): Response
    {
        return response()->noContent(200);
    }

    public function update(Request $request, PhoneContact $phoneContact): Response
    {
        $phoneContact->update([]);

        return response()->noContent(200);
    }

    public function destroy(Request $request, PhoneContact $phoneContact): Response
    {
        $phoneContact->delete();

        return response()->noContent();
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContactControllerStoreRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    public function index(Request $request): Response
    {
        $contacts = Contact::all();

        return response()->noContent(200);
    }

    public function create(Request $request): Response
    {
        return response()->noContent(200);
    }

    public function store(ContactControllerStoreRequest $request): Response
    {
        $contact = Contact::create($request->validated());

        return response()->noContent(201);
    }

    public function show(Request $request, Contact $contact): Response
    {
        return response()->noContent(200);
    }

    public function edit(Request $request, Contact $contact): Response
    {
        return response()->noContent(200);
    }

    public function update(Request $request, Contact $contact): Response
    {
        $contact->update([]);

        return response()->noContent(200);
    }

    public function destroy(Request $request, Contact $contact): Response
    {
        $contact->delete();

        return response()->noContent();
    }
}

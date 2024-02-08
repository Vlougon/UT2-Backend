<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = ContactResource::collection(Contact::all());

        if ($contacts->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No se encontraron contactos.',
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Contactos obtenidos correctamente.',
            'data' => $contacts,
        ], 200);
    }

    public function store(ContactRequest $request)
    {
        $contact = Contact::create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario creado exitosamente.',
            'data' => new ContactResource($contact),
        ], 201);
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Contacto actualizado correctamente.',
            'data' => $contact,
        ], 200);
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Contacto eliminado correctamente.',
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

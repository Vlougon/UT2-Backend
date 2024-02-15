<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BeneficiaryContactRequest;
use App\Http\Resources\BeneficiaryContactResource;
use App\Models\BeneficiaryContact;

class BeneficiaryContactController extends Controller
{
    public function index()
    {
        $contacts = BeneficiaryContactResource::collection(BeneficiaryContact::all());

        if ($contacts->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No se encontraron contactos de beneficiarios.',
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Contactos de beneficiarios obtenidos exitosamente.',
            'data' => $contacts,
        ], 200);
    }

    public function store(BeneficiaryContactRequest $request)
    {
        $contact = BeneficiaryContact::create($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Contacto de beneficiario creado exitosamente.',
            'data' => new BeneficiaryContactResource($contact),
        ], 201);
    }

    
    public function show(BeneficiaryContact $contact)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Contacto de beneficiario obtenido correctamente.',
            'data' => new BeneficiaryContactResource($contact),
        ], 200);
    }

    public function update(BeneficiaryContactRequest $request, BeneficiaryContact $contact)
    {
        $contact->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Contacto de beneficiario actualizado correctamente.',
            'data' => new BeneficiaryContactResource($contact),
        ], 200);
    }

    public function destroy(BeneficiaryContact $contact)
    {
        $contact->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Contacto de beneficiario eliminado correctamente.',
            'data' => null,
        ], 200);
    }
}

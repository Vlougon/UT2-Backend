<?php

namespace App\Http\Controllers\Api;

use App\Models\PhoneContact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PhoneContactRequest;
use App\Http\Resources\PhoneContactResource;
use Illuminate\Http\Request;

class PhoneContactController extends Controller
{
    public function index()
    {
        $phoneContacts = PhoneContactResource::collection(PhoneContact::all());

        if ($phoneContacts->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No se encontraron contactos de teléfono.',
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Contactos de teléfono obtenidos correctamente.',
            'data' => $phoneContacts,
        ], 200);
    }

    public function update(PhoneContactRequest $request, PhoneContact $phoneContact)
    {
        $phoneContact->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Contacto de teléfono actualizado correctamente.',
            'data' => $phoneContact,
        ], 200);
    }

    public function destroy(PhoneContact $phoneContact)
    {
        $phoneContact->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Contacto de teléfono eliminado correctamente.',
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

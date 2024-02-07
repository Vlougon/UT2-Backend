<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = AddressResource::collection(Address::latest()->get());

        if ($addresses->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No se encontraron direcciones.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Direcciones encontradas exitosamente.',
            'data' => $addresses,
        ], 200);
    }

    public function store(AddressRequest $request)
    {
        $address = Address::create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Dirección creada exitosamente.',
            'data' => new AddressResource($address),
        ], 201);
    }

    public function update(AddressRequest $request, Address $address)
    {
        if (is_null($address)) {
            return response()->json([
                'status' => 'failed',
                'message' => '¡No se ha encontrado la dirección indicada!',
            ], 404);
        }

        $address->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => '¡Se ha actualizado exitosamente la dirección!',
            'data' => new AddressResource($address),
        ], 200);
    }

    public function destroy(Address $address)
    {
        if (is_null($address)) {
            return response()->json([
                'status' => 'failed',
                'message' => '¡No se ha encontrado la dirección indicada!',
            ], 404);
        }

        $address->delete();

        return response()->json([
            'status' => 'success',
            'message' => '¡Dirección eliminada exitosamente!',
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


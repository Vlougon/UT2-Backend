<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddressRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AddressController extends Controller
{
    public function index(): Response
    {
        $addresses = Address::all();

        return response()->noContent(200);
    }

    public function create(Request $request): Response
    {
        return response()->noContent(200);
    }

    public function store(AddressRequest $request)
    {
        $address = Address::create($request->validated());

        $response = [
            'status' => 'success',
            'message' => '¡Se ha encontrado el User!',
            'data' => $address,
        ];

        return response()->json($response, 200);
    }

    public function show(Request $request, Address $address): Response
    {
        return response()->noContent(200);
    }

    public function edit(Request $request, Address $address): Response
    {
        return response()->noContent(200);
    }

    public function update(AddressRequest $request, Address $address)
    {

        if (is_null($address)) {
            return response()->json([
                'status' => 'failed',
                'message' => '¡No se ha encontrado el usuario Indicado!',
            ], 200);
        }

        $address->update($request->validated());

        $response = [
            'status' => 'success',
            'message' => '¡Se ha actualizado exitosamente el Usuario!',
            'data' => new Address($address),
        ];

        return response()->json($response, 200);
    }

    public function destroy(Request $request, Address $address): Response
    {
        $address->delete();

        return response()->noContent();
    }
}

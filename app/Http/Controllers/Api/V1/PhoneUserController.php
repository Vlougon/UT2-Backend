<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\PhoneUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PhoneUserRequest;
use App\Http\Resources\PhoneUserResource;

class PhoneUserController extends Controller
{
    public function index()
    {
        $phoneUsers = PhoneUserResource::collection(PhoneUser::all());

        if ($phoneUsers->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No se encontraron teléfonos para este usuario.',
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Los teléfono del usuario se han obtenidos correctamente.',
            'data' => $phoneUsers,
        ], 200);
    }

    public function store(PhoneUserRequest $request)
    {
        $phoneUser = PhoneUser::create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario creado exitosamente.',
            'data' => new PhoneUserResource($phoneUser),
        ], 201);
    }

    public function update(PhoneUserRequest $request, PhoneUser $phoneUser)
    {
        $phoneUser->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Teléfono usuario actualizado correctamente.',
            'data' => $phoneUser,
        ], 200);
    }

    public function destroy(PhoneUser $phoneUser)
    {
        $phoneUser->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Teléfono usuario eliminado correctamente.',
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

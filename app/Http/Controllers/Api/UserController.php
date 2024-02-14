<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = UserResource::collection(User::latest()->get());

        if ($users->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No se encontraron usuarios.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Usuarios encontrados exitosamente.',
            'data' => $users,
        ], 200);
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario creado exitosamente.',
            'data' => new UserResource($user),
        ], 201);
    }

    public function show(User $user)
    {
        if (is_null($user)) {
            return response()->json([
                'status' => 'failed',
                'message' => '¡No se ha encontrado el Usuario!',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario creado exitosamente.',
            'data' => new UserResource($user),
        ], 201);
    }

    public function update(UserRequest $request, User $user)
    {
        if (is_null($user)) {
            return response()->json([
                'status' => 'failed',
                'message' => '¡No se ha encontrado el usuario indicado!',
            ], 404);
        }

        $user->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => '¡Usuario actualizado exitosamente!',
            'data' => new UserResource($user),
        ], 200);
    }

    public function destroy(User $user)
    {
        if (is_null($user)) {
            return response()->json([
                'status' => 'failed',
                'message' => '¡No se ha encontrado el usuario indicado!',
            ], 404);
        }

        $user->delete();

        return response()->json([
            'status' => 'success',
            'message' => '¡Usuario eliminado exitosamente!',
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

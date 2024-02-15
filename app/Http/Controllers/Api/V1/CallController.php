<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CallRequest;
use App\Http\Resources\CallResource;
use App\Models\Call;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function index()
    {
        $calls = CallResource::collection(Call::latest()->get());

        if ($calls->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No se encontraron llamadas.',
                'data' => [],
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Llamadas encontradas exitosamente.',
            'data' => $calls,
        ], 200);
    }


    public function store(CallRequest $request)
    {
        $call = Call::create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Llamada creada exitosamente.',
            'data' => new CallResource($call),
        ], 201);
    }

    public function show(Call $call)
    {
        if (is_null($call)) {
            return response()->json([
                'status' => 'failed',
                'message' => '¡No se ha encontrado la llamada indicada!',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Llamada encontrada exitosamente.',
            'data' => new CallResource($call),
        ], 200);
    }

    public function update(CallRequest $request, Call $call)
    {
        if (is_null($call)) {
            return response()->json([
                'status' => 'failed',
                'message' => '¡No se ha encontrado la llamada indicada!',
            ], 404);
        }

        $call->update($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => '¡Llamada actualizada exitosamente!',
            'data' => new CallResource($call),
        ], 200);
    }

    public function destroy(Call $call)
    {
        if (is_null($call)) {
            return response()->json([
                'status' => 'failed',
                'message' => '¡No se ha encontrado la llamada indicada!',
            ], 404);
        }

        $call->delete();

        return response()->json([
            'status' => 'success',
            'message' => '¡Llamada eliminada exitosamente!',
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

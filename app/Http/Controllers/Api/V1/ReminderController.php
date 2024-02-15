<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ReminderRequest;
use App\Http\Resources\ReminderResource;
use App\Models\Reminder;

class ReminderController extends Controller
{
    public function index()
    {
        $reminders = ReminderResource::collection(Reminder::all());

        if ($reminders->isEmpty()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'No se encontraron recordatorios.',
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Recordatorios obtenidos correctamente.',
            'data' => $reminders,
        ], 200);
    }

    public function store(ReminderRequest $request)
    {
        $reminder = Reminder::create($request->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Usuario creado exitosamente.',
            'data' => new ReminderResource($reminder),
        ], 201);
    }

    public function update(ReminderRequest $request, Reminder $reminder)
    {
        $reminder->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Recordatorio actualizado correctamente.',
            'data' => new ReminderResource($reminder),
        ], 200);
    }

    public function destroy(Reminder $reminder)
    {
        $reminder->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Recordatorio eliminado correctamente.',
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

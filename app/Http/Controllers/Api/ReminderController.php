<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ReminderControllerStoreRequest;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReminderController extends Controller
{
    public function index(Request $request): Response
    {
        $reminders = Reminder::all();

        return response()->noContent(200);
    }

    public function create(Request $request): Response
    {
        return response()->noContent(200);
    }

    public function store(ReminderControllerStoreRequest $request): Response
    {
        $reminder = Reminder::create($request->validated());

        return response()->noContent(201);
    }

    public function show(Request $request, Reminder $reminder): Response
    {
        return response()->noContent(200);
    }

    public function edit(Request $request, Reminder $reminder): Response
    {
        return response()->noContent(200);
    }

    public function update(Request $request, Reminder $reminder): Response
    {
        $reminder->update([]);

        return response()->noContent(200);
    }

    public function destroy(Request $request, Reminder $reminder): Response
    {
        $reminder->delete();

        return response()->noContent();
    }
}

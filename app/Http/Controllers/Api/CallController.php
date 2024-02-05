<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CallControllerStoreRequest;
use App\Models\Call;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CallController extends Controller
{
    public function index(Request $request): Response
    {
        $calls = Call::all();

        return response()->noContent(200);
    }

    public function create(Request $request): Response
    {
        return response()->noContent(200);
    }

    public function store(CallControllerStoreRequest $request): Response
    {
        $call = Call::create($request->validated());

        return response()->noContent(201);
    }

    public function show(Request $request, Call $call): Response
    {
        return response()->noContent(200);
    }

    public function edit(Request $request, Call $call): Response
    {
        return response()->noContent(200);
    }

    public function update(Request $request, Call $call): Response
    {
        $call->update([]);

        return response()->noContent(200);
    }

    public function destroy(Request $request, Call $call): Response
    {
        $call->delete();

        return response()->noContent();
    }

    public function error(Request $request): Response
    {
        return response()->noContent(400);
    }
}

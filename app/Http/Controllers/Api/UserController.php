<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserControllerStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index(Request $request): Response
    {
        $users = User::all();

        return response()->noContent(200);
    }

    public function store(UserControllerStoreRequest $request): Response
    {
        $user = User::create($request->validated());

        return response()->noContent(201);
    }

    public function show(Request $request, User $user): Response
    {
        return response()->noContent(200);
    }

    public function edit(Request $request, User $user): Response
    {
        return response()->noContent(200);
    }

    public function update(Request $request, User $user): Response
    {
        $user->update([]);

        return response()->noContent(200);
    }

    public function destroy(Request $request, User $user): Response
    {
        $user->delete();

        return response()->noContent();
    }

    public function error(Request $request): Response
    {
        return response()->noContent(400);
    }
}

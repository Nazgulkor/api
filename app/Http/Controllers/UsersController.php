<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getUsers(Request $request)
    {
        return new UserCollection(User::with('car')->get());
    }

    public function getUser(Request $request)
    {
        try {
            return new UserResource(User::with('car')->findOrFail($request->id));
        } catch (Exception) {
            return response()->json(['message' => 'Юзер не найден'], 404);
        }
    }
}

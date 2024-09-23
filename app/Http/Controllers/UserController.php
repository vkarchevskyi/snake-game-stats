<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateUserAction;
use App\Http\Requests\CreateUserRequest;
use App\Http\Resources\UserWithTokenResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get(Request $request): User
    {
        return $request->user();
    }

    public function create(CreateUserRequest $request, CreateUserAction $createUserAction): UserWithTokenResource
    {
        $request->validate($request->rules());

        return $createUserAction->run($request->string('name')->toString());
    }
}

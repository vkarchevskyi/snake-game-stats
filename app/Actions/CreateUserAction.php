<?php

declare(strict_types=1);

namespace App\Actions;

use App\Http\Resources\UserWithTokenResource;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

readonly class CreateUserAction
{
    private const DEFAULT_PASSWORD_LENGTH = 12;

    public function run(string $name): UserWithTokenResource
    {
        return DB::transaction(
            function () use ($name): UserWithTokenResource {
                $user = User::query()->create([
                    'name' => $name,
                    'password' => Str::password(self::DEFAULT_PASSWORD_LENGTH),
                ]);

                $token = $user->createToken('app-token')->plainTextToken;

                return new UserWithTokenResource([
                    'user' => $user,
                    'token' => $token,
                ]);
            }
        );
    }
}

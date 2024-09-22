<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

readonly class CreateUserAction
{
    private const DEFAULT_PASSWORD_LENGTH = 12;

    public function run(string $name): User
    {
        return DB::transaction(
            fn (): User => User::query()->create([
                'name' => $name,
                'password' => Str::password(self::DEFAULT_PASSWORD_LENGTH),
            ])
        );
    }
}

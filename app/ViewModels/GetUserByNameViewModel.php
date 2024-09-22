<?php

declare(strict_types=1);

namespace App\ViewModels;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class GetUserByNameViewModel
{
    public function get(string $name): ?User
    {
        return User::query()
            ->where(DB::raw('LOWER(name)'), mb_strtolower($name))
            ->first();
    }
}

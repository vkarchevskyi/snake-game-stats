<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Score;
use App\Models\User;
use Illuminate\Support\Facades\DB;

readonly class CreateScoreAction
{
    public function run(int $value, User $user): Score
    {
        return DB::transaction(
            fn () => Score::query()->create([
                'user_id' => $user->id,
                'value' => $value
            ])
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Score;
use App\ViewModels\GetUserByNameViewModel;
use Illuminate\Support\Facades\DB;

readonly class CreateScoreAction
{
    public function __construct(
        private CreateUserAction $createUserAction,
        private GetUserByNameViewModel $getUserByName
    ) {
    }

    public function run(int $value, string $name): Score
    {
        return DB::transaction(
            function () use ($value, $name) {
                $user = $this->getUserByName->get($name) ?? $this->createUserAction->run($name);

                return Score::query()->create([
                    'user_id' => $user->id,
                    'value' => $value
                ]);
            }
        );
    }
}

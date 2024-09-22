<?php

declare(strict_types=1);

namespace App\ViewModels;

use App\Models\Score;
use Illuminate\Contracts\Pagination\Paginator;

class GetScoresForUserViewModel
{
    public function get(int $page, int $perPage, int $userId): Paginator
    {
        return Score::query()
            ->where('user_id', '=', $userId)
            ->orderBy('created_at', 'DESC')
            ->simplePaginate(perPage: $perPage, page: $page);
    }
}

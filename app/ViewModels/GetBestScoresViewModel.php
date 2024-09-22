<?php

declare(strict_types=1);

namespace App\ViewModels;

use App\Models\Score;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class GetBestScoresViewModel
{
    public function get(int $page, int $perPage): Paginator
    {
        $bestScoresQuery = Score::query()
            ->selectRaw('s.*')
            ->addSelect(DB::raw('ROW_NUMBER() OVER (PARTITION BY s.user_id ORDER BY s.value DESC) AS row_num'))
            ->fromRaw('scores s');

        return Score::with(['user:id,name'])
            ->from($bestScoresQuery, 'max_scores')
            ->where('max_scores.row_num', 1)
            ->orderBy('value', 'DESC')
            ->orderBy('created_at', 'DESC')
            ->simplePaginate(perPage: $perPage, page: $page);
    }
}

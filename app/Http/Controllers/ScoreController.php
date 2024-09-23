<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateScoreAction;
use App\Http\Requests\CreateScoreRequest;
use App\Http\Requests\IndexScoresRequest;
use App\Models\Score;
use App\Models\User;
use App\ViewModels\GetBestScoresViewModel;
use App\ViewModels\GetScoresForUserViewModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ScoreController extends Controller
{
    public function index(IndexScoresRequest $request, GetBestScoresViewModel $bestScores): View|JsonResponse
    {
        $request->validate($request->rules());
        [$page, $perPage] = $request->getPaginatedData();

        $scores = $bestScores->get($page, $perPage);

        if ($request->acceptsHtml()) {
            return view('scores.index', compact('scores'));
        }

        return JsonResponse::fromJsonString(json_encode($scores));
    }

    public function indexUser(
        IndexScoresRequest $request,
        User $user,
        GetScoresForUserViewModel $getScoresForUser
    ): View|JsonResponse {
        $request->validate($request->rules());
        [$page, $perPage] = $request->getPaginatedData();

        $scores = $getScoresForUser->get($page, $perPage, $user->id);

        if ($request->acceptsHtml()) {
            return view('scores.index-user', compact('scores', 'user'));
        }

        return JsonResponse::fromJsonString(json_encode(compact('scores', 'user')));
    }

    public function create(CreateScoreRequest $request, CreateScoreAction $createScoreAction): Score
    {
        $request->validate($request->rules());

        return $createScoreAction->run(
            $request->integer('value'),
            $request->user()
        );
    }
}

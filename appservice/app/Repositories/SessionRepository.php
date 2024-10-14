<?php

namespace App\Repositories;

use App\Models\Session;
use App\Models\Status;
use App\Repositories\BaseRepository;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;


class SessionRepository extends BaseRepository
{
    public function model()
    {
        return Session::class;
    }


    public function getUserSessionHistoryWithScore(int $userID): array
    {

        try {

            $records = DB::table('sessions as s')
                ->leftjoin('exercise_histories as e', 's.id', '=', 'e.session_id')
                ->where('s.user_id', $userID)
                ->select(
                    DB::raw('SUM(e.scores) AS score'),
                    DB::raw('UNIX_TIMESTAMP(MIN(e.created_at)) AS date')
                )
                ->groupBy('e.session_id', 's.created_at')
                ->orderBy(DB::raw('MIN(e.created_at)'), 'DESC')
                ->limit(12)
                ->get();

            return $this->FetchSuccess($records->toArray());
        } catch (QueryException|\Exception $exception) {
            return $this->FetchFailed($exception->getMessage());
        }

    }

    public function getUserLastestSessionHistoryWithCategory(int $userId): array
    {

        try {

            $records = DB::select(
                "SELECT
        c.name
    FROM
        categories c
    JOIN exercises ex ON ex.category_id = c.id
    JOIN exercise_histories e ON e.exercise_id = ex.id
    JOIN sessions s ON s.id = e.session_id
    WHERE
        s.id = (
            SELECT MAX(id)
            FROM sessions
            WHERE user_id = :userId
        )
    LIMIT 1",
                [ 'userId' => $userId ]
            );

            return $this->FetchSuccess($records);
        } catch (QueryException|\Exception $exception) {
            return $this->FetchFailed($exception->getMessage());
        }

    }


}

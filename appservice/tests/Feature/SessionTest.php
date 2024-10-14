<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SessionTest extends TestCase
{

    public function testShouldReturnUserSessionHistoryWithScore()
    {
        $this->get("api/users/1/session/history?token=" . $this->getUserToken(), []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'history' => [ '*' =>
                [
                    'score',
                    'date'
                ]
            ],
        ]);
    }


    public function testShouldReturnLastestSessionHistoryWithCategory()
    {
        $this->get("api/users/1/latest-session-category?token=" . $this->getUserToken(), []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => [ '*' =>
                [
                    'name'
                ]
            ],

        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExerciseSeeder extends AbstractBaseSeeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exerciseNames = ["Sudoku", "Crossword puzzles", "Memory card games", "Brain teasers",
            "Chess", "Jigsaw puzzles", "Math challenges", "Reading comprehension exercises",
            "Language learning apps", "Logic puzzles", "Pattern recognition games", "Creative writing exercises",
            "Meditation and mindfulness", "Board games", "Trivia quizzes", "Flashcards for memorization","Physical exercise routines",
            "mindfulness", "games", "Trivia ", "memorization","exercise routines",
            "Language", "Logic ", "recognition", "Creative",
            "Chess", "Jigsaw", "Math ", "comprehension exercises"];


        for ($i=1; $i<=26; $i++)
        {
            DB::table('exercises')->insert([
                'name' => $exerciseNames[$i],
                'course_id' => $this->getRandomCourseID(),
                'category_id' => $this->getRandomCategoryID(),
                'points' => rand(50, 90),
                'created_at' => Carbon::now()->subDays(rand(0, 80))->format('Y-m-d H:i:s'),

            ]);
        }
    }
}

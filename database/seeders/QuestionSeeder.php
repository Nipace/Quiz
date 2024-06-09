<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $questions = [
            ['question' => 'What does PHP stand for?'],
            ['question' => 'The default file extension in PHP are ____?'],
            ['question' => 'Which of the following is the correct way to declare the constant in PHP?'],
            ['question' => 'How does the name of the variable in PHP starts?'],
            ['question' => 'Which of the following function returns a character from the specified ASCII value?'],
        ];

        foreach ($questions as $question) {
            DB::table('questions')->insert([
                'question' => $question['question'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

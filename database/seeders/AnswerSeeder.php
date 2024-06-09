<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $answers = [
            ['question_id' => 1, 'answer' => 'Private Home Page', 'is_correct' => false],
            ['question_id' => 1, 'answer' => 'Pretext Hypertext Preprocessor', 'is_correct' => false],
            ['question_id' => 1, 'answer' => 'Processor Hypertext Processor', 'is_correct' => false],
            ['question_id' => 1, 'answer' => 'Hypertext Preprocessor', 'is_correct' => true],

            ['question_id' => 2, 'answer' => '.php', 'is_correct' => true],
            ['question_id' => 2, 'answer' => '.css', 'is_correct' => false],
            ['question_id' => 2, 'answer' => '.js', 'is_correct' => false],
            ['question_id' => 2, 'answer' => '.py', 'is_correct' => false],
            ['question_id' => 2, 'answer' => '.py', 'is_correct' => false],

            ['question_id' => 3, 'answer' => 'const', 'is_correct' => false],
            ['question_id' => 3, 'answer' => 'define', 'is_correct' => true],
            ['question_id' => 3, 'answer' => 'var', 'is_correct' => false],
            ['question_id' => 3, 'answer' => 'let', 'is_correct' => false],

            ['question_id' => 4, 'answer' => 'Sign !', 'is_correct' => false],
            ['question_id' => 4, 'answer' => 'Sign $', 'is_correct' => true],
            ['question_id' => 4, 'answer' => 'Sign &', 'is_correct' => false],
            ['question_id' => 4, 'answer' => 'Sign #', 'is_correct' => false],

            ['question_id' => 5, 'answer' => 'asc()', 'is_correct' => false],
            ['question_id' => 5, 'answer' => 'val()', 'is_correct' => false],
            ['question_id' => 5, 'answer' => 'ascii()', 'is_correct' => false],
            ['question_id' => 5 , 'answer' => 'chr()', 'is_correct' => true],

        ];

        foreach ($answers as $answer) {
            DB::table('answers')->insert([
                'question_id' => $answer['question_id'],
                'answer' => $answer['answer'],
                'is_correct' => $answer['is_correct'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}

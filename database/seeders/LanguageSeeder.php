<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds
     */
    public function run(): void
    {
        DB::table('languages')->insert([
            [
                'name' => 'Python',
                'key' => 'python',
                'status' => false,
                'extension' => 'py',
            ],
            [
                'name' => 'JavaScript',
                'key' => 'javascript',
                'status' => true,
                'extension' => 'js',
            ],
            [
                'name' => 'Java',
                'key' => 'java',
                'status' => false,
                'extension' => 'java',
            ],
            [
                'name' => 'C++',
                'key' => 'cpp',
                'status' => false,
                'extension' => 'cpp',
            ],
            [
                'name' => 'Ruby',
                'key' => 'ruby',
                'status' => false,
                'extension' => 'rb',
            ],
            [
                'name' => 'PHP',
                'key' => 'php',
                'status' => true,
                'extension' => 'php',
            ],
            [
                'name' => 'Swift',
                'key' => 'swift',
                'status' => false,
                'extension' => 'swift',
            ],
            [
                'name' => 'Go',
                'key' => 'go',
                'status' => false,
                'extension' => 'go',
            ],
            [
                'name' => 'C#',
                'key' => 'csharp',
                'status' => false,
                'extension' => 'cs',
            ],
            [
                'name' => 'Kotlin',
                'key' => 'kotlin',
                'status' => false,
                'extension' => 'kt',
            ]
        ]);
    }
}

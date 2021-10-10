<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exercise;

class ExercisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'aaa',
                'email' => 'aaa@example',
                'profile' =>'aaaaa'
            ],
            [
                'name' => 'bbb',
                'email' => 'bbb@example',
                'profile' =>'bbbbb'
            ],
            [
                'name' => 'ccc',
                'email' => 'ccc@example',
                'profile' =>'ccccc'
            ]
            ];

        foreach($users as $user){
            Exercise::create($user);
        }
    }
}

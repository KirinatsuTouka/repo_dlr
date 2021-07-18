<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('members')->insert(
            [
                [
                    'name' => 'test_0001',
                    'password' => 'example',
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted' => 0
                ],

            ]
        );
    }
}

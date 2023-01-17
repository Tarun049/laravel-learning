<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('members')->insert([
            'name' => Str::random(12),
            'email' => Str::random(10).'@gmail.com',
            'phone' => Str::random(10),
            'password' => Str::random(10),
            'remember_token' => Str::random(18),
            'created_at' => Str::random(12),
            'updated_at' => Str::random(12),
        ]);
    }
}

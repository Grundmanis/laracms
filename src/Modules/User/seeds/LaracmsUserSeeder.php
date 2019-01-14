<?php

namespace Grundmanis\Laracms\Modules\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaracmsUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('laracms_users')->insert([
            'email' => 'admin@laracms.com',
            'password' => bcrypt('secret'),
        ]);
    }
}

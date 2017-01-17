<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $dt      = Carbon::now();
        $dateNow = $dt->toDateTimeString();
        DB::table('users')->insert([
            'name'       => 'ActiveTicketing',
            'email'      => 'test@activeticketing.com',
            'password'   => bcrypt('secret'),
            'created_at' => $dateNow,
            'updated_at' => $dateNow,
        ]);
    }
}

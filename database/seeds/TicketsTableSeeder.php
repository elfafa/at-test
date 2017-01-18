<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Ticket;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->truncate();
   //      $dt      = Carbon::now();
   //      $dateNow = $dt->toDateTimeString();
   //      DB::table('tickets')->insert([
			// 'firstname'   => 'Jacques',
			// 'lastname'    => 'Martin',
			// 'email'       => 'jacques.martin@france.tv',
			// 'token'       => Ticket::generateToken(),
			// 'created_at'  => $dateNow,
			// 'updated_at'  => $dateNow,
   //      ]);
    }
}

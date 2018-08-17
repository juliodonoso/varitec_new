<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Faker\Factory::create('es_ES');


        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name'=> 'Hender',
            'email'=>'h@antalis.cl',
            'password'=> bcrypt('123456'),
            'rol_id'=>1,   
            'phone'=>'+56988296637',
            'rut'=>'11111111-1',   
            'active'=>1, 
            'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),             
        ]);

        for($i = 1; $i <= 20; $i++)
        {
                    $nombre = $faker->name;

                    DB::table('users')->insert([
                        'name'=> $nombre,
                        'email'=> $nombre . '@sisfan.cl',
                        'password'=> bcrypt ('123456'),
                        'rol_id'=>2,
                        'phone'=>'+569 88296637',
                        'rut'=> $faker->numberBetween(10000000,12000000),
                        'active'=>1,
            			'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
        }


    }
}


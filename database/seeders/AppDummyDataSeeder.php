<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AppDummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'type' => 2,
            'email' => 'admin@app.com',
            'password' => bcrypt('123456')
        ]);

        $devices = ['android','ios','chrome','firefox'];
        for($i=  0; $i < 100; $i++){
            User::create([
                'name' => 'user '.$i,
                'type' => 1,
                'device' => $devices[rand(0,3)],
                'email' => 'user'.$i.'@app.com',
                'password' => bcrypt('123456')
            ]);
        }
    }
}

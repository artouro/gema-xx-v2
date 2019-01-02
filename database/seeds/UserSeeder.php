<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_users')->insert([
            'userid' => 'admin@gema.com',
            'password' => bcrypt('admin123'),
            'level' => 1,
            'nama' => 'Administrator',
            'pangkalan' => 'Divisi IT GEMA XX',
            'gender' => 'Putra',
            'email_pinru' => 'admin@gema.com',
            'email_pembina' => 'admin2@gema.com',
            'telp_pinru' => '082132145678',
            'telp_pembina' => '08214123567'
        ]);
    }
}

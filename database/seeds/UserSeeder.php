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
            'email' => 'admin@gema.com',
            'password' => bcrypt('admin123'),
            'level' => 1,
            'nama' => 'Administrator',
            'pangkalan' => 'Divisi IT GEMA XX',
            'telp' => '082121725764',
            'lkbb' => 0,
        ]);
    }
}

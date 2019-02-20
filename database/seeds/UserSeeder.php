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
        // DB::table('t_users')->insert([
        //     'email' => 'admin@gema.com',
        //     'password' => bcrypt('admin123'),
        //     'level' => 1,
        //     'nama' => 'Administrator',
        //     'pangkalan' => 'Divisi IT GEMA XX',
        //     'telp' => '082121725764',
        //     'lkbb' => 0,
        // ]);
        // $table->string('userid', 100)->unique();
        // $table->string('password', 255);
        // //1 = Admin, 2 = Panitia ,3 = peserta SD, 4 = peserta SMP, 5 = peserta SMA
        // $table->integer('level'); 
        // $table->string('nama');
        // $table->string('pangkalan');
        // $table->rememberToken();
        // $table->timestamps();
        $sd = array(
            0 => array('no_peserta' => 'A001', 'nama' => 'Singa Muda', 'basis' => 'SDN Bojongwaru 02', 'userid' => 'a001', 'password' => 'd4aac6'),
            1 => array('no_peserta' => 'A002', 'nama' => 'Lumut Biru', 'basis' => 'SDN Bojongwaru 02', 'userid' => 'a002', 'password' => '1e35dd'),
            2 => array('no_peserta' => 'A003', 'nama' => 'Harimau', 'basis' => 'SDN Bojongwaru 01', 'userid' => 'a003', 'password' => 'b07f25'),
            3 => array('no_peserta' => 'A004', 'nama' => 'Lumut Hijau', 'basis' => 'SDN Bojongwaru 02', 'userid' => 'a004', 'password' => '15a61b'),
            4 => array('no_peserta' => 'A005', 'nama' => 'Kancil', 'basis' => 'SDN Angkasa 12', 'userid' => 'a005', 'password' => '308caf'),
            5 => array('no_peserta' => 'A006', 'nama' => 'Matahari', 'basis' => 'SDN Bojongwaru 01', 'userid' => 'a006', 'password' => '20637c'),
            6 => array('no_peserta' => 'A007', 'nama' => 'Garuda', 'basis' => 'SDN Angkasa 12', 'userid' => 'a007', 'password' => '456d70'),
            7 => array('no_peserta' => 'A008', 'nama' => 'Edelweis', 'basis' => 'SDN Angkasa 12', 'userid' => 'a008', 'password' => '01fc58'),
            8 => array('no_peserta' => 'A009', 'nama' => 'Macan Kumbang', 'basis' => 'SDN Rancamanyar 3', 'userid' => 'a009', 'password' => 'adffb7'),
            9 => array('no_peserta' => 'A010', 'nama' => 'Aster', 'basis' => 'SDN Cimuncang', 'userid' => 'a010', 'password' => '269f31'),
            10 => array('no_peserta' => 'A011', 'nama' => 'Banteng', 'basis' => 'SDN Cimuncang', 'userid' => 'a011', 'password' => '78fbb0'),
            11 => array('no_peserta' => 'A012', 'nama' => 'Akar Wangi', 'basis' => 'SDN Rd Mangkudikusuma', 'userid' => 'a012', 'password' => 'c65f72'),
            12 => array('no_peserta' => 'A013', 'nama' => 'Unknown', 'basis' => 'SDN Sindangsari', 'userid' => 'a013', 'password' => 'e484ec'),
            13 => array('no_peserta' => 'A014', 'nama' => 'Nusa Indah', 'basis' => 'SDN Rd Mangkudikusuma', 'userid' => 'a014', 'password' => 'e14561'),
            14 => array('no_peserta' => 'A015', 'nama' => 'Elang Biru', 'basis' => 'SDN Rd Mangkudikusuma', 'userid' => 'a015', 'password' => '5052ce'),
        );

        $smp = array(
            0 => array('no_peserta' => 'B001', 'nama' => 'Phantera Tigris Sundaica', 'basis' => 'SMP Pasundan 1 Banjaran', 'userid' => 'b001', 'password' => '349280'),
            1 => array('no_peserta' => 'B002', 'nama' => 'Amorphopalus Titanium', 'basis' => 'SMP Pasundan 1 Banjaran', 'userid' => 'b002', 'password' => '7410cc'),
            2 => array('no_peserta' => 'B003', 'nama' => 'Barracuda', 'basis' => 'SMP BPPI Baleendah', 'userid' => 'b003', 'password' => '4697ea'),
            3 => array('no_peserta' => 'B004', 'nama' => 'Drosera', 'basis' => 'SMP BPPI Baleendah', 'userid' => 'b004', 'password' => 'f972d2'),
            4 => array('no_peserta' => 'B005', 'nama' => 'Hacthi 1', 'basis' => 'SMPN 19 Bekasi', 'userid' => 'b005', 'password' => '1a24d7'),
            5 => array('no_peserta' => 'B006', 'nama' => 'Aldrovanda', 'basis' => 'SMP BPPI Baleendah', 'userid' => 'b006', 'password' => 'e0885f'),
            6 => array('no_peserta' => 'B007', 'nama' => 'Hacthi 2', 'basis' => 'SMPN 19 Bekasi', 'userid' => 'b007', 'password' => '16904a'),
            7 => array('no_peserta' => 'B008', 'nama' => 'Aster', 'basis' => 'SMPN 19 Bekasi', 'userid' => 'b008', 'password' => '654892'),
            8 => array('no_peserta' => 'B009', 'nama' => 'Naga', 'basis' => 'SMPN 19 Bekasi', 'userid' => 'b009', 'password' => '36c6f2'),
            9 => array('no_peserta' => 'B010', 'nama' => 'Sakura 1', 'basis' => 'SMPN 19 Bekasi', 'userid' => 'b010', 'password' => '29a4b6'),
            10 => array('no_peserta' => 'B011', 'nama' => 'Beruang Hitam', 'basis' => 'SMPN 9 Jakarta', 'userid' => 'b011', 'password' => '49f163'),
            11 => array('no_peserta' => 'B012', 'nama' => 'Sakura 2', 'basis' => 'SMPN 19 Bekasi', 'userid' => 'b012', 'password' => '4a40e1'),
            12 => array('no_peserta' => 'B013', 'nama' => 'Cendrawasih', 'basis' => 'SMPN 21 Bandung', 'userid' => 'b013', 'password' => '3a39ff'),
            13 => array('no_peserta' => 'B014', 'nama' => 'Rafflesia', 'basis' => 'SMPN 9 Jakarta', 'userid' => 'b014', 'password' => 'caf6f6'),
            14 => array('no_peserta' => 'B015', 'nama' => '', 'basis' => 'SMPN 9 Bekasi', 'userid' => 'b015', 'password' => 'b6f03d'),
            15 => array('no_peserta' => 'B016', 'nama' => 'Orchid', 'basis' => 'SMPN 21 Bandung', 'userid' => 'b016', 'password' => 'dbb526'),
        );

        $sma = array(
            0 => array('no_peserta' => 'C001', 'nama' => 'Pelaksana', 'basis' => 'SMAN 1 Dayeuhkolot', 'userid' => 'c001', 'password' => 'b5ccb8'),
            1 => array('no_peserta' => 'C002', 'nama' => 'Pendobrak', 'basis' => 'SMAN 1 Dayeuhkolot', 'userid' => 'c002', 'password' => '99ad62'),
            2 => array('no_peserta' => 'C003', 'nama' => 'Kangmas 1', 'basis' => 'SMAN 1 Ciparay', 'userid' => 'c003', 'password' => 'd45ac3'),
            3 => array('no_peserta' => 'C004', 'nama' => 'Mustika 1', 'basis' => 'SMAN 1 Ciparay', 'userid' => 'c004', 'password' => '63040c'),
            4 => array('no_peserta' => 'C005', 'nama' => 'Kangmas 2', 'basis' => 'SMAN 1 Ciparay', 'userid' => 'c005', 'password' => 'f36c1b'),
            5 => array('no_peserta' => 'C006', 'nama' => 'Mustika 2', 'basis' => 'SMAN 1 Ciparay', 'userid' => 'c006', 'password' => '1583fa'),
            6 => array('no_peserta' => 'C007', 'nama' => 'Kangmas 3', 'basis' => 'SMAN 1 Ciparay', 'userid' => 'c007', 'password' => '7b04b3'),
            7 => array('no_peserta' => 'C008', 'nama' => 'Mustika 3', 'basis' => 'SMAN 1 Ciparay', 'userid' => 'c008', 'password' => 'f8d991'),
            8 => array('no_peserta' => 'C009', 'nama' => 'Putra 1', 'basis' => 'SMKN 9 Bandung', 'userid' => 'c009', 'password' => 'dc557d'),
            9 => array('no_peserta' => 'C010', 'nama' => 'Mustika 4', 'basis' => 'SMAN 1 Ciparay', 'userid' => 'c010', 'password' => 'badd83'),
            10 => array('no_peserta' => 'C011', 'nama' => 'Pendobrak 2', 'basis' => 'SMA KP 1 Ciparay', 'userid' => 'c011', 'password' => '77f1e3'),
            11 => array('no_peserta' => 'C012', 'nama' => 'Putri 1', 'basis' => 'SMKN 9 Bandung', 'userid' => 'c012', 'password' => '08bfe0'),
            12 => array('no_peserta' => 'C013', 'nama' => 'Pendobrak 3', 'basis' => 'SMA KP 1 Ciparay', 'userid' => 'c013', 'password' => 'c14c61'),
            13 => array('no_peserta' => 'C014', 'nama' => 'Putri 2', 'basis' => 'SMKN 9 Bandung', 'userid' => 'c014', 'password' => 'f85997'),
            14 => array('no_peserta' => 'C015', 'nama' => 'Pendobrak 1', 'basis' => 'SMAN 1 Bojongsoang', 'userid' => 'c015', 'password' => 'a5d8b5'),
            15 => array('no_peserta' => 'C016', 'nama' => 'Pencoba 2', 'basis' => 'SMA KP 1 Ciparay', 'userid' => 'c016', 'password' => '3ac56e'),
            16 => array('no_peserta' => 'C017', 'nama' => 'Pendobrak 2', 'basis' => 'SMAN 1 Bojongsoang', 'userid' => 'c017', 'password' => 'e1f5e1'),
            17 => array('no_peserta' => 'C018', 'nama' => 'Pencoba 3', 'basis' => 'SMA KP 1 Ciparay', 'userid' => 'c018', 'password' => '4f491d'),
            18 => array('no_peserta' => 'C019', 'nama' => 'Penegas', 'basis' => 'SMAN 1 Bojongsoang', 'userid' => 'c019', 'password' => '8de804'),
        );

        foreach($sd as $row){
            DB::table('t_peserta')->insert([
                'userid' => strtolower($row['no_peserta']),
                'password' => $row['password'],
                'level' => 3,
                'nama' => $row['nama'],
                'pangkalan' => $row['basis'],
            ]);
        }
        foreach($smp as $row){
            DB::table('t_peserta')->insert([
                'userid' => strtolower($row['no_peserta']),
                'password' => $row['password'],
                'level' => 4,
                'nama' => $row['nama'],
                'pangkalan' => $row['basis'],
            ]);
        }
        foreach($sma as $row){
            DB::table('t_peserta')->insert([
                'userid' => strtolower($row['no_peserta']),
                'password' => $row['password'],
                'level' => 5,
                'nama' => $row['nama'],
                'pangkalan' => $row['basis'],
            ]);
        }
    }
}

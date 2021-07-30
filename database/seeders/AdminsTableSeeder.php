<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords = [
            ['id'=>1,'name'=>'admin','type'=>'admin','mobile'=>'0000000000','email'=>'admin@gmail.com','password'=>'$2b$10$jKR3OQusHRuqKtbnLXtRTu/TdaGu1Xo57UNYhkJgbOEYOnmVCS5T6','image'=>'','status'=>1],
        ];

        DB::table('admins')->insert($adminRecords);
        // foreach($adminRecords as $key=>$records){
        //     \App\Models\Admin::create($records);
        // }
    }
}

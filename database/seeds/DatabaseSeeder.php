<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         //$this->call(ChuyenMucTableSeeder::Class);
         //$this->call(LoaiChuyenMucTableSeeder::Class);
        //$this->call(BaiVietTableSeeder::Class);
       // $this->call(BinhLuanTableSeeder::Class);
        $this->call([
            UsersTableSeeder::class,
            ChuyenMucTableSeeder::Class,
            LoaiChuyenMucTableSeeder::Class,
            BaiVietTableSeeder::Class,
            BinhLuanTableSeeder::Class
        ]);


    }
}

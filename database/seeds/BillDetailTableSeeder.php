<?php
use Illuminate\Database\Seeder;

class BillDetailTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bill_detail')->insert([
            'billID'=>1,
            'shoesID'=>1,
            'amount'=>'2000000',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('bill_detail')->insert([
            'billID'=>2,
            'shoesID'=>2,
            'amount'=>'3000000',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('bill_detail')->insert([
            'billID'=>3,
            'shoesID'=>3,
            'amount'=>'4000000',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
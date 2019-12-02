<?php

use Illuminate\Database\Seeder;

class ShoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shoes')->insert([
            'id'=>1,
            'name'=>'Boot',
            'inPrice'=>'500000',
            'outPrice'=>'750000',
            'inStock'=>'50',
            'created_at'=>now(),
            'updated_at'=>now(),
            'categoryID'=>1
        ]);
        DB::table('shoes')->insert([
            'id'=>2,
            'name'=>'Sneaker',
            'inPrice'=>'400000',
            'outPrice'=>'60000',
            'inStock'=>'50',
            'created_at'=>now(),
            'updated_at'=>now(),
            'categoryID'=>2
        ]);
        DB::table('shoes')->insert([
            'id'=>3,
            'name'=>'Standar',
            'inPrice'=>'600000',
            'outPrice'=>'70000',
            'inStock'=>'20',
            'created_at'=>now(),
            'updated_at'=>now(),
            'categoryID'=>3
        ]);
        DB::table('shoes')->insert([
            'id'=>4,
            'name'=>'Shoese',
            'inPrice'=>'600000',
            'outPrice'=>'70000',
            'inStock'=>'20',
            'created_at'=>now(),
            'updated_at'=>now(),
            'categoryID'=>1
        ]);
        $json=File::get('database/data/data.json');
        $data=json_decode($json);
        foreach($data as $item){
            DB::table('shoes')->insert([
                'name'=>$item->title,
                'categoryID'=>2,
                'image'=>$item->src,
                'inPrice'=> $item->priceold,
                'outPrice'=>$item->priceold*1.2,
                'inStock'=>20,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
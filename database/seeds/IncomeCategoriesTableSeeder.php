<?php

use Illuminate\Database\Seeder;

class IncomeCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('income_categories')->insert([
            'name' => 'Salary',
        ]);
        DB::table('income_categories')->insert([
            'name' => 'Pension',
        ]);
        DB::table('income_categories')->insert([
            'name' => 'Benefits',
        ]);
        DB::table('income_categories')->insert([
            'name' => 'Financial',
        ]);
        DB::table('income_categories')->insert([
            'name' => 'Refund',
        ]);
        DB::table('income_categories')->insert([
            'name' => 'Other',
        ]);
    }
}

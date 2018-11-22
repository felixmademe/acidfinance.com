<?php

use Illuminate\Database\Seeder;

class ExpenseCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expense_categories')->insert([
            'name' => 'Household',
        ]);
        DB::table('expense_categories')->insert([
            'name' => 'Insurance',
        ]);
        DB::table('expense_categories')->insert([
            'name' => 'Fees',
        ]);
        DB::table('expense_categories')->insert([
            'name' => 'Food & Drinks',
        ]);
        DB::table('expense_categories')->insert([
            'name' => 'Groceries',
        ]);
        DB::table('expense_categories')->insert([
            'name' => 'Savings',
        ]);
        DB::table('expense_categories')->insert([
            'name' => 'Buffer',
        ]);
        DB::table('expense_categories')->insert([
            'name' => 'Transport',
        ]);
        DB::table('expense_categories')->insert([
            'name' => 'Vacation',
        ]);
        DB::table('expense_categories')->insert([
            'name' => 'Sports',
        ]);
        DB::table('expense_categories')->insert([
            'name' => 'Hobbies',
        ]);
        DB::table('expense_categories')->insert([
            'name' => 'Education',
        ]);
        DB::table('expense_categories')->insert([
            'name' => 'Pets',
        ]);
        DB::table('expense_categories')->insert([
            'name' => 'Children',
        ]);
        DB::table('expense_categories')->insert([
            'name' => 'Other',
        ]);
    }
}

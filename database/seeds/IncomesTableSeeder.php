<?php

use App\Income;
use Illuminate\Database\Seeder;

class IncomesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $incomes = factory(Income::class, 10)->create();
    }
}

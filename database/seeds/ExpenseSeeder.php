<?php

use Illuminate\Database\Seeder;
use App\Expense;


class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Expense::class)->times(50)->create();
    }


}

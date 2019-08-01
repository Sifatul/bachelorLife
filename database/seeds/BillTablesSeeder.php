<?php

use Illuminate\Database\Seeder;
use App\Bill;

class BillTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Bill::class,50)->create();
    }
}

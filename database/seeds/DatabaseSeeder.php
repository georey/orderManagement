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
        $this->call(ClientsSeeder::class);
        $this->call(FormatsSeeder::class);
        $this->call(OrderStatusesSeeder::class);
        $this->call(ValidationsSeeder::class);
        $this->call(OutputFieldsSeeder::class);
        $this->call(ClientFormatsSeeder::class);
    }
}

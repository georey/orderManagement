<?php

use Illuminate\Database\Seeder;

class OrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses[] = [
            'id' => 1,
            'name' => 'Pending'
        ];

        $statuses[] = [
            'id' => 2,
            'name' => 'Accepted'
        ];

        $statuses[] = [
            'id' => 3,
            'name' => 'Rejected'
        ];

        $statuses[] = [
            'id' => 4,
            'name' => 'Sent'
        ];

        $statuses[] = [
            'id' => 5,
            'name' => 'Processed'
        ];

        $statuses[] = [
            'id' => 6,
            'name' => 'Error'
        ];

        foreach ($statuses as $status) {
            DB::table('order_statuses')->updateOrInsert(['id' => $status['id']], $status);
        }
    }
}

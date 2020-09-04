<?php

use Illuminate\Database\Seeder;

class ValidationsSeeder extends Seeder
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
            'name' => 'Required',
            'code' => 'required',
            'type' => 1
        ];

        $statuses[] = [
            'id' => 2,
            'name' => 'Alpha',
            'code' => 'alpha',
            'type' => 1
        ];

        $statuses[] = [
            'id' => 3,
            'name' => 'Integer',
            'code' => 'integer',
            'type' => 1
        ];

        $statuses[] = [
            'id' => 4,
            'name' => 'Greater Than',
            'code' => 'gt',
            'type' => 2
        ];

        foreach ($statuses as $status) {
            DB::table('validations')->updateOrInsert(['id' => $status['id']], $status);
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class OutputFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields[] = [
            'id' => 1,
            'name' => 'Work Order Number',
            'field' => 'work_order_number'
        ];

        $fields[] = [
            'id' => 2,
            'name' => 'Size',
            'field' => 'size'
        ];

        $fields[] = [
            'id' => 3,
            'name' => 'Description',
            'field' => 'description'
        ];

        $fields[] = [
            'id' => 4,
            'name' => 'Style',
            'field' => 'style'
        ];

        foreach ($fields as $field) {
            DB::table('output_fields')->updateOrInsert(['id' => $field['id']], $field);
        }
    }
}

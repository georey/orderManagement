<?php

use Illuminate\Database\Seeder;

class FormatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formats[] = [
            'id' => 1,
            'name' => 'CSV'
        ];

        $formats[] = [
            'id' => 2,
            'name' => 'JSON'
        ];

        $formats[] = [
            'id' => 3,
            'name' => 'XML'
        ];

        $formats[] = [
            'id' => 4,
            'name' => 'EDI'
        ];

        foreach ($formats as $format) {
            DB::table('formats')->updateOrInsert(['id' => $format['id']], $format);
        }
    }
}

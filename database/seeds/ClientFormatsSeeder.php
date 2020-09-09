<?php

use Illuminate\Database\Seeder;

class ClientFormatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientFormats[] = [
            'id' => 1,
            'client_id' => 1,
            'format_id' => 1
        ];

        foreach ($clientFormats as $clientFormat) {
            DB::table('client_formats')->updateOrInsert(['id' => $clientFormat['id']], $clientFormat);
        }
    }
}

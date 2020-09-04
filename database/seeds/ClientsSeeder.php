<?php

use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients[] = [
            'id' => 1,
            'name' => 'NFL',
            'description' => 'Nike NFL'
        ];

        $clients[] = [
            'id' => 2,
            'name' => 'NFS',
            'description' => null,
            'deleted_at' => 'now()'
        ];

        foreach ($clients as $client) {
            DB::table('clients')->updateOrInsert(['id' => $client['id']], $client);
        }
    }
}

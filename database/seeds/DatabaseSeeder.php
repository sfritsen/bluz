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
        DB::table('groups')->insert([
            'label' => 'group1',
            'name' => 'CCO Network Support',
        ]);

        // Seed category boxes
        DB::table('category_boxes')->insert([
            [
                'group_id' => '2',
                'type' => '1',
                'is_under' => '0',
                'cat1_label' => 'HSIA',
                'cat2_label' => '-',
                'cat3_label' => '-',
                'active' => '1',
            ],
            [
                'group_id' => '2',
                'type' => '1',
                'is_under' => '0',
                'cat1_label' => 'Optik TV',
                'cat2_label' => '-',
                'cat3_label' => '-',
                'active' => '1',
            ],
            [
                'group_id' => '2',
                'type' => '2',
                'is_under' => '1',
                'cat1_label' => '-',
                'cat2_label' => 'No Sync',
                'cat3_label' => '-',
                'active' => '1',
            ],
            [
                'group_id' => '2',
                'type' => '2',
                'is_under' => '1',
                'cat1_label' => '-',
                'cat2_label' => 'No IP',
                'cat3_label' => '-',
                'active' => '1',
            ],
            [
                'group_id' => '2',
                'type' => '3',
                'is_under' => '3',
                'cat1_label' => '-',
                'cat2_label' => '-',
                'cat3_label' => 'Found OK',
                'active' => '1',
            ],
            [
                'group_id' => '2',
                'type' => '3',
                'is_under' => '3',
                'cat1_label' => '-',
                'cat2_label' => '-',
                'cat3_label' => 'User Error',
                'active' => '1',
            ],
            [
                'group_id' => '2',
                'type' => '3',
                'is_under' => '2',
                'cat1_label' => '-',
                'cat2_label' => '-',
                'cat3_label' => 'Optik lvl2 Item',
                'active' => '1',
            ]
        ]);
    }
}

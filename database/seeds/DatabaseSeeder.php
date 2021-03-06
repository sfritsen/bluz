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
        // Seed sample group
        $group = DB::table('groups')->insert([
            'label' => 'group1',
            'name' => 'Group 1 Name',
            'db_table' => 'data_group1',
            'entry_route' => 'g1_entry',
            'admin_route' => 'g1_admin',
            'active' => '1',
            'created_at' => (date("Y-m-d H:i:s")),
            'updated_at' => (date("Y-m-d H:i:s")),
        ]);

        // Seed sample drop menus
        DB::table('dd_menus')->insert([
            [
                'type' => '1',
                'group_id' => '1',
                'parent_id' => '0',
                'menu_text' => 'Incident Type',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'type' => '1',
                'group_id' => '1',
                'parent_id' => '0',
                'menu_text' => 'Equipment Type',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'type' => '1',
                'group_id' => '1',
                'parent_id' => '0',
                'menu_text' => 'Resolution',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'type' => '1',
                'group_id' => '1',
                'parent_id' => '0',
                'menu_text' => 'Troubleshooting',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'type' => '2',
                'group_id' => '1',
                'parent_id' => '1',
                'menu_text' => 'NS Chat',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'type' => '2',
                'group_id' => '1',
                'parent_id' => '1',
                'menu_text' => 'Call Inbound',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'type' => '2',
                'group_id' => '1',
                'parent_id' => '2',
                'menu_text' => 'VDSL',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'type' => '2',
                'group_id' => '1',
                'parent_id' => '2',
                'menu_text' => 'DMT2',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'type' => '2',
                'group_id' => '1',
                'parent_id' => '3',
                'menu_text' => 'Dispatched',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'type' => '2',
                'group_id' => '1',
                'parent_id' => '3',
                'menu_text' => 'Found Ok',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'type' => '2',
                'group_id' => '1',
                'parent_id' => '4',
                'menu_text' => 'Troubleshooting Done',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'type' => '2',
                'group_id' => '1',
                'parent_id' => '4',
                'menu_text' => 'Not done',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ]
        ]);

        // Seed category boxes
        DB::table('category_boxes')->insert([
            [
                'group_id' => '1',
                'type' => '1',
                'is_under' => '0',
                'cat1_label' => 'HSIA',
                'cat2_label' => '-',
                'cat3_label' => '-',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'group_id' => '1',
                'type' => '1',
                'is_under' => '0',
                'cat1_label' => 'Optik TV',
                'cat2_label' => '-',
                'cat3_label' => '-',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'group_id' => '1',
                'type' => '2',
                'is_under' => '1',
                'cat1_label' => '-',
                'cat2_label' => 'No Sync',
                'cat3_label' => '-',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'group_id' => '1',
                'type' => '2',
                'is_under' => '1',
                'cat1_label' => '-',
                'cat2_label' => 'No IP',
                'cat3_label' => '-',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'group_id' => '1',
                'type' => '3',
                'is_under' => '3',
                'cat1_label' => '-',
                'cat2_label' => '-',
                'cat3_label' => 'Found OK',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'group_id' => '1',
                'type' => '3',
                'is_under' => '3',
                'cat1_label' => '-',
                'cat2_label' => '-',
                'cat3_label' => 'User Error',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'group_id' => '1',
                'type' => '2',
                'is_under' => '2',
                'cat1_label' => '-',
                'cat2_label' => 'Optik lvl2 Item 1',
                'cat3_label' => '-',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'group_id' => '1',
                'type' => '2',
                'is_under' => '2',
                'cat1_label' => '-',
                'cat2_label' => 'Optik lvl2 Item 2',
                'cat3_label' => '-',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'group_id' => '1',
                'type' => '3',
                'is_under' => '7',
                'cat1_label' => '-',
                'cat2_label' => '-',
                'cat3_label' => 'Optik lvl2 Item 1 lvl3 1',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'group_id' => '1',
                'type' => '3',
                'is_under' => '7',
                'cat1_label' => '-',
                'cat2_label' => '-',
                'cat3_label' => 'Optik lvl2 Item 1 lvl3 2',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'group_id' => '1',
                'type' => '3',
                'is_under' => '8',
                'cat1_label' => '-',
                'cat2_label' => '-',
                'cat3_label' => 'Optik lvl2 Item 2 lvl3 1',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ],
            [
                'group_id' => '1',
                'type' => '3',
                'is_under' => '8',
                'cat1_label' => '-',
                'cat2_label' => '-',
                'cat3_label' => 'Optik lvl2 Item 2 lvl3 2',
                'active' => '1',
                'created_at' => (date("Y-m-d H:i:s")),
                'updated_at' => (date("Y-m-d H:i:s")),
            ]
        ]);
    }
}

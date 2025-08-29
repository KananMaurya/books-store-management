<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblCategories extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],'created_at' => [
    'type' => 'DATETIME',
    'null' => true,
],
'updated_at' => [
    'type' => 'DATETIME',
    'null' => true,
],

        ]);

        $this->forge->addKey('id', true); // Primary Key
        $this->forge->createTable('tblCategories');
    }

    public function down()
    {
        $this->forge->dropTable('tblCategories');
    }
}

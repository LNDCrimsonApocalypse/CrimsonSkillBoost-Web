<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateStudentsTable extends Migration
{
    public function up()
    {
        // Drop existing table if it exists
        $this->forge->dropTable('students', true);

        // Create students table with updated structure
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true
            ],
            'student_number' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true
            ],
            'year_level' => [
                'type' => 'INT',
                'constraint' => 1
            ],
            'section' => [
                'type' => 'VARCHAR',
                'constraint' => 10
            ],
            'course' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('students');

        // Add some sample data
        $this->db->table('students')->insertBatch([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'student_number' => '2024-0001',
                'year_level' => 1,
                'section' => 'A',
                'course' => 'Computer Science',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'student_number' => '2024-0002',
                'year_level' => 2,
                'section' => 'B',
                'course' => 'Information Technology',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('students');
    }
}

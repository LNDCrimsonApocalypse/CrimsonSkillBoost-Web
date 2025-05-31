<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEnrollmentRequests extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'student_id' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'course_id' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'section' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'approved', 'rejected'],
                'default' => 'pending'
            ],
            'created_at' => [
                'type' => 'DATETIME'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('enrollment_requests');
    }

    public function down()
    {
        $this->forge->dropTable('enrollment_requests');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGradingTables extends Migration
{
    public function up()
    {
        // Students table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'student_number' => ['type' => 'VARCHAR', 'constraint' => 20, 'unique' => true],
            'year_level' => ['type' => 'INT', 'constraint' => 1],
            'section' => ['type' => 'VARCHAR', 'constraint' => 10],
            'course' => ['type' => 'VARCHAR', 'constraint' => 100],
            'academic_status' => ['type' => 'ENUM', 'constraint' => ['active', 'inactive', 'graduated'], 'default' => 'active'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('students');

        // Task Submissions table
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'task_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'student_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'file_path' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'score' => ['type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['pending', 'graded'], 'default' => 'pending'],
            'submitted_at' => ['type' => 'DATETIME'],
            'graded_at' => ['type' => 'DATETIME', 'null' => true],
            'graded_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('task_id', 'tasks', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('student_id', 'students', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('graded_by', 'users', 'id', 'SET NULL', 'SET NULL');
        $this->forge->createTable('task_submissions');
    }

    public function down()
    {
        $this->forge->dropTable('task_submissions');
        $this->forge->dropTable('students');
    }
}

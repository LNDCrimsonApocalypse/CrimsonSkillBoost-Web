<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQuizTables extends Migration
{
    public function up()
    {
        // Create quizzes table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'start_date' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'end_date' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'time_limit' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true
            ],
            'passing_score' => [
                'type' => 'INT',
                'constraint' => 3,
                'default' => 60
            ],
            'show_answers' => [
                'type' => 'BOOLEAN',
                'default' => 0
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
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('quizzes');

        // Create quiz_questions table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'quiz_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'question_text' => [
                'type' => 'TEXT'
            ],
            'options' => [
                'type' => 'TEXT'
            ],
            'correct_answer' => [
                'type' => 'INT',
                'constraint' => 1
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
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('quiz_id', 'quizzes', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('quiz_questions');
    }

    public function down()
    {
        $this->forge->dropTable('quiz_questions');
        $this->forge->dropTable('quizzes');
    }
}

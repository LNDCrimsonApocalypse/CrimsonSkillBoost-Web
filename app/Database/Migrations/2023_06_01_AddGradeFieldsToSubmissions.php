<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGradeFieldsToSubmissions extends Migration
{
    public function up()
    {
        // First check if the column exists to prevent errors
        $fields = [
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => 'pending',
                'after' => 'score'
            ],
            'score' => [
                'type' => 'FLOAT',
                'null' => true,
                'after' => 'file_path'
            ]
        ];

        $this->forge->addColumn('task_submissions', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('task_submissions', ['status', 'score']);
    }
}

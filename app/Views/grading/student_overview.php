<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Grade Overview</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            background-color: #ffeef8;
        }
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }
        .student-info {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .grade-summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .summary-card {
            background: #f9f0f7;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }
        .summary-card h3 {
            margin: 0;
            color: #666;
            font-size: 0.9em;
        }
        .summary-card .value {
            font-size: 1.8em;
            font-weight: bold;
            color: #e636a4;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="student-info">
            <h2><?= esc($student['name']) ?></h2>
            <p>Student Number: <?= esc($student['student_number']) ?></p>
            <p>Section: <?= esc($student['section']) ?></p>
            
            <div class="grade-summary">
                <div class="summary-card">
                    <h3>Task Average</h3>
                    <div class="value"><?= number_format($student['average_task_score'], 1) ?></div>
                </div>
                <div class="summary-card">
                    <h3>Quiz Average</h3>
                    <div class="value"><?= number_format($student['average_quiz_score'], 1) ?></div>
                </div>
                <div class="summary-card">
                    <h3>Overall Grade</h3>
                    <div class="value">
                        <?= number_format(($student['average_task_score'] + $student['average_quiz_score']) / 2, 1) ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submissions listing here -->
        <?php if (!empty($submissions)): ?>
            <div class="submissions-list">
                <!-- Similar to the main grading overview table -->
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

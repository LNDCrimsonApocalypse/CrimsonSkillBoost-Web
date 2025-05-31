<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grading Overview</title>
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
        .grading-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .grading-tabs {
            margin-bottom: 20px;
        }
        .tab {
            background: #f1f1f1;
            border: none;
            padding: 10px 20px;
            margin-right: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
        }
        .tab.active {
            background: #e636a4;
            color: white;
        }
        .grade-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .grade-table th, .grade-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        .grade-table th {
            background: #f9f0f7;
            font-weight: 600;
        }
        .grade-input {
            width: 80px;
            padding: 6px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .save-btn {
            background: #e636a4;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .status {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
        }
        .status.pending {
            background: #fff3cd;
            color: #856404;
        }
        .status.graded {
            background: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="grading-card">
            <h2>Grading Overview</h2>
            <div class="grading-tabs">
                <button class="tab active">Tasks</button>
                <button class="tab">Quizzes</button>
            </div>
            
            <table class="grade-table">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Submission</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Score</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($submissions ?? [] as $submission): ?>
                    <tr>
                        <td><?= esc($submission['student_name']) ?></td>
                        <td><?= esc($submission['task_title']) ?></td>
                        <td><?= date('M d, Y', strtotime($submission['submitted_at'])) ?></td>
                        <td>
                            <span class="status <?= $submission['status'] === 'graded' ? 'graded' : 'pending' ?>">
                                <?= ucfirst($submission['status']) ?>
                            </span>
                        </td>
                        <td>
                            <input type="number" class="grade-input" 
                                   value="<?= $submission['score'] ?? '' ?>" 
                                   min="0" max="100"
                                   data-submission-id="<?= $submission['id'] ?>">
                        </td>
                        <td>
                            <button class="save-btn" onclick="saveGrade(<?= $submission['id'] ?>)">Save</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function saveGrade(submissionId) {
            const input = document.querySelector(`input[data-submission-id="${submissionId}"]`);
            const score = input.value;

            fetch(`/grading/save/${submissionId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ score })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const row = input.closest('tr');
                    const statusCell = row.querySelector('.status');
                    statusCell.className = 'status graded';
                    statusCell.textContent = 'Graded';
                    alert('Grade saved successfully!');
                } else {
                    alert('Error saving grade: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to save grade');
            });
        }
    </script>
</body>
</html>

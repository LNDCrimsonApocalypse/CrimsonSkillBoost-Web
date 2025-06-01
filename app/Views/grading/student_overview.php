<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Grading - <?= esc($student['name']) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #ffeef8;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        .student-header {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .submissions-list {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .submission-item {
            border-bottom: 1px solid #eee;
            padding: 15px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .grade-input {
            width: 80px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .save-btn {
            background: #e636a4;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .status {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
        }
        .status.pending { background: #fff3cd; color: #856404; }
        .status.graded { background: #d4edda; color: #155724; }
    </style>
</head>
<body>
    <div class="container">
        <div class="student-header">
            <h2><?= esc($student['name']) ?></h2>
            <p>Email: <?= esc($student['email']) ?></p>
        </div>

        <div class="submissions-list">
            <h3>Submissions</h3>
            <?php if (!empty($submissions)): ?>
                <?php foreach ($submissions as $submission): ?>
                    <div class="submission-item">
                        <div>
                            <strong><?= esc($submission['task_title']) ?></strong>
                            <br>
                            <small>Submitted: <?= date('M d, Y h:i A', strtotime($submission['submitted_at'])) ?></small>
                        </div>
                        <div>
                            <input type="number" class="grade-input" 
                                   value="<?= $submission['score'] ?? '' ?>" 
                                   min="0" max="100"
                                   data-submission-id="<?= $submission['id'] ?>">
                            <button onclick="saveGrade(<?= $submission['id'] ?>)" class="save-btn">Save</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No submissions found.</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function saveGrade(submissionId) {
            const input = document.querySelector(`input[data-submission-id="${submissionId}"]`);
            const score = input.value;

            if (!score || score < 0 || score > 100) {
                alert('Please enter a valid score between 0 and 100');
                return;
            }

            fetch(`<?= site_url('task/grade') ?>/${submissionId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ score: parseFloat(score) })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const statusSpan = input.closest('.submission-item').querySelector('.status');
                    if (statusSpan) {
                        statusSpan.className = 'status graded';
                        statusSpan.textContent = 'Graded';
                    }
                    alert('Grade saved successfully!');
                } else {
                    throw new Error(data.message || 'Failed to save grade');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to save grade: ' + error.message);
            });
        }
    </script>
</body>
</html>

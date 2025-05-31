<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Details - <?= esc($quiz['title']) ?></title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
            background-color: #ffeef8;
        }

        .container { max-width: 800px; margin: 40px auto; padding: 20px; }
        .question { 
            background: #fff;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .content {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .quiz-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
            width: 45%;
            padding: 20px;
        }

        .quiz-header {
            background-color: #c3b7f9;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            font-weight: bold;
            color: #1c1c5a;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .question-list {
            padding: 15px;
        }

        .question-item {
            background: #f8f0f7;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
        }

        .question-item p {
            margin: 0 0 10px 0;
            font-weight: 500;
        }

        .options-list {
            list-style: none;
            padding-left: 20px;
        }

        .options-list li {
            margin: 5px 0;
            color: #514a6d;
        }

        .quizzes-list {
            width: 25%;  /* Adjusted width */
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
        }

        .quiz-entry {
            background-color: #f7f7f7;
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .quiz-info strong {
            display: block;
            margin-bottom: 5px;
        }

        .quiz-date {
            font-size: 12px;
            color: #666;
            margin: 0;
        }

        .quiz-actions {
            display: flex;
            gap: 10px;
        }

        .edit-btn, .delete-btn {
            padding: 5px 10px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
        }

        .edit-btn {
            background: #f94fa4;
            color: white;
            text-decoration: none;
        }

        .delete-btn {
            background: #ff4444;
            color: white;
        }

        .quiz-meta {
            display: flex;
            gap: 20px;
            margin: 15px 0;
            padding: 10px;
            background: #f8f0f7;
            border-radius: 8px;
        }

        .quiz-meta p {
            margin: 5px 0;
        }

        .submission-list {
            width: 30%;  /* Adjusted width */
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.1);
        }

        .more-questions {
            font-weight: bold;
            color: #f94fa4;
            margin-top: 10px;
        }

        .quizzes-scroll {
            max-height: 400px;
            overflow-y: auto;
            padding-right: 10px;
        }
    </style>
</head>
<body>
    <div class="title-bar"><?= esc($quiz['title']) ?></div>

    <div class="content">
        <!-- Quizzes List with Details - Left Side -->
        <div class="quizzes-list">
            <div class="quiz-header">
                All Quizzes
                <span>✎</span>
            </div>

            <div class="quiz-details">
                <div class="quiz-meta">
                    <div>
                        <p><strong>Current Quiz:</strong> <?= esc($quiz['title']) ?></p>
                        <p><strong>Start Date:</strong> <?= esc($quiz['start_date'] ?? 'Not set') ?></p>
                        <p><strong>End Date:</strong> <?= esc($quiz['end_date'] ?? 'Not set') ?></p>
                    </div>
                </div>

                <div class="question-preview">
                    <?php if (!empty($questions)): ?>
                        <h4>Questions Preview</h4>
                        <?php foreach (array_slice($questions, 0, 3) as $index => $question): ?>
                            <div class="question-item">Q<?= $index + 1 ?>: <?= esc($question['question_text']) ?></div>
                        <?php endforeach; ?>
                        <?php if (count($questions) > 3): ?>
                            <div class="more-questions">+ <?= count($questions) - 3 ?> more questions</div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="quizzes-scroll">
                <?php foreach ($allQuizzes as $q): ?>
                    <div class="quiz-entry">
                        <div class="quiz-info">
                            <strong><?= esc($q['title']) ?></strong>
                            <p class="quiz-date">Created: <?= date('M d, Y', strtotime($q['created_at'])) ?></p>
                        </div>
                        <div class="quiz-actions">
                            <a href="<?= base_url('quiz/edit/' . $q['id']) ?>" class="edit-btn">Edit</a>
                            <form action="<?= base_url('quiz/delete/' . $q['id']) ?>" method="post" style="display:inline;">
                                <?= csrf_field() ?>
                                <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this quiz?')">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Student Submissions - Right Side -->
        <div class="submission-list">
            <h3>Recent Submissions</h3>
            <div id="submissions-container">
                <!-- Submissions will be loaded here -->
            </div>
        </div>
    </div>
</body>
</html>

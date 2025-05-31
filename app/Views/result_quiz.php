<!DOCTYPE html>
<html>
<head>
    <title>Quiz Result</title>
    <style>
        .container { max-width: 800px; margin: 40px auto; padding: 20px; }
        .question { 
            background: #fff;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Quiz: <?= esc($quiz['title'] ?? 'Untitled') ?></h2>
        
        <div class="quiz-info">
            <p><strong>Description:</strong> <?= esc($quiz['description'] ?? 'No description') ?></p>
            <p><strong>Start Date:</strong> <?= esc($quiz['start_date'] ?? 'Not set') ?></p>
            <p><strong>End Date:</strong> <?= esc($quiz['end_date'] ?? 'Not set') ?></p>
            <p><strong>Allow Late:</strong> <?= isset($quiz['allow_late']) && $quiz['allow_late'] ? 'Yes' : 'No' ?></p>
            <p><strong>Attempts Allowed:</strong> <?= $quiz['attempts'] ?? 'Unlimited' ?></p>
        </div>

        <h3>Questions</h3>
        <?php if (!empty($questions)): ?>
            <?php foreach ($questions as $index => $question): ?>
                <div class="question">
                    <p><strong>Q<?= $index + 1 ?>:</strong> <?= esc($question['question_text']) ?></p>
                    <?php 
                    $options = json_decode($question['options'] ?? '[]', true);
                    if (!empty($options)): 
                    ?>
                        <ul>
                            <?php foreach ($options as $i => $option): ?>
                                <li><?= esc($option) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No questions available.</p>
        <?php endif; ?>
    </div>
</body>
</html>

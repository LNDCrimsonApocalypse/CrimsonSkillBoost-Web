<!DOCTYPE html>
<html>
<head>
    <title>Quiz Settings</title>
    <style>
        .settings-container { max-width: 600px; margin: 40px auto; padding: 20px; }
        .form-group { margin-bottom: 20px; }
        .submit-btn {
            background: #e636a4;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="settings-container">
        <h2>Quiz Settings</h2>
        
        <form action="<?= base_url('quiz/save_settings/' . $quiz['id']) ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label>Start Date and Time:</label>
                <input type="datetime-local" name="start_date" 
                       value="<?= old('start_date', isset($quiz['start_date']) ? date('Y-m-d\TH:i', strtotime($quiz['start_date'])) : '') ?>" 
                       required>
            </div>

            <div class="form-group">
                <label>End Date and Time:</label>
                <input type="datetime-local" name="end_date" 
                       value="<?= old('end_date', isset($quiz['end_date']) ? date('Y-m-d\TH:i', strtotime($quiz['end_date'])) : '') ?>" 
                       required>
            </div>

            <div class="form-group">
                <label>Time Limit (minutes):</label>
                <input type="number" name="time_limit" min="1" value="30">
            </div>

            <div class="form-group">
                <label>Passing Score (%):</label>
                <input type="number" name="passing_score" min="1" max="100" value="60">
            </div>

            <div class="form-group">
                <label>
                    <input type="checkbox" name="show_answers">
                    Show Correct Answers After Submission
                </label>
            </div>

            <button type="submit" class="submit-btn">Save & Finish</button>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Quiz</title>
    <style>
        .edit-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .question-block {
            background: #f9f0f7;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        .question-block textarea {
            width: 100%;
            margin-bottom: 10px;
        }
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
    <div class="edit-container">
        <h2>Edit Quiz: <?= esc($quiz['title']) ?></h2>
        
        <!-- Course Dropdown -->
        <div class="form-group">
            <label for="courseDropdown"><b>Course:</b></label>
            <select id="courseDropdown" name="course_id" required>
                <option value="">Loading...</option>
            </select>
        </div>
        
        <form method="post" action="<?= base_url('quiz/update/' . $quiz['id']) ?>">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= esc($quiz['id']) ?>">
            <?php if (isset($quiz['course_id'])): ?>
                <input type="hidden" id="currentCourseId" value="<?= esc($quiz['course_id']) ?>">
            <?php else: ?>
                <input type="hidden" id="currentCourseId" value="">
            <?php endif; ?>

            <div class="form-group">
                <label>Quiz Title:</label>
                <input type="text" name="title" value="<?= esc($quiz['title']) ?>" required>
            </div>

            <div class="form-group">
                <label>Description:</label>
                <textarea name="description"><?= esc($quiz['description']) ?></textarea>
            </div>

            <div class="form-group">
                <label>Start Date:</label>
                <input type="datetime-local" name="start_date" 
                       value="<?= $quiz['start_date'] ? date('Y-m-d\TH:i', strtotime($quiz['start_date'])) : '' ?>">
            </div>

            <div class="form-group">
                <label>End Date:</label>
                <input type="datetime-local" name="end_date" 
                       value="<?= $quiz['end_date'] ? date('Y-m-d\TH:i', strtotime($quiz['end_date'])) : '' ?>">
            </div>

            <div class="form-group">
                <label>Passing Score (%):</label>
                <input type="number" name="passing_score" value="<?= esc($quiz['passing_score'] ?? 60) ?>" min="0" max="100">
            </div>

            <h3>Questions</h3>
            <?php foreach ($questions as $index => $question): ?>
                <div class="question-block">
                    <h4>Question <?= $index + 1 ?></h4>
                    <textarea name="questions[<?= $question['id'] ?>][text]" required><?= esc($question['question_text']) ?></textarea>
                    <input type="number" name="questions[<?= $question['id'] ?>][correct_answer]" 
                           value="<?= esc($question['correct_answer']) ?>" min="0" max="3" required>
                </div>
            <?php endforeach; ?>

            <button type="submit" class="submit-btn">Update Quiz</button>
        </form>
    </div>

    <!-- Firebase SDKs (if not already included) -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
    <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
    <script>
        // Load only user's courses into dropdown and pre-select current
        document.addEventListener("DOMContentLoaded", function() {
            firebase.auth().onAuthStateChanged(function(user) {
                const dropdown = document.getElementById('courseDropdown');
                const currentCourseId = document.getElementById('currentCourseId').value;
                if (!user) {
                    dropdown.innerHTML = '<option value="">Please log in</option>';
                    dropdown.disabled = true;
                    return;
                }
                firebase.firestore().collection("courses")
                    .where("user_id", "==", user.uid)
                    .get()
                    .then(snapshot => {
                        let options = '';
                        snapshot.forEach(doc => {
                            const data = doc.data();
                            const selected = (doc.id === currentCourseId) ? 'selected' : '';
                            options += `<option value="${doc.id}" ${selected}>${data.course_name || doc.id}</option>`;
                        });
                        dropdown.innerHTML = options || '<option value="">No courses found</option>';
                        dropdown.disabled = false;
                    })
                    .catch(() => {
                        dropdown.innerHTML = '<option value="">Failed to load</option>';
                        dropdown.disabled = true;
                    });
            });
        });
    </script>
</body>
</html>

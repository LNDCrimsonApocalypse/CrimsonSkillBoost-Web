<!DOCTYPE html>
<html>
<head>
    <title>Create Quiz Questions</title>
    <style>
        .questions-container { max-width: 800px; margin: 40px auto; padding: 20px; }
        .question-block { border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; border-radius: 8px; }
        .option-group { margin: 10px 0; }
        .add-question-btn, .submit-btn {
            background: #e636a4;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .navbar-right {
            float: right;
        }
        .navbar-right input {
            padding: 5px;
            margin: 10px;
        }
        .navbar-right .icon, .navbar-right .profile {
            width: 30px;
            height: 30px;
            margin: 10px;
            vertical-align: middle;
        }
        .logout-btn {
            background: #e636a4;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-right">
            <input type="text" placeholder="Search.." />
            <img src="imgs/notifications.png" alt="Notifications" class="icon" />
            <img src="imgs/profile.png" alt="Profile" class="profile" />
            <button id="signOutButton" class="logout-btn">Sign Out</button>
        </div>
    </div>

    <div class="questions-container">
        <h2>Create Quiz Questions</h2>
        
        <form action="<?= base_url('quiz/save_questions') ?>" method="post" id="quizForm">
            <?= csrf_field() ?>
            
            <div id="questions">
                <!-- Question blocks will be added here -->
            </div>

            <button type="button" onclick="addQuestion()" class="add-question-btn">Add Question</button>
            <button type="submit" class="submit-btn">Next</button>
        </form>
    </div>

    <script>
        let questionCount = 0;
        
        function addQuestion() {
            questionCount++;
            const questionHtml = `
                <div class="question-block">
                    <input type="text" name="questions[${questionCount}][text]" 
                           placeholder="Question text" required>
                    
                    <div class="option-group">
                        <input type="text" name="questions[${questionCount}][options][]" 
                               placeholder="Option 1" required>
                        <input type="radio" name="questions[${questionCount}][correct]" value="0" required>
                    </div>
                    <div class="option-group">
                        <input type="text" name="questions[${questionCount}][options][]" 
                               placeholder="Option 2" required>
                        <input type="radio" name="questions[${questionCount}][correct]" value="1">
                    </div>
                    <div class="option-group">
                        <input type="text" name="questions[${questionCount}][options][]" 
                               placeholder="Option 3" required>
                        <input type="radio" name="questions[${questionCount}][correct]" value="2">
                    </div>
                    <div class="option-group">
                        <input type="text" name="questions[${questionCount}][options][]" 
                               placeholder="Option 4" required>
                        <input type="radio" name="questions[${questionCount}][correct]" value="3">
                    </div>
                </div>
            `;
            document.getElementById('questions').insertAdjacentHTML('beforeend', questionHtml);
        }

        // Add first question automatically
        window.onload = addQuestion;
    </script>
</body>
</html>

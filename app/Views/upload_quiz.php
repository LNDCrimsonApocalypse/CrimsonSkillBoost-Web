<!DOCTYPE html>
<html>
<head>
    <title>Create Quiz</title>
    <style>
        .quiz-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
        }
        .generation-method {
            margin: 20px 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .method-choice {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .method-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .ai-generate {
            background: #f1ccdd;
            color: #333;
        }
        .manual-create {
            background: #e636a4;
            color: white;
        }
        #fileUpload {
            margin-top: 20px;
            display: none;
        }
        .error-message {
            color: red;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="quiz-container">
        <h2>Create New Quiz</h2>
        
        <?php if (session()->has('error')): ?>
            <div class="error-message">
                <?= esc(session('error')) ?>
            </div>
        <?php endif; ?>
        
        <form method="post" action="<?= base_url('quiz/process_upload') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div>
                <label>Quiz Title:</label><br>
                <input type="text" name="title" required>
            </div>

            <div>
                <label>Description:</label><br>
                <textarea name="description"></textarea>
            </div>

            <div class="generation-method">
                <h3>How would you like to create your questions?</h3>
                <div class="method-choice">
                    <button type="button" class="method-btn ai-generate" onclick="showFileUpload()">
                        Generate with AI
                    </button>
                    <button type="submit" class="method-btn manual-create" formaction="<?= base_url('quiz/manual_create') ?>">
                        Create Manually
                    </button>
                </div>

                <div id="fileUpload">
                    <p>Upload a document to generate questions from (PDF or TXT):</p>
                    <input type="file" name="content_file" accept=".pdf,.txt">
                    <button type="submit" formaction="<?= base_url('quiz/ai_generate') ?>">
                        Generate Questions
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function showFileUpload() {
            document.getElementById('fileUpload').style.display = 'block';
        }
    </script>
</body>
</html>

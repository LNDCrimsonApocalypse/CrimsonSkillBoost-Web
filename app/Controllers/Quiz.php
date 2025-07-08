<?php

namespace App\Controllers;

use App\Helpers\GeminiAI;
use Smalot\PdfParser\Parser;

class Quiz extends BaseController
{
    public function index()
    {
        $course_id = $this->request->getGet('course_id');
        return view('quiz', ['course_id' => $course_id]);
    }

    public function create()
    {
        // Dummy courses
        $courses = [
            ['id' => 1, 'course_name' => 'Sample Course 1'],
            ['id' => 2, 'course_name' => 'Sample Course 2']
        ];

        if ($this->request->getMethod() === 'post') {
            $year = $this->request->getPost('year');
            $section = $this->request->getPost('section');
            $semester = $this->request->getPost('semester');
            $selectedCourses = $this->request->getPost('courses');

            if (empty($selectedCourses)) {
                return view('quiz_create', [
                    'courses' => $courses,
                    'error' => 'Please select at least one course.'
                ]);
            }

            session()->set('quiz_data', [
                'year' => $year,
                'section' => $section,
                'semester' => $semester,
                'courses' => $selectedCourses
            ]);

            return redirect()->to('quiz/upload');
        }

        return view('quiz_create', [
            'courses' => $courses
        ]);
    }

    public function edit($id)
    {
        // Dummy quiz and questions
        if (empty($id) || !is_numeric($id)) {
            return redirect()->to('/quiz')->with('error', 'Invalid quiz ID');
        }

        $quiz = [
            'id' => $id,
            'title' => 'Sample Quiz',
            'description' => 'Sample description',
            'start_date' => '2024-06-01 08:00:00',
            'end_date' => '2024-06-10 17:00:00',
            'passing_score' => 60
        ];
        $questions = [
            ['id' => 1, 'question_text' => 'Sample question 1', 'correct_answer' => 0],
            ['id' => 2, 'question_text' => 'Sample question 2', 'correct_answer' => 1]
        ];

        return view('quiz_edit', [
            'quiz' => $quiz,
            'questions' => $questions
        ]);
    }

    public function addQuestion($quizId)
    {
        if ($this->request->getMethod() === 'post') {
            // Simulate question/option insert
            return redirect()->to('/quiz/edit/' . $quizId);
        }
        return view('question_create', ['quiz_id' => $quizId]);
    }

    // Step 1: Quiz/Task selection page
    public function start()
    {
        return redirect()->to('quiz/upload');
    }

    public function upload()
    {
        return view('upload_quiz');
    }

    public function ai_generate()
    {
        $file = $this->request->getFile('content_file');
        if (!$file || !$file->isValid()) {
            return $this->response->setJSON(['success' => false, 'error' => 'Invalid file']);
        }

        try {
            $fileSize = $file->getSize();
            log_message('debug', '[AI_GENERATE_DEBUG] Uploaded file size: ' . $fileSize);

            $content = $this->extractContent($file);
            $contentPreview = mb_substr($content, 0, 500);
            log_message('debug', '[AI_GENERATE_DEBUG] Extracted content (first 500 chars): ' . $contentPreview);

            if (!$content || strlen(trim($content)) < 10) {
                throw new \Exception(
                    'File content is empty or too short for question generation. ' .
                    'File size: ' . $fileSize . ' bytes. ' .
                    'Extracted content preview: "' . $contentPreview . '"'
                );
            }
            $gemini = new \App\Helpers\GeminiAI();
            $questions = $gemini->generateQuizQuestions($content);

            // If fallback parser returns a single "question" with no options, treat as error/debug
            if (
                empty($questions) ||
                !is_array($questions) ||
                (count($questions) === 1 && isset($questions[0]['question']) && empty($questions[0]['options']))
            ) {
                $rawText = isset($questions[0]['question']) ? $questions[0]['question'] : '';
                throw new \Exception(
                    "No questions were generated. (Debug: Gemini API may not have returned expected format. Raw output: " .
                    ($rawText ? mb_substr($rawText, 0, 1000) : '[empty]') . ")"
                );
            }

            session()->set('generated_questions', $questions);
            return $this->response->setJSON(['success' => true, 'questions' => $questions]);
        } catch (\Throwable $e) {
            // Log the error for debugging
            log_message('error', '[AI_GENERATE_ERROR] ' . $e->getMessage() . "\n" . $e->getTraceAsString());
            return $this->response->setJSON(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    private function extractContent($file)
    {
        $extension = $file->getExtension();
        log_message('debug', '[AI_GENERATE_DEBUG] Uploaded file extension: ' . $extension);

        switch(strtolower($extension)) {
            case 'pdf':
                $parser = new \Smalot\PdfParser\Parser();
                $pdf = $parser->parseFile($file->getTempName());
                return $pdf->getText();

            case 'txt':
                return file_get_contents($file->getTempName());

            case 'docx':
                // DOCX support (requires phpoffice/phpword)
                try {
                    $zip = new \ZipArchive;
                    if ($zip->open($file->getTempName()) === true) {
                        $xml = $zip->getFromName('word/document.xml');
                        $zip->close();
                        $xml = str_replace(['</w:p>', '</w:tbl>'], "\n", $xml);
                        return strip_tags($xml);
                    }
                } catch (\Throwable $e) {
                    throw new \Exception('Failed to extract DOCX: ' . $e->getMessage());
                }
                throw new \Exception('DOCX files are not supported yet');
            default:
                throw new \Exception('Unsupported file type');
        }
    }

    public function questions($quizId)
    {
        // Dummy quiz
        $quiz = [
            'id' => $quizId,
            'title' => 'Sample Quiz'
        ];

        if ($this->request->getMethod() === 'post') {
            // Simulate question insert
            return redirect()->to("quiz/options/{$quizId}")
                           ->with('success', 'Questions added successfully. Now add your options.');
        }

        return view('quiz_questions', [
            'quiz' => $quiz
        ]);
    }

    public function options($quizId)
    {
        // Dummy quiz and questions
        $quiz = [
            'id' => $quizId,
            'title' => 'Sample Quiz'
        ];
        $questions = [
            ['id' => 1, 'question_text' => 'Sample question 1'],
            ['id' => 2, 'question_text' => 'Sample question 2']
        ];

        if ($this->request->getMethod() === 'post') {
            // Simulate option insert
            return redirect()->to('dashboard')
                           ->with('success', 'Quiz created successfully with all questions and options.');
        }

        return view('quiz_options', [
            'quiz' => $quiz,
            'questions' => $questions
        ]);
    }

    // Step 5: Show quiz summary/result
    public function result($quizId = null)
    {
        // Dummy quiz, questions, and allQuizzes
        $quiz = [
            'id' => $quizId ?? 1,
            'title' => 'Sample Quiz',
            'start_date' => '2024-06-01',
            'end_date' => '2024-06-10',
            'created_at' => '2024-06-01'
        ];
        $questions = [
            ['question_text' => 'Sample question 1'],
            ['question_text' => 'Sample question 2'],
            ['question_text' => 'Sample question 3'],
            ['question_text' => 'Sample question 4']
        ];
        $allQuizzes = [
            $quiz,
            [
                'id' => 2,
                'title' => 'Another Quiz',
                'created_at' => '2024-05-20'
            ]
        ];

        return view('result_quiz', [
            'quiz' => $quiz,
            'questions' => $questions,
            'allQuizzes' => $allQuizzes
        ]);
    }

    // Add delete method
    public function delete($quizId)
    {
        // Simulate delete
        return redirect()->to('/dashboard')->with('success', 'Quiz deleted successfully');
    }

    public function startQuizCreation()
    {
        return redirect()->to('quiz/upload');
    }

    public function showUploadForm()
    {
        return view('upload_quiz');
    }

    public function manualCreate()
    {
        $session = session();
        $session->set([
            'quiz_title' => $this->request->getPost('title'),
            'quiz_description' => $this->request->getPost('description')
        ]);
        return redirect()->to('quiz/questions');
    }

    public function showQuestionsForm()
    {
        return view('quiz_questions');
    }

    public function saveQuestions()
    {
        try {
            $questions = $this->request->getPost('questions');
            if (empty($questions)) {
                throw new \Exception('No questions provided');
            }
            // Simulate quiz/question save
            $quizId = 1;
            return redirect()->to("quiz/duedate/$quizId");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function showDueDateForm($quizId)
    {
        // Dummy quiz
        $quiz = [
            'id' => $quizId,
            'title' => 'Sample Quiz'
        ];
        return view('duedate_quiz', ['quiz' => $quiz]);
    }

    public function saveSettings($quizId)
    {
        // Simulate update
        return redirect()->to("quiz/result/$quizId");
    }

    public function update($id)
    {
        // Simulate update
        return redirect()->to('/quiz/result/' . $id)
                       ->with('success', 'Quiz updated successfully');
    }
}

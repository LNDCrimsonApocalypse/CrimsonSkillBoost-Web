<?php

namespace App\Controllers;

use App\Helpers\GeminiAI;
use Smalot\PdfParser\Parser;

use App\Models\QuizModel;
use App\Models\CourseModel;
use App\Models\QuestionModel;
use App\Models\OptionModel;

class Quiz extends BaseController
{
    public function index()
    {
        $quizModel = new QuizModel();
        $quizzes = $quizModel->findAll();
        return view('quiz_list', ['quizzes' => $quizzes]);
    }

    public function create()
    {
        $courseModel = new CourseModel();
        $courses = $courseModel->findAll();
        
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

            // Store in session and redirect
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
        $quizModel = new QuizModel();
        $questionModel = new QuestionModel();
        $quiz = $quizModel->find($id);
        $questions = $questionModel->where('quiz_id', $id)->findAll();
        return view('quiz_edit', ['quiz' => $quiz, 'questions' => $questions]);
    }

    public function addQuestion($quizId)
    {
        if ($this->request->getMethod() === 'post') {
            $questionModel = new QuestionModel();
            $optionModel = new OptionModel();
            $questionData = [
                'quiz_id' => $quizId,
                'question_text' => $this->request->getPost('question_text'),
            ];
            $questionId = $questionModel->insert($questionData);

            $options = $this->request->getPost('options');
            $correct = $this->request->getPost('correct_option');
            foreach ($options as $idx => $optionText) {
                $optionModel->insert([
                    'question_id' => $questionId,
                    'option_text' => $optionText,
                    'is_correct' => ($correct == $idx) ? 1 : 0,
                ]);
            }
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
        if (!$file->isValid()) {
            return redirect()->back()->with('error', 'Invalid file');
        }

        try {
            $content = $this->extractContent($file);
            $gemini = new GeminiAI();
            $questions = $gemini->generateQuizQuestions($content);

            if (empty($questions)) {
                throw new \Exception('No questions were generated');
            }

            session()->set('generated_questions', $questions);
            return redirect()->to('quiz/questions');

        } catch (\Exception $e) {
            log_message('error', 'Quiz generation error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Failed to generate quiz: ' . $e->getMessage());
        }
    }

    private function extractContent($file)
    {
        $extension = $file->getExtension();
        
        switch(strtolower($extension)) {
            case 'pdf':
                $parser = new Parser();
                $pdf = $parser->parseFile($file->getTempName());
                return $pdf->getText();
            
            case 'txt':
                return file_get_contents($file->getTempName());
            
            case 'docx':
                // Add docx support if needed
                throw new \Exception('DOCX files are not supported yet');
            
            default:
                throw new \Exception('Unsupported file type');
        }
    }

    public function questions($quizId)
    {
        $quizModel = new QuizModel();
        $quiz = $quizModel->find($quizId);

        if (!$quiz) {
            return redirect()->to('quiz/create')
                           ->with('error', 'Quiz not found');
        }

        if ($this->request->getMethod() === 'post') {
            $questionModel = new QuestionModel();
            $questions = $this->request->getPost('questions');
            
            foreach ($questions as $question) {
                $questionModel->insert([
                    'quiz_id' => $quizId,
                    'question_text' => $question['text'],
                    'points' => $question['points'] ?? 1
                ]);
            }

            return redirect()->to("quiz/options/{$quizId}")
                           ->with('success', 'Questions added successfully. Now add your options.');
        }

        return view('quiz_questions', [
            'quiz' => $quiz
        ]);
    }

    public function options($quizId)
    {
        $quizModel = new QuizModel();
        $questionModel = new QuestionModel();
        
        $quiz = $quizModel->find($quizId);
        $questions = $questionModel->where('quiz_id', $quizId)->findAll();

        if (!$quiz || empty($questions)) {
            return redirect()->to('quiz/create')
                           ->with('error', 'Quiz or questions not found');
        }

        if ($this->request->getMethod() === 'post') {
            $optionModel = new OptionModel();
            $options = $this->request->getPost('options');
            
            foreach ($options as $questionId => $questionOptions) {
                foreach ($questionOptions as $option) {
                    $optionModel->insert([
                        'question_id' => $questionId,
                        'option_text' => $option['text'],
                        'is_correct' => isset($option['is_correct']) ? 1 : 0
                    ]);
                }
            }

            return redirect()->to('dashboard')
                           ->with('success', 'Quiz created successfully with all questions and options.');
        }

        return view('quiz_options', [
            'quiz' => $quiz,
            'questions' => $questions
        ]);
    }

    // Step 5: Show quiz summary/result
    public function result($quizId)
    {
        try {
            $quizModel = new \App\Models\QuizModel();
            $questionModel = new \App\Models\QuestionModel();
            
            $quiz = $quizModel->find($quizId);
            if (!$quiz) {
                throw new \Exception('Quiz not found');
            }

            // Get questions for this quiz
            $questions = $questionModel->where('quiz_id', $quizId)->findAll();
            if ($questions === false) {
                $questions = []; // Ensure questions is always an array
            }

            $data = [
                'quiz' => $quiz,
                'questions' => $questions
            ];

            return view('result_quiz', $data);

        } catch (\Exception $e) {
            log_message('error', '[Quiz] View error: ' . $e->getMessage());
            return redirect()->to('quiz/upload')
                           ->with('error', $e->getMessage());
        }
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
        // Store basic quiz info in session
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
            // Get questions from POST data
            $questions = $this->request->getPost('questions');
            if (empty($questions)) {
                throw new \Exception('No questions provided');
            }

            $session = session();
            $quizData = [
                'course_id' => null, // Set to null for now
                'title' => $session->get('quiz_title'),
                'description' => $session->get('quiz_description'),
                'created_by' => 1 // Default user ID
            ];

            // Start transaction
            $db = \Config\Database::connect();
            $db->transStart();

            // Save quiz
            $quizModel = new \App\Models\QuizModel();
            if (!$quizModel->save($quizData)) {
                throw new \Exception('Failed to save quiz');
            }

            $quizId = $quizModel->getInsertID();
            $questionModel = new \App\Models\QuestionModel();

            // Save each question
            foreach ($questions as $q) {
                $questionData = [
                    'quiz_id' => $quizId,
                    'question_text' => $q['text'],
                    'options' => json_encode($q['options']),
                    'correct_answer' => $q['correct']
                ];
                
                if (!$questionModel->save($questionData)) {
                    throw new \Exception('Failed to save question');
                }
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Database transaction failed');
            }

            return redirect()->to("quiz/duedate/$quizId");

        } catch (\Exception $e) {
            log_message('error', '[Quiz] Create error: ' . $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function showDueDateForm($quizId)
    {
        $quizModel = new \App\Models\QuizModel();
        $quiz = $quizModel->find($quizId);
        
        if (!$quiz) {
            return redirect()->to('quiz/upload')->with('error', 'Quiz not found');
        }

        return view('duedate_quiz', ['quiz' => $quiz]);
    }

    public function saveSettings($quizId)
    {
        $quizModel = new \App\Models\QuizModel();
        
        // Format dates for database
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');
        
        $data = [
            'start_date' => date('Y-m-d H:i:s', strtotime($startDate)),
            'end_date' => date('Y-m-d H:i:s', strtotime($endDate)),
            'allow_late' => $this->request->getPost('allow_late') ? 1 : 0,
            'attempts' => (int)$this->request->getPost('attempts') ?: null
        ];

        try {
            if ($quizModel->update($quizId, $data)) {
                return redirect()->to("quiz/result/$quizId");
            }
            // If update fails, get the error
            $error = $quizModel->errors();
            return redirect()->back()
                           ->with('error', 'Failed to save settings: ' . json_encode($error));
        } catch (\Exception $e) {
            log_message('error', '[Quiz] Save settings error: ' . $e->getMessage());
            return redirect()->back()
                           ->with('error', 'Database error: ' . $e->getMessage());
        }
    }
}

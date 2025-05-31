<?php

namespace App\Controllers;

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
    public function upload()
    {
        $quizData = session()->get('quiz_data');
        if (!$quizData) {
            return redirect()->to('quiz/create');
        }

        if ($this->request->getMethod() === 'post') {
            $quizModel = new QuizModel();
            
            $data = [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'year' => $quizData['year'],
                'section' => $quizData['section'],
                'semester' => $quizData['semester'],
                'courses' => json_encode($quizData['courses']),
                'duration' => $this->request->getPost('duration'),
                'total_questions' => $this->request->getPost('total_questions'),
                'passing_score' => $this->request->getPost('passing_score'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            if ($quizModel->insert($data)) {
                $quizId = $quizModel->insertID();
                session()->remove('quiz_data');
                return redirect()->to("quiz/questions/{$quizId}")
                               ->with('success', 'Quiz created successfully. Now add your questions.');
            } else {
                return redirect()->back()
                               ->with('error', 'Failed to create quiz. Please try again.')
                               ->withInput();
            }
        }

        return view('upload_quiz', [
            'quizData' => $quizData
        ]);
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
        $quizModel = new QuizModel();
        $questionModel = new QuestionModel();
        $optionModel = new OptionModel();
        $quiz = $quizModel->find($quizId);
        $questions = $questionModel->where('quiz_id', $quizId)->findAll();
        // Optionally fetch options for each question
        return view('result_quiz', [
            'quiz' => $quiz,
            'questions' => $questions,
            // 'options' => ... (if needed)
        ]);
    }
}

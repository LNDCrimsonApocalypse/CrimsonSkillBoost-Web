<?php

namespace App\Controllers;

use App\Models\QuizModel;
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
        if ($this->request->getMethod() === 'post') {
            $quizModel = new QuizModel();
            $data = [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'allow_late' => $this->request->getPost('allow_late') ? 1 : 0,
                'attempts' => $this->request->getPost('attempts'),
                'created_by' => 1, // Replace with session user id
                'topic_id' => $this->request->getPost('topic_id'),
            ];
            $quizId = $quizModel->insert($data);
            return redirect()->to('/quiz/edit/' . $quizId);
        }
        return view('quiz_create');
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
        return view('upload');
    }

    // Step 2: Quiz upload/import/create
    public function uploadQuiz()
    {
        if ($this->request->getMethod() === 'post') {
            // Handle import or create
            $quizName = $this->request->getPost('quiz_name');
            $quizModel = new QuizModel();
            $quizId = $quizModel->insert([
                'title' => $quizName,
                'created_by' => 1, // Replace with session user id
            ]);
            return redirect()->to('/quiz/options/' . $quizId);
        }
        return view('upload_quiz');
    }

    // Step 3: Add questions/options
    public function quizOptions($quizId)
    {
        $questionModel = new QuestionModel();
        $optionModel = new OptionModel();

        if ($this->request->getMethod() === 'post') {
            $questionText = $this->request->getPost('question_text');
            $options = $this->request->getPost('options');
            $correct = $this->request->getPost('correct_option');
            $questionId = $questionModel->insert([
                'quiz_id' => $quizId,
                'question_text' => $questionText,
            ]);
            foreach ($options as $idx => $optionText) {
                $optionModel->insert([
                    'question_id' => $questionId,
                    'option_text' => $optionText,
                    'is_correct' => ($correct == $idx) ? 1 : 0,
                ]);
            }
            // Optionally allow adding more questions or proceed
            return redirect()->to('/quiz/duedate/' . $quizId);
        }
        return view('quiz_options', ['quiz_id' => $quizId]);
    }

    // Step 4: Set due date/options
    public function duedate($quizId)
    {
        $quizModel = new QuizModel();
        if ($this->request->getMethod() === 'post') {
            $quizModel->update($quizId, [
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'allow_late' => $this->request->getPost('allow_late') ? 1 : 0,
                'attempts' => $this->request->getPost('attempts'),
            ]);
            return redirect()->to('/quiz/result/' . $quizId);
        }
        $quiz = $quizModel->find($quizId);
        return view('duedate_quiz', ['quiz' => $quiz]);
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

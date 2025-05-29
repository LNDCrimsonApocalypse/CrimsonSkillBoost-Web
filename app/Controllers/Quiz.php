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
}

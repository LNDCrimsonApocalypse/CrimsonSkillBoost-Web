<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function verify()
    {
        $json = $this->request->getJSON(true); // Ensure associative array
        $idToken = $json['token'] ?? null;

        if (!$idToken) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Missing token'
            ])->setStatusCode(400);
        }

        $FIREBASE_API_KEY = "AIzaSyAQ87eb5RehN6PiJggR711yMfGrY39ulYU";
        $verifyUrl = "https://identitytoolkit.googleapis.com/v1/accounts:lookup?key={$FIREBASE_API_KEY}";

        $client = \Config\Services::curlrequest();

        try {
            $response = $client->post($verifyUrl, [
                'headers' => ['Content-Type' => 'application/json'],
                'body'    => json_encode(['idToken' => $idToken])
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['users'][0])) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'email'  => $data['users'][0]['email']
                ]);
            } else {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Token verification failed'
                ])->setStatusCode(401);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Exception during token verification',
                'error'   => $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    public function verifyCodeInput()
    {
        $email = $this->request->getGet('email');
        return view('verify_code', ['email' => $email]);
    }

    public function sendVerificationCode()
    {
        $data = $this->request->getJSON(true);
        $email = $data['email'] ?? null;
        $code = $data['code'] ?? null;
        if (!$email || !$code) {
            return $this->response->setJSON(['error' => 'Missing email or code'])->setStatusCode(400);
        }
        $emailService = \Config\Services::email();
        $emailService->setFrom('keisuk3.1114@gmail.com', 'CrimsonSkillBoost'); // Update to your email
        $emailService->setTo($email);
        $emailService->setSubject('Your Verification Code');
        $emailService->setMessage(
            "Dear user,<br><br>" .
            "Your verification code is <strong>{$code}</strong>.<br>" .
            "Please enter this code to verify your account.<br><br>" .
            "Thank you!<br>CrimsonSkillBoost Team"
        );
        $emailService->setMailType('html');
        if ($emailService->send()) {
            return $this->response->setJSON(['success' => true]);
        }
        // Return error with debug info if sending fails
        return $this->response->setJSON([
            'error' => 'Failed to send email',
            'debug' => $emailService->printDebugger(['headers'])
        ])->setStatusCode(500);
    }

    public function setupProfile()
    {
        return view('setup_profile');
    }

    public function editprofile()
    {
        return view('editprofile');
    }

    public function homepage()
    {
        return view('homepage');
    }

    public function dashboard()
    {
        try {
            // Dummy data for dashboard
            $courses = [
                ['id' => 1, 'course_name' => 'Sample Course 1'],
                ['id' => 2, 'course_name' => 'Sample Course 2']
            ];
            $submissions = [
                [
                    'id' => 1,
                    'student_name' => 'Juan Dela Cruz',
                    'task_title' => 'Task 1',
                    'submitted_at' => '2024-06-01',
                    'status' => 'graded',
                    'score' => 95
                ]
            ];
            $enrollmentRequests = [
                ['id' => 1, 'student_id' => 1, 'course_id' => 1, 'section' => 'A', 'status' => 'pending']
            ];

            $data = [
                'courses' => $courses,
                'submissions' => $submissions,
                'enrollmentRequests' => $enrollmentRequests
            ];

            foreach ($data['rows'] as &$row) {
                if (!isset($row['created_at'])) {
                    $row['created_at'] = 'N/A';
                }
            }

            return view('dashboard', $data);

        } catch (\Exception $e) {
            return view('dashboard', ['error' => 'Failed to load dashboard data']);
        }
    }
    public function getCourses()
    {
        // Dummy courses
        $courses = [
            ['id' => 1, 'course_name' => 'Sample Course 1'],
            ['id' => 2, 'course_name' => 'Sample Course 2']
        ];
        return $this->response->setJSON($courses);
    }

    public function getLessons()
    {
        // Dummy lessons
        $lessons = [
            [
                'id' => 1,
                'title' => 'Sample Lesson 1',
                'course_id' => 1,
                'created_at' => '2024-06-01',
                'description' => 'Sample description 1',
                'content' => 'Content 1'
            ],
            [
                'id' => 2,
                'title' => 'Sample Lesson 2',
                'course_id' => 2,
                'created_at' => '2024-06-02',
                'description' => 'Sample description 2',
                'content' => 'Content 2'
            ]
        ];
        return $this->response->setJSON($lessons);
    }

    public function getTasks()
    {
        // Dummy tasks
        $tasks = [
            [
                'id' => 1,
                'title' => 'Sample Task',
                'description' => 'Sample description',
                'year' => 2024,
                'section' => 'A',
                'semester' => 1,
                'courses' => json_encode([1,2]),
                'start_date' => '2024-06-01',
                'end_date' => '2024-06-10',
                'allow_late' => 0,
                'attempts' => 1,
                'created_at' => '2024-06-01',
                'updated_at' => '2024-06-01'
            ]
        ];
        return $this->response->setJSON($tasks);
    }

    // Add: Get details for a single task by ID (for Android)
    public function getTaskDetails()
    {
        $taskId = $this->request->getGet('taskId');
        if (!$taskId) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Missing taskId'
            ])->setStatusCode(400);
        }
        // Dummy task
        $task = [
            'id' => $taskId,
            'title' => 'Sample Task',
            'description' => 'Sample description',
            'year' => 2024,
            'section' => 'A',
            'semester' => 1,
            'courses' => json_encode([1,2]),
            'start_date' => '2024-06-01',
            'end_date' => '2024-06-10',
            'allow_late' => 0,
            'attempts' => 1,
            'created_at' => '2024-06-01',
            'updated_at' => '2024-06-01'
        ];
        return $this->response->setJSON($task);
    }

    // Add: Upload/update file path for a task (for Android)
    public function uploadTask()
    {
        $taskId = $this->request->getGet('taskId');
        $filePath = $this->request->getGet('filePath');
        if (!$taskId || !$filePath) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Missing taskId or filePath'
            ])->setStatusCode(400);
        }
        // Simulate update
        return $this->response->setJSON(['success' => true]);
    }

    public function getQuizzes()
    {
        // Dummy quizzes
        $quizzes = [
            [
                'id' => 1,
                'title' => 'Sample Quiz',
                'start_date' => '2024-06-01',
                'end_date' => '2024-06-10',
                'created_at' => '2024-06-01'
            ]
        ];
        return $this->response->setJSON($quizzes);
    }

    public function getQuizQuestions()
    {
        // Dummy questions
        $questions = [
            ['id' => 1, 'quiz_id' => 1, 'question_text' => 'Sample question 1', 'options' => json_encode(['A','B','C','D']), 'correct_answer' => 0],
            ['id' => 2, 'quiz_id' => 1, 'question_text' => 'Sample question 2', 'options' => json_encode(['A','B','C','D']), 'correct_answer' => 1]
        ];
        return $this->response->setJSON($questions);
    }

    public function getSubmissions()
    {
        // Dummy submissions
        $submissions = [
            [
                'id' => 1,
                'student_id' => 1,
                'task_id' => 1,
                'score' => 95,
                'status' => 'graded',
                'submitted_at' => '2024-06-01 10:00:00',
                'graded_at' => '2024-06-01 12:00:00'
            ]
        ];
        return $this->response->setJSON($submissions);
    }

    public function saveProfile()
    {
        $json = $this->request->getJSON(true);

        if (!$json || !isset($json['idToken'])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Missing ID token'
            ])->setStatusCode(400);
        }

        $FIREBASE_API_KEY = "AIzaSyAQ87eb5RehN6PiJggR711yMfGrY39ulYU";
        $verifyUrl = "https://identitytoolkit.googleapis.com/v1/accounts:lookup?key={$FIREBASE_API_KEY}";

        $client = \Config\Services::curlrequest();

        $response = $client->post($verifyUrl, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode(['idToken' => $json['idToken']])
        ]);

        $data = json_decode($response->getBody(), true);

        if (!isset($data['users'][0]['localId'])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid token'
            ])->setStatusCode(401);
        }

        $uid = $data['users'][0]['localId'];

        $profile = [
            'uid'      => $uid,
            'username' => $json['username'] ?? '',
            'birthday' => $json['birthday'] ?? '',
            'gender'   => $json['gender'] ?? '',
            'bio'      => $json['bio'] ?? '',
            'role'     => 'educator' // Automatically assign educator role
        ];

        // Your Realtime Database URL (set this in .env or config)
        $firebaseDbUrl = getenv('https://csboostcmo-default-rtdb.firebaseio.com/');
        $path = "/users/{$uid}.json";

        $putResponse = $client->setBody(json_encode($profile))
            ->setHeader('Content-Type', 'application/json')
            ->put($firebaseDbUrl . $path);

        if ($putResponse->getStatusCode() === 200) {
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Profile saved successfully'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to save profile'
            ])->setStatusCode(500);
        }
    }

    public function uploadLesson()
    {
        try {
            $json = $this->request->getJSON(true);

            if (!$json || !isset($json['idToken']) || !isset($json['title']) || !isset($json['content'])) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Missing required fields'
                ])->setStatusCode(400);
            }

            // Firebase ID token verification
            $FIREBASE_API_KEY = "AIzaSyAQ87eb5RehN6PiJggR711yMfGrY39ulYU";
            $verifyUrl = "https://identitytoolkit.googleapis.com/v1/accounts:lookup?key={$FIREBASE_API_KEY}";

            $client = \Config\Services::curlrequest();
            $response = $client->post($verifyUrl, [
                'headers' => ['Content-Type' => 'application/json'],
                'body' => json_encode(['idToken' => $json['idToken']])
            ]);

            $data = json_decode($response->getBody(), true);

            if (!isset($data['users'][0]['localId'])) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Invalid token'
                ])->setStatusCode(401);
            }

            $uid = $data['users'][0]['localId'];

            // Save lesson to DB
            $lessonModel = new \App\Models\LessonModel();
            $lessonData = [
                'uid'        => $uid,
                'title'      => $json['title'],
                'description'=> $json['description'] ?? '',
                'content'    => $json['content'],
                'created_at' => date('Y-m-d H:i:s')
            ];

            if ($lessonModel->insert($lessonData)) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Lesson uploaded successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Failed to upload lesson'
                ])->setStatusCode(500);
            }
        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Server error: ' . $e->getMessage()
            ])->setStatusCode(500);
        }
    }


    public function calculateGrade()
    {
        $json = $this->request->getJSON(true);

        if (
            !$json || !isset($json['idToken']) ||
            !isset($json['student_id']) ||
            !isset($json['grades']) || !is_array($json['grades'])
        ) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Missing required data'
            ])->setStatusCode(400);
        }

        // Firebase token verification
        $FIREBASE_API_KEY = "AIzaSyAQ87eb5RehN6PiJggR711yMfGrY39ulYU";
        $verifyUrl = "https://identitytoolkit.googleapis.com/v1/accounts:lookup?key={$FIREBASE_API_KEY}";

        $client = \Config\Services::curlrequest();
        $response = $client->post($verifyUrl, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode(['idToken' => $json['idToken']])
        ]);

        $data = json_decode($response->getBody(), true);

        if (!isset($data['users'][0]['localId'])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid token'
            ])->setStatusCode(401);
        }

        $educatorUid = $data['users'][0]['localId'];
        $studentId = $json['student_id'];
        $grades = $json['grades']; // example: [85, 90, 78]

        $average = array_sum($grades) / count($grades);
        $gradeModel = new \App\Models\GradeModel();

        $gradeData = [
            'educator_uid' => $educatorUid,
            'student_id'   => $studentId,
            'grades'       => json_encode($grades),
            'average'      => $average,
            'created_at'   => date('Y-m-d H:i:s')
        ];

        if ($gradeModel->insert($gradeData)) {
            return $this->response->setJSON([
                'status' => 'success',
                'average' => $average,
                'message' => 'Grade calculated and saved successfully'
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to save grade'
            ])->setStatusCode(500);
        }
    }

    public function terms()
    {
        return view('terms_conditions');
    }

    public function initial()
    {
        return view('homepage_initial');
    }

    public function topics()
    {
        return view('topics');
    }

    public function aboutus()
    {
        return view('aboutus');
    }

    public function loggedin()
    {
        return view('loggedin');
    }

    public function forgetPassword()
    {
        return view('password_reset');
    }

    public function upload()
    {
        return view('upload');
    }

    public function upload_profile_pic()
    {
        $uid = $this->request->getPost('uid');
        $file = $this->request->getFile('profile_pic');
        if (!$file->isValid()) {
            return $this->response->setJSON(['success' => false, 'error' => 'Invalid file']);
        }
        $newName = $uid . '_' . time() . '.' . $file->getExtension();
        $uploadPath = FCPATH . 'public/uploads/profile_pics/';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }
        $file->move($uploadPath, $newName);
        $url = base_url('public/uploads/profile_pics/' . $newName);
        return $this->response->setJSON(['success' => true, 'url' => $url]);
    }

}

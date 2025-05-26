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

    public function setupProfile()
    {
        return view('setup_profile');
    }

    public function homepage()
    {
        return view('homepage');
    }

    public function dashboard()
    {
        helper('text'); // ✅ This loads the helper that contains word_limiter()

        $courseModel = new \App\Models\CourseModel();
        $data['courses'] = $courseModel->findAll();

        return view('dashboard', $data);
    }
    
    public function getCourses()
    {
        $courseModel = new \App\Models\CourseModel();
        $courses = $courseModel->findAll();

        return $this->response->setJSON($courses);
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

}

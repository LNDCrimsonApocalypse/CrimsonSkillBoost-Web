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
        $json = $this->request->getJSON();
        $idToken = $json->token;

        $FIREBASE_API_KEY = "AIzaSyAQ87eb5RehN6PiJggR711yMfGrY39ulYU";
        $verifyUrl = "https://identitytoolkit.googleapis.com/v1/accounts:lookup?key={$FIREBASE_API_KEY}";

        $client = \Config\Services::curlrequest();

        $response = $client->post($verifyUrl, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode(['idToken' => $idToken])
        ]);

        $data = json_decode($response->getBody(), true);

        if (isset($data['users'][0])) {
            return $this->response->setJSON([
                'status' => 'success',
                'email' => $data['users'][0]['email']
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid token'
            ])->setStatusCode(401);
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
        return view('dashboard');
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
}

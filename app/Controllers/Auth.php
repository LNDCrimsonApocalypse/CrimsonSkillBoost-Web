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

        // Your Firebase Web API key
        $FIREBASE_API_KEY = "AIzaSyAQ87eb5RehN6PiJggR711yMfGrY39ulYU";

        // URL to validate the ID token via Firebase
        $verifyUrl = "https://identitytoolkit.googleapis.com/v1/accounts:lookup?key={$FIREBASE_API_KEY}";

        $client = \Config\Services::curlrequest();

        // Send POST request to Firebase for token verification
        $response = $client->post($verifyUrl, [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode(['idToken' => $idToken])
        ]);

        $data = json_decode($response->getBody(), true);

        // Check if Firebase returned user data
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


}

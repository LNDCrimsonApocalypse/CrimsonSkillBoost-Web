<?php
require_once 'vendor/autoload.php'; // Make sure Firebase JWT is installed via Composer

use \Firebase\JWT\JWT;
use \Firebase\JWT\JWK;

// Read JSON input
$input = json_decode(file_get_contents('php://input'), true);

$firebaseProjectId = 'cmo-boost-2'; // CHANGE THIS
$idToken = $input['idToken'] ?? '';

if (!$idToken) {
    http_response_code(401);
    echo json_encode(['message' => 'Missing Firebase ID Token']);
    exit;
}

// Get Firebase public keys
$keys = json_decode(file_get_contents('https://www.googleapis.com/robot/v1/metadata/x509/securetoken@system.gserviceaccount.com'), true);

try {
    $decoded = JWT::decode($idToken, JWK::parseKeySet($keys), ['RS256']);

    if ($decoded->aud !== $firebaseProjectId || $decoded->iss !== "https://securetoken.google.com/{$firebaseProjectId}") {
        throw new Exception('Invalid token claims');
    }

    // Extract user info from token
    $firebase_uid = $decoded->sub;
    $email = $decoded->email ?? null;

    // Extract additional data
    $username = $input['username'] ?? '';
    $birthday = $input['birthday'] ?? null;
    $gender = $input['gender'] ?? '';
    $bio = $input['bio'] ?? '';

    // Database connection
    // $pdo = new PDO("mysql:host=localhost;dbname=cmoboost", "your_user", "your_password");
    $pdo = new PDO("mysql:host=localhost;dbname=cmo-boost-2", null, null);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insert or update user profile
    $stmt = $pdo->prepare("
        INSERT INTO user_profiles (firebase_uid, email, username, birthday, gender, bio)
        VALUES (:firebase_uid, :email, :username, :birthday, :gender, :bio)
        ON DUPLICATE KEY UPDATE 
            username = :username,
            birthday = :birthday,
            gender = :gender,
            bio = :bio
    ");

    $stmt->execute([
        ':firebase_uid' => $firebase_uid,
        ':email' => $email,
        ':username' => $username,
        ':birthday' => $birthday,
        ':gender' => $gender,
        ':bio' => $bio,
    ]);

    echo json_encode(['message' => 'Profile saved successfully.']);

} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(['message' => 'Unauthorized: ' . $e->getMessage()]);
    exit;
}

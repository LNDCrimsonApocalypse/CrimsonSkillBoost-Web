<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Optional: Default route (redirect to login)
$routes->get('/', 'Auth::initial');

// Manual route definitions
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->get('/verify_code', 'Auth::verifyCodeInput');
$routes->get('/setup_profile', 'Auth::setupProfile');
$routes->get('/profile', 'Auth::profile');
$routes->get('/homepage', 'Auth::homepage');
$routes->get('/dashboard', 'Auth::dashboard');
$routes->post('/auth/verify', 'Auth::verify');
$routes->post('profile/save', 'Profile::save');
$routes->post('profile/save', 'Auth::saveProfile');
$routes->get('lessons-dashboard', 'LessonsController::index');
$routes->get('lesson/(:num)', 'Lesson::view/$1'); // For viewing a single lesson
$routes->get('lessons', 'Lesson::index'); // Optional: full lessons list
$routes->get('/auth/get-courses', 'Auth::getCourses');
$routes->get('/auth/get-lessons', 'Auth::getLessons');
$routes->get('/auth/get-tasks', 'Auth::getTasks');
$routes->get('/auth/get-task-details', 'Auth::getTaskDetails');
$routes->post('/auth/upload-task', 'Auth::uploadTask');
$routes->get('/auth/get-quizzes', 'Auth::getQuizzes');
$routes->get('/auth/get-quiz-questions', 'Auth::getQuizQuestions');
$routes->get('/auth/get-submissions', 'Auth::getSubmissions');
$routes->post('/auth/upload-lesson', 'Auth::uploadLesson');
$routes->post('/grades/calculate', 'Auth::calculateGrade'); // or 'GradesController::calculateGrade'
$routes->get('/test/upload_lessons', 'TestPages::uploadLesson');
$routes->get('/test/calculate_grade', 'TestPages::calculateGrade');
$routes->get('/course', 'Course::index');
$routes->get('/course/edit/(:num)', 'Course::edit/$1');
$routes->post('/course/update/(:num)', 'Course::update/$1');
$routes->post('/course/delete/(:num)', 'Course::delete/$1');
$routes->get('terms', 'Auth::terms');
$routes->get('topics', to: 'Auth::topics');
$routes->get(from: 'aboutus', to: 'Auth::aboutus');
$routes->get(from: 'loggedin', to: 'Auth::loggedin');
$routes->get(from: 'password_reset', to: 'Auth::forgetPassword');
$routes->get(from: 'course/view/(:num)', to: 'Course::view/$1');
$routes->get('lesson/view/(:num)', 'LessonController::view/$1');
$routes->get('/upload', 'Auth::upload');
$routes->get('course_view', 'Course::view');
$routes->get('course/(:num)', 'Course::view/$1');
$routes->get('course_view/(:num)', 'Course::view/$1'); // Optional alias
$routes->get('allcourses', 'Allcourses::index');

$routes->get('lesson_view/(:num)', 'LessonView::index/$1');

// QUIZ FLOW
$routes->post('quiz/start', 'Quiz::startQuizCreation');
$routes->get('quiz/upload', 'Quiz::showUploadForm');
$routes->post('quiz/manual_create', 'Quiz::manualCreate');
$routes->post('quiz/ai_generate', 'Quiz::ai_generate');
$routes->get('quiz/questions', 'Quiz::showQuestionsForm');
$routes->post('quiz/save_questions', 'Quiz::saveQuestions');
$routes->get('quiz/result', 'Quiz::result'); // Add base result route without ID
$routes->get('quiz/result/(:num)', 'Quiz::result/$1'); // Keep specific ID route
$routes->get('quiz/duedate/(:num)', 'Quiz::showDueDateForm/$1');
$routes->post('quiz/save_settings/(:num)', 'Quiz::saveSettings/$1');
$routes->get('quiz/edit/(:num)', 'Quiz::edit/$1');
$routes->post('quiz/update/(:num)', 'Quiz::update/$1');
$routes->post('quiz/delete/(:num)', 'Quiz::delete/$1');
$routes->get('quiz_edit/(:num)', 'QuizEdit::index/$1');
$routes->get('quiz', 'Quiz::index');

// TASK FLOW
$routes->post('task/start', 'Task::startTaskCreation');
$routes->get('task/assign', 'Task::showAssignForm');
$routes->post('task/assign', 'Task::processAssign');
$routes->get('task/upload', 'Task::showUploadForm');
$routes->post('task/upload', 'Task::processUpload');
$routes->get('task/result', 'Task::result'); // Add base result route without ID
$routes->get('task/result/(:num)', 'Task::result/$1'); // Keep specific ID route
$routes->get('task/duedate/(:num)', 'Task::showDueDateForm/$1');
$routes->post('task/duedate/(:num)', 'Task::processDueDate/$1');
$routes->get('task/download/(:num)', 'Task::download/$1');
$routes->post('task/grade/(:num)', 'Task::grade/$1');
$routes->get('task/submissions/(:num)', 'Task::getSubmissions/$1');
$routes->get('task/edit/(:num)', 'Task::edit/$1');
$routes->post('task/delete/(:num)', 'Task::delete/$1');


// Debug route
$routes->get('task/debug-submissions/(:num)', 'Task::debugSubmissions/$1');

// Grading routes
$routes->group('grading', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('overview', 'Grading::overview');
    $routes->get('student/(:num)', 'Grading::studentOverview/$1');
    $routes->post('save/(:num)', 'Grading::save/$1', ['filter' => 'ajax']);
});

$routes->get('enrollment', 'Enrollment::index');
$routes->post('enrollment/submit', 'Enrollment::submitRequest');
$routes->post('enrollment/update/(:num)', 'Enrollment::updateRequest/$1');
$routes->get('enrollment_req', 'Enrollment::requests');
$routes->post('enrollment/apiSubmit', 'Enrollment::apiSubmit');
$routes->get('enrollment/apiStudentRequests/(:num)', 'Enrollment::apiStudentRequests/$1');
$routes->get('enrollment/apiCourseRequests/(:num)', 'Enrollment::apiCourseRequests/$1');
$routes->post('enrollment/apiUpdateStatus/(:num)', 'Enrollment::apiUpdateStatus/$1');
$routes->get('enrollment/apiPending', 'Enrollment::apiPending');

$routes->get('notif', 'Notif::index');
$routes->get('recentsub', 'Recentsub::index');
$routes->match(['get', 'post'], 'enrollment/enroll-in-course', 'Enrollment::enrollInCourse');
$routes->get('lesson1', 'Lesson1::index');
$routes->get('create_task', 'CreateTask::index');
$routes->get('duedate_task', 'DuedateTask::index');
$routes->get('result_task/(:num)', 'ResultTask::index/$1');
$routes->get('taskresult', 'Taskresult::index');
$routes->get('upload_quiz', 'UploadQuiz::index');
$routes->get('result_quiz/(:num)', 'ResultQuiz::index/$1');
$routes->post('send-verification-code', 'Auth::send_verification_code');
$routes->get('studentprog', 'Studentprog::index');

<?php

namespace App\Controllers;

class Course extends BaseController
{
    public function index()
    {
        // Dummy data instead of SQL
        $data['courses'] = [
            ['id' => 1, 'course_name' => 'Sample Course 1'],
            ['id' => 2, 'course_name' => 'Sample Course 2']
        ];

        return view('courses/index', $data);
    }

    public function edit($id)
    {
        // Dummy data
        $data['course'] = ['id' => $id, 'course_name' => 'Sample Course ' . $id];

        return view('courses/edit', $data);
    }

    public function update($id)
    {
        // Simulate update success
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Course updated'
            ]);
        }

        return redirect()->to('/course');
    }

    public function delete($id)
    {
        // Simulate delete success
        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Course deleted'
            ]);
        }

        return redirect()->to('/course');
    }

    public function view($id = null)
    {
        // Dummy courses and lessons
        $courses = [
            ['id' => 1, 'course_name' => 'Sample Course 1'],
            ['id' => 2, 'course_name' => 'Sample Course 2']
        ];
        $lessons = [];
        if ($id) {
            $lessons = [
                ['id' => 1, 'title' => 'Lesson 1', 'course_id' => $id],
                ['id' => 2, 'title' => 'Lesson 2', 'course_id' => $id]
            ];
        }

        return view('course_view', [
            'courses' => $courses,
            'lessons' => $lessons
        ]);
    }

    public function info($id)
    {
        $projectId = 'cmo-boost-2';
        $collection = 'courses';
        $url = "https://firestore.googleapis.com/v1/projects/$projectId/databases/(default)/documents/$collection/$id";

        $json = @file_get_contents($url);

        // DEBUG: Output the raw JSON and URL for troubleshooting
        if (isset($_GET['debug'])) {
            header('Content-Type: application/json');
            echo json_encode([
                'url' => $url,
                'json' => $json,
                'error' => error_get_last()
            ]);
            exit;
        }

        if ($json === false) {
            $course = [
                'id' => $id,
                'title' => 'Course Not Found',
                'students' => 0,
                'description' => 'No description available.',
                'overview' => '',
                'topics' => [],
                'requirements' => [],
                'instructor' => 'Professor Nicholas Aguinaldo'
            ];
        } else {
            $doc = json_decode($json, true);
            $fields = $doc['fields'] ?? [];

            // Requirements: handle array or string
            $requirements = [];
            if (isset($fields['requirements']['arrayValue']['values'])) {
                foreach ($fields['requirements']['arrayValue']['values'] as $v) {
                    $requirements[] = $v['stringValue'] ?? '';
                }
            } elseif (!empty($fields['requirements']['stringValue'])) {
                $reqRaw = $fields['requirements']['stringValue'];
                $requirements = preg_split('/[\n;,]+/', $reqRaw);
                $requirements = array_map('trim', $requirements);
                $requirements = array_filter($requirements, fn($v) => $v !== '');
            }

            // Topics: handle array or string, or fallback to empty
            $topics = [];
            if (isset($fields['topics']['arrayValue']['values'])) {
                foreach ($fields['topics']['arrayValue']['values'] as $v) {
                    $topics[] = $v['stringValue'] ?? '';
                }
            } elseif (!empty($fields['topics']['stringValue'])) {
                $topicsRaw = $fields['topics']['stringValue'];
                $topics = preg_split('/[\n;,]+/', $topicsRaw);
                $topics = array_map('trim', $topics);
                $topics = array_filter($topics, fn($v) => $v !== '');
            }

            // Fallback: If overview is empty, try to use description as overview
            $overview = $fields['overview']['stringValue'] ?? '';
            if (!$overview && !empty($fields['description']['stringValue'])) {
                $overview = $fields['description']['stringValue'];
            }

            $course = [
                'id' => $id,
                'title' => $fields['course_name']['stringValue'] ?? 'Untitled Course',
                'students' => 0,
                'description' => $fields['description']['stringValue'] ?? '',
                'overview' => $overview,
                'topics' => $topics,
                'requirements' => $requirements,
                'instructor' => $fields['instructor_name']['stringValue'] ?? 'Professor Nicholas Aguinaldo'
            ];
        }

        return view('course_descrip', ['course' => $course]);
    }
}

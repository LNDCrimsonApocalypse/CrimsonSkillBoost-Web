<?php

namespace App\Controllers;

class Topics extends BaseController
{
    public function index($id = null)
    {
        if (!$id) {
            // Optionally redirect or show error
            return redirect()->to('/allcourses')->with('error', 'No course ID provided');
        }

        $projectId = 'csboostcmo';
        $collection = 'courses';
        $url = "https://firestore.googleapis.com/v1/projects/$projectId/databases/(default)/documents/$collection/$id";
        $json = @file_get_contents($url);

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

        return view('topics', ['course' => $course]);
    }

    public function default()
    {
        // Fetch the first course from Firestore (or any logic you want)
        $projectId = 'csboostcmo';
        $collection = 'courses';
        $url = "https://firestore.googleapis.com/v1/projects/$projectId/databases/(default)/documents/$collection";
        $json = @file_get_contents($url);

        if ($json !== false) {
            $data = json_decode($json, true);
            if (!empty($data['documents'][0]['name'])) {
                // Extract the course ID from the Firestore document name
                $parts = explode('/', $data['documents'][0]['name']);
                $courseId = end($parts);
                return redirect()->to('topics/' . $courseId);
            }
        }
        // If no course found, fallback to allcourses
        return redirect()->to('/allcourses');
    }
}

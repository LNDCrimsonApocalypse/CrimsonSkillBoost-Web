<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= esc($course['title']) ?> - Course Info</title>
  <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>"> <!-- optional -->
</head>
<body>
  <div class="course-detail">
    <h1><?= esc($course['title']) ?></h1>
    <h3><?= esc($course['subtitle']) ?></h3>
    <img src="<?= base_url('imgs/' . $course['image']) ?>" alt="<?= esc($course['title']) ?>" style="width:300px;">
    <p><?= esc($course['description']) ?></p>
    <p><strong>Students:</strong> <?= esc($course['students']) ?></p>
    <!-- Topics Section -->
    <div id="topicsSection">
      <h2>Topics</h2>
      <ul id="topicsList">
        <li>Loading topics...</li>
      </ul>
    </div>
  </div>
  <!-- Firebase SDKs -->
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-firestore.js"></script>
  <script src="<?= base_url('public/js/firebase-config.js') ?>"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const courseId = "<?= esc($course['id']) ?>";
      const topicsList = document.getElementById('topicsList');
      firebase.firestore().collection('courses').doc(courseId).collection('topics').get()
        .then(snapshot => {
          if (snapshot.empty) {
            topicsList.innerHTML = "<li>No topics found.</li>";
          } else {
            topicsList.innerHTML = "";
            snapshot.forEach(doc => {
              const data = doc.data();
              const title = data.title || doc.id;
              const url = "<?= base_url('lesson_view') ?>/" + encodeURIComponent(doc.id) + "?course_id=<?= urlencode($course['id']) ?>";
              const li = document.createElement('li');
              li.innerHTML = `<a href="${url}" style="text-decoration:none;color:#e636a4;font-weight:bold;">${title}</a>`;
              topicsList.appendChild(li);
            });
          }
        })
        .catch(() => {
          topicsList.innerHTML = "<li>Error loading topics.</li>";
        });
    });
  </script>
</body>
</html>

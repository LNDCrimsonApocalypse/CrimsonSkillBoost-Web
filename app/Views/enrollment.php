<table class="enrollment-table">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Section</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $request): ?>
                    <tr>
                        <td><?= esc($request['student_name']) ?></td>
                        <td><?= esc($request['course_name']) ?></td>
                        <td><?= esc($request['section']) ?></td>
                        <td><?= esc($request['status']) ?></td>
                        <td>
                            <button onclick="updateRequest(<?= $request['id'] ?>, 'approved')" class="btn btn-approve">Approve</button>
                            <button onclick="updateRequest(<?= $request['id'] ?>, 'rejected')" class="btn btn-reject">Reject</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <script>
                function updateRequest(id, status) {
                    fetch(`/enrollment/update/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ status: status })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            alert('Error: ' + data.message);
                        }
                    });
                }
            </script>
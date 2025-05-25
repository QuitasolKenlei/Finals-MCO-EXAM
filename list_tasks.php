<?php
include 'db.php';

$status = $_GET['status'] ?? '';
$sort = $_GET['sort'] ?? 'due_date';

$sql = "SELECT * FROM tasks WHERE 1=1";
if ($status) $sql .= " AND status='$status'";
$sql .= " ORDER BY $sort";

$result = $conn->query($sql);

echo "<table class='table table-bordered'>";
echo "<tr><th>Title</th><th>Description</th><th>Due Date</th><th>Status</th><th>Actions</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['title']}</td>
        <td>{$row['description']}</td>
        <td>{$row['due_date']}</td>
        <td>{$row['status']}</td>
        <td>
            <a href='mark_done.php?id={$row['id']}' class='btn btn-success btn-sm'>Done</a>
            <a href='edit_task.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
            <a href='delete_task.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
        </td>
    </tr>";
}
echo "</table>";
?>

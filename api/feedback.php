<?php
header('Content-Type: application/json');
require_once '../db_config.php';

$response = ['status' => 'error', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $name = isset($data['name']) ? trim($data['name']) : '';
    $email = isset($data['email']) ? trim($data['email']) : '';
    $comments = isset($data['comments']) ? trim($data['comments']) : '';

    if (empty($name) || empty($email) || empty($comments)) {
        $response['message'] = 'Nama, email, dan komentar harus diisi.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = 'Format email tidak valid.';
    } else {
        $stmt = $conn->prepare("INSERT INTO feedback (name, email, comments) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $comments);

        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Feedback berhasil dikirim.';
        } else {
            $response['message'] = 'Gagal menyimpan feedback: ' . $stmt->error;
        }
        $stmt->close();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT name, email, comments, created_at FROM feedback ORDER BY created_at DESC";
    $result = $conn->query($sql);
    $feedbacks = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $feedbacks[] = $row;
        }
    }
    $response['status'] = 'success';
    $response['data'] = $feedbacks;
    $response['message'] = 'Data feedback berhasil diambil.';
} else {
    $response['message'] = 'Metode request tidak valid.';
}

echo json_encode($response);
$conn->close();
?>
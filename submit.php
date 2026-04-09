<?php
require_once 'db.php';

$submitted = false;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = __DIR__ . '/uploads/';

    // Create directory if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    function uploadFile(string $key, array $allowed, string $dir)
    {
        if (empty($_FILES[$key]['name']) || $_FILES[$key]['error'] !== UPLOAD_ERR_OK)
            return null;

        $ext = strtolower(pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed))
            die("Invalid file type for $key.");

        $filename = uniqid($key . '_', true) . '.' . $ext;
        move_uploaded_file($_FILES[$key]['tmp_name'], $dir . $filename);
        return $filename;
    }

    $data = [
        ':full_name' => trim($_POST['full_name'] ?? ''),
        ':phone_number' => trim($_POST['phone_number'] ?? ''),
        ':email' => trim($_POST['email'] ?? ''),
        ':address' => trim($_POST['address'] ?? ''),
        ':gender' => trim($_POST['gender'] ?? ''),
        ':nationality' => trim($_POST['nationality'] ?? ''),
        ':highest_qualification' => trim($_POST['highest_qualification'] ?? ''),
        ':institution' => trim($_POST['institution'] ?? ''),
        ':year_completed' => trim($_POST['year_completed'] ?? ''),
        ':relevant_coursework' => trim($_POST['relevant_coursework'] ?? ''),
        ':position_applied' => trim($_POST['position_applied'] ?? ''),
        ':work_experience' => trim($_POST['work_experience'] ?? ''),
        ':skills' => trim($_POST['skills'] ?? ''),
        ':career_objective' => trim($_POST['career_objective'] ?? ''),
        ':references_text' => trim($_POST['references'] ?? ''),
        ':cv_file' => uploadFile('cv', ['pdf', 'doc', 'docx'], $uploadDir),
        ':certs_file' => uploadFile('certs', ['pdf', 'jpg', 'jpeg', 'png'], $uploadDir)
    ];

    try {
        $sql = "INSERT INTO applications (
            full_name, phone_number, email, address, gender, nationality,
            highest_qualification, institution, year_completed, relevant_coursework,
            position_applied, work_experience, skills, career_objective, references_text,
            cv_file, certs_file, submitted_at
        ) VALUES (
            :full_name, :phone_number, :email, :address, :gender, :nationality,
            :highest_qualification, :institution, :year_completed, :relevant_coursework,
            :position_applied, :work_experience, :skills, :career_objective, :references_text,
            :cv_file, :certs_file, NOW()
        )";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);
        $submitted = true;
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }
}
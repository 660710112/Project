<?php
$data = json_decode(file_get_contents("php://input"), true);
$users = file_exists("users.json") ? json_decode(file_get_contents("users.json"), true) : [];

foreach ($users as $user) {
    if ($user["email"] === $data["email"]) {
        echo json_encode(["status" => "error", "message" => "อีเมลนี้มีผู้ใช้งานแล้ว"]);
        exit;
    }
}

$users[] = [
    "name" => $data["name"],
    "email" => $data["email"],
    "password" => $data["password"],
    "role" => "user"
];

file_put_contents("users.json", json_encode($users, JSON_PRETTY_PRINT));
echo json_encode(["status" => "success", "message" => "สมัครสมาชิกเรียบร้อย!"]);
?>

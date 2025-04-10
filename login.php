<?php
session_start();
$data = json_decode(file_get_contents("php://input"), true);
$users = file_exists("users.json") ? json_decode(file_get_contents("users.json"), true) : [];

foreach ($users as $user) {
    if ($user["email"] === $data["email"] && $user["password"] === $data["password"]) {
        $_SESSION["email"] = $user["email"];
        $_SESSION["role"] = $user["role"];
        echo json_encode(["status" => "success", "role" => $user["role"]]);
        exit;
    }
}
echo json_encode(["status" => "error", "message" => "อีเมลหรือรหัสผ่านไม่ถูกต้อง"]);
?>

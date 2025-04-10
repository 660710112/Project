<?php
$data = json_decode(file_get_contents('php://input'), true);
$movies = [];

if (!file_exists('movies.json')) {
  file_put_contents('movies.json', "[]"); // สร้างไฟล์ถ้าไม่มี
}
$movies = json_decode(file_get_contents('movies.json'), true);

// ตรวจสอบข้อมูลที่ส่งเข้ามา
if (
  !isset($data['title']['th']) || !isset($data['title']['en']) ||
  !isset($data['poster']) || !isset($data['showtimes'])
) {
  echo json_encode(["message" => "ข้อมูลไม่ครบ"]);
  exit;
}

$data['id'] = uniqid("m");
$movies[] = $data;

file_put_contents('movies.json', json_encode($movies, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo json_encode(["message" => "เพิ่มหนังสำเร็จ"]);
?>

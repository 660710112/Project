<?php
$data = json_decode(file_get_contents('php://input'), true);
if (!$data) exit;

$bookings = file_exists('bookings.json')
  ? json_decode(file_get_contents('bookings.json'), true)
  : [];

$data['timestamp'] = round(microtime(true) * 1000);
$bookings[] = $data;

file_put_contents('bookings.json', json_encode($bookings, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
echo json_encode(["message" => "บันทึกเรียบร้อย"]);
?>
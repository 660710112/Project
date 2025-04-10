<?php
$data = json_decode(file_get_contents("php://input"), true);
$index = $data["index"];
$movies = [];

if (file_exists("movies.json")) {
  $movies = json_decode(file_get_contents("movies.json"), true);
  if (isset($movies[$index])) {
    array_splice($movies, $index, 1);
    file_put_contents("movies.json", json_encode($movies, JSON_PRETTY_PRINT));
    echo json_encode(["message" => "ลบหนังเรียบร้อย"]);
    exit;
  }
}
echo json_encode(["message" => "ไม่พบหนังที่จะลบ"]);
?>

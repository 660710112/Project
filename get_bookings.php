<?php
$movieId = $_GET['movie_id'];
$showtime = $_GET['showtime'];
$bookings = json_decode(file_get_contents('bookings.json'), true);
$bookedSeats = [];

foreach ($bookings as $b) {
  if ($b['movie_id'] === $movieId && $b['showtime'] === $showtime) {
    foreach ($b['seats'] as $s) {
      $bookedSeats[] = $s['index'];
    }
  }
}

echo json_encode($bookedSeats);
?>

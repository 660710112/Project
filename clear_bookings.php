<?php
file_put_contents('bookings.json', json_encode([]));
echo json_encode(["message" => "ล้างข้อมูลการจองทั้งหมดเรียบร้อยแล้ว"]);
?>

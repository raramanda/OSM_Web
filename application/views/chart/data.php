<?php
$api_key_value = "tPmAT5Ab3j7F9";
$total = $data = $api_key = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $api_key = test_input($_POST["api_key"]);
  if ($api_key == $api_key_value) {
    $data = test_input($_POST["data"]);
    $total = test_input($_POST["total"]);

    $obs = [
      'data' => $data,
      'total' => $total,
      'time' => time()
    ];
    $this->db->insert('counter', $obs);
    header("HTTP/1.1 202 Accepted");
  } else {
    header("HTTP/1.1 406 Not Acceptable");
  }
} else {
  header("HTTP/1.1 411 Length Required");
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

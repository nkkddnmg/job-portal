<?php
if ($_SERVER['HTTP_HOST'] == "localhost") {
  $host = "localhost";
  $user = "root";
  $password = "";
  $db = "job-portal";
} else {
  $host = "";
  $user = "";
  $password = "";
  $db = "";
}

try {
  $conn = mysqli_connect($host, $user, $password, $db);
} catch (Exception $e) {
  echo "<script>console.log('" . ($e->getMessage()) . "')</script>";
}

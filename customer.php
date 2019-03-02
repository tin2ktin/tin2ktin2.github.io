<?php
  $hostname = 'localhost';
  $database = 'customerdb';
  $username = 'root';
  $password = '';

  // opening a connection
  $conn = new mysqli ($hostname, $username, $password, $database);

  if ($conn->connect_error) {
    die($conn->connect_error);
  }
  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  if (isset($_POST['webdev'])) $webdev = true; else $webdev = false;
  if (isset($_POST['prodeli'])) $prodeli = true; else $prodeli = false;
  if (isset($_POST['esyscon'])) $esyscon = true; else $esyscon = false;

  $reference = $_POST['reference'];
  $questions = $_POST['questions'];

  $query = "INSERT INTO customer(fName, lName, email, phone, webdev, prodeli, esyscon, reference, questions) VALUES('$fName', '$lName', '$email', '$phone', '$webdev', '$prodeli', '$esyscon', '$reference', '$questions')";

  $results = $conn->query($query);
  if (!$results) {
    echo "Insert failed";
  }
  else {
    echo "Insert successfully!";
  }

  $query = "select * from customer";
  $results = $conn->query($query);

  if (!$results) {
    echo "Select error";
  }

  while ($row = mysqli_fetch_array($results)) {
    echo $row['id']." ".$row['fName']." ".$row['lName']. " " .$row['email']. " " .$row['phone'] ."<br/>";
  }
?>

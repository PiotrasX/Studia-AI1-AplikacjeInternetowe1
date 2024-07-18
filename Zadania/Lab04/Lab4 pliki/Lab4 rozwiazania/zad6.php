<?php
foreach ($_REQUEST as $key => $value)
  $_REQUEST[$key] = strip_tags($value);
print_r($_REQUEST);
print('<br>');

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  // Zebrać wartości z pól formularza
  $email = strip_tags($_POST['email']);
  $offer_type = strip_tags($_POST['offer_type']);
  $budget = strip_tags($_POST['budget']);
  $comment = strip_tags($_POST['comment']);

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "ai1_lab4";

  try 
  {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully. <br>";

    // Przygotować polecenie insert i wstawić rekord do tabeli
    $sql = "INSERT INTO questions (email, offer_type, budget, comment) VALUES (:email, :offer_type, :budget, :comment)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':offer_type', $offer_type);
    $stmt->bindParam(':budget', $budget);
    $stmt->bindParam(':comment', $comment);

    $stmt->execute();

    echo "New record created successfully. <br>";
    $conn = null;
  } 
  catch (PDOException $e) 
  {
    echo "Connection failed: " . $e->getMessage();
    echo $sql . "<br>" . $e->getMessage();
    $conn = null;
  }
} 
else 
{
  echo "Method not supported. <br>";
}

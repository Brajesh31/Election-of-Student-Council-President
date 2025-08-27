<?php
session_start();
if (!isset($_SESSION['has_voted']) || $_SESSION['has_voted'] !== true) {
    header("Location: dashboard.php");
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .back:hover{
            color: white;
            transition: 0.5s;
            background-color: blue;
            padding: 0.5em 0.5em 0.5em;
            border-radius: 0.5em;
        }

        .back{
          text-decoration: none;
          color: white;
        }

        h1{
          font-size: 4em;
        }

        .eak{
          text-decoration: none;
          color: white;
          background-color: green;
          padding-left: 1em;
          padding-right: 1em;
          padding-top: 0.5em;
          padding-bottom: 0.5em;
          border-radius: 0.3em;
        }
    </style>
  </head>
  <body>
    <div class="container mt-5 text-center">
      <br><br><br><br><br><br><br><br><br>
        <h1>Thank You for Voting!</h1>
        <p>Your vote has been recorded.</p>
        <br>
        <a href="home.php" class="back">Back</a>
        <br><br><br>
        <a href="hasilvoting2.php" class="eak">View results</a>
    </div>
  </body>
</html>
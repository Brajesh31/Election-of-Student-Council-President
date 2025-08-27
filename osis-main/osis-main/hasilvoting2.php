<?php
session_start();
include 'connection.php';

$is_voting_closed = false;

if (!$is_voting_closed) {
    echo "<script>alert('Voting is still ongoing. You cannot view the results yet'); window.location.href='thankyou.php';</script>";
    exit;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voting Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5">
        <h1>Voting Results</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Candidate</th>
                    <th>Votes</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $resultQuery = mysqli_query($connection, "SELECT * FROM vote");
                while ($row = mysqli_fetch_assoc($resultQuery)) {
                    echo "<tr><td>{$row['nama_osis']}</td><td>{$row['vote']}</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
  </body>
</html>
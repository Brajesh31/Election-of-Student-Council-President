<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add OSIS Chairman Candidate Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h3 {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-success, .btn-secondary {
            width: 100%;
            border-radius: 8px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-container {
            display: flex;
            gap: 10px;
        }
        .btn-container .btn {
            width: 48%;
        }
    </style>
</head>
<body>

    <?php 
        include("../connection.php");
    ?>

    <?php
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $stmt = $connection->prepare("INSERT INTO `user` (`username`, `password`) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $stmt->close();

            header('Location: admins.php');
            exit;
        }
    ?>

    <div class="form-container">
            <h3>Add Admin Data</h3>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_osis" class="form-label">Username</label>
                    <input type="text" class="form-control" id="nama_osis" name="username" placeholder="Brajesh" required>
                </div>
                <div class="form-group">
                    <label for="NIS" class="form-label">Password</label>
                    <input type="text" class="form-control" id="NIS" name="password" placeholder="123456789" required>
                </div>
                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="tabelosis.php" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </body>
    </html>

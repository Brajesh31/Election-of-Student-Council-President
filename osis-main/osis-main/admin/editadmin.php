<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 600px;
            margin: 60px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        h3 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .form-label {
            font-weight: bold;
            color: #555;
        }
        .form-control {
            border-radius: 8px;
        }
        .btn-success {
            width: 100%;
            border-radius: 8px;
        }
        .back-link {
            text-align: center;
            margin-top: 15px;
        }
        .back-link a {
            color: #6c757d;
            text-decoration: none;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
        .photo-preview img {
            max-width: 150px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<?php
    include("../connection.php");
    $edit = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id='".$edit."'";

    $query = mysqli_query($connection, $sql);
    $data = mysqli_fetch_array($query);

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "UPDATE `user` SET `username` = '".$username."', `password` = '".$password."' WHERE `id` = '".$edit."'";
        mysqli_query($connection, $sql);
        header('location:admins.php');
    }
?>

<div class="form-container">
    <h3>Update Admin Data</h3>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama_osis" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?=$data['username']?>" required>
        </div>
        <div class="mb-3">
            <label for="NIS" class="form-label">Password</label>
            <input type="text" class="form-control" id="password" name="password" value="<?=$data['password']?>" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
    <div class="back-link">
        <a href="admins.php">Back</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<script>
    document.getElementById('photo').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('new-photo-preview');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });
</script>

</body>
</html>
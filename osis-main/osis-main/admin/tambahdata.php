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
        if(isset($_POST['nama_osis'])){
            $nama_osis = $_POST['nama_osis'];
            $NIS = $_POST['NIS'];
            $kelas = $_POST['kelas'];

            $photo = '';
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
                $photoTmpName = $_FILES['photo']['tmp_name'];
                $photoName = basename($_FILES['photo']['name']);
                $photoPath = '../img/' . $photoName;
                move_uploaded_file($photoTmpName, $photoPath);
                $photo = $photoPath;
            }

            $stmt = $connection->prepare("INSERT INTO `vote` (`nama_osis`, `NIS`, `kelas`, `photo`) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nama_osis, $NIS, $kelas, $photo);
            $stmt->execute();
            $stmt->close();

            header('Location: tabelosis.php');
            exit;
        }
    ?>

    <div class="form-container">
        <h3>Add OSIS Chairman Candidate Data</h3>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_osis" class="form-label">Candidate Name</label>
                <input type="text" class="form-control" id="nama_osis" name="nama_osis" placeholder="Ariva Zweena" required>
            </div>
            <div class="form-group">
                <label for="NIS" class="form-label">NIS</label>
                <input type="text" class="form-control" id="NIS" name="NIS" placeholder="123456789" required>
            </div>
            <div class="form-group">
                <label for="kelas" class="form-label">Class</label>
                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="XII RPL" required>
            </div>
            <div class="form-group">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" required>
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
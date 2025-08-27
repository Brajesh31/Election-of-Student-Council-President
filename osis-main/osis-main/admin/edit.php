<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update OSIS Chairman Candidate Data</title>
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
    $sql = "SELECT * FROM vote WHERE id='".$edit."'";

    $query = mysqli_query($connection, $sql);
    $data = mysqli_fetch_array($query);

    if (isset($_POST['nama_osis'])) {
        $nama_osis = $_POST['nama_osis'];
        $NIS = $_POST['NIS'];
        $kelas = $_POST['kelas'];

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
            $photoTmpName = $_FILES['photo']['tmp_name'];
            $photoName = basename($_FILES['photo']['name']);
            $photoPath = 'osis-main/img/' . $photoName;
            move_uploaded_file($photoTmpName, $photoPath);
        } else {
            $photoPath = $data['photo'];
        }

        $sql = "UPDATE `vote` SET `nama_osis` = '".$nama_osis."', `NIS` = '".$NIS."', `kelas` = '".$kelas."', `photo` = '".$photoPath."' WHERE `id` = '".$edit."'";
        mysqli_query($connection, $sql);
        header('location:tabelosis.php');
    }
?>

<div class="form-container">
    <h3>Update OSIS Chairman Candidate Data</h3>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama_osis" class="form-label">Candidate Name</label>
            <input type="text" class="form-control" id="nama_osis" name="nama_osis" value="<?=$data['nama_osis']?>" required>
        </div>
        <img src="../osis-main/img/calon1.png" alt="">
        <div class="mb-3">
            <label for="NIS" class="form-label">NIS</label>
            <input type="text" class="form-control" id="NIS" name="NIS" value="<?=$data['NIS']?>" required>
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Class</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="<?=$data['kelas']?>" required>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <div class="photo-preview">
                <p>Previous Photo: <?=basename($data['photo'])?></p>
                <img src="../img/<a?=$data['photo']?>" id="current-photo" alt="Current Photo">
            </div>
            <br>
            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            <small class="form-text text-muted"><i>Upload a new photo to replace the current one, or leave this empty to keep the current photo.</i></small>
        </div>
        <div class="mb-3">
            <img id="new-photo-preview" src="" alt="New Photo Preview" style="display: none; max-width: 150px; border-radius: 8px;">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
    <div class="back-link">
        <a href="tabelosis.php">Back</a>
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
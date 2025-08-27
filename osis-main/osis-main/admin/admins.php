<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSIS Candidate Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 20px;
        }
        .table-container {
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .table thead th {
            background-color: #007bff;
            color: #ffffff;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .btn-custom {
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 14px;
        }
        .search-form input {
            border-radius: 20px 0 0 20px;
        }
        .search-form button {
            border-radius: 0 20px 20px 0;
        }
        .btn-primary {
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="mt-5">Admin Data</h3>
        <br>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <div class="dropdown d-inline">
                    <button class="btn btn-light border border-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="addadmin.php">Add Data</a></li>
                        <li><a class="dropdown-item" href="hasilvoting.php">Voting Results</a></li>
                        <li><a class="dropdown-item" href="tabelosis.php">OSIS Chairman Candidate Data</a></li>
                    </ul>
                </div>
            </div>
            <div class="search-form">
                </div>
            <div>
                <a class="btn btn-primary btn-custom" href="logout.php" role="button">Logout</a>
            </div>
        </div>
        <hr>
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include '../connection.php';
                        if (!isset($_SESSION["username"]) == null) {
                            header("Location: admin/login.php");
                            exit;
                        }

                        $sql = "SELECT * FROM user";
                        $query = mysqli_query($connection, $sql);
                        $no = 1;

                        while($data = mysqli_fetch_array($query)) {
                            echo "<tr>";
                            echo "<td>".$no++."</td>";
                            echo "<td>".$data['username']."</td>";
                            echo "<td>".$data['password']."</td>";
                            echo "<td>";
                            echo "<a class='btn btn-danger btn-sm' href='delete2.php?id=".$data['id']."'>Delete</a>";
                            echo "<a class='btn btn-warning btn-sm ms-2' href='editadmin.php?id=".$data['id']."'>Edit</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
                </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
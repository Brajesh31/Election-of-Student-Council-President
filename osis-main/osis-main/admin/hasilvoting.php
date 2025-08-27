<?php 
        include("../connection.php");
        if (!isset($_SESSION["username"]) == null) {
          header("Location: login.php");
          exit;
      }
    ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OSIS Chairman Election Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: whitesmoke;
        }
        .chart-container {
            width: 50%;
            margin: auto;
            padding-top: 20px;
        }
        canvas {
            max-width: 100% !important;
            height: auto !important;
        }

        body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.navbar {
    background-color: #2c3e50;
    padding: 10px 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.navbar-menu {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: flex-end;
}

.navbar-menu li {
    margin-left: 20px;
    text-align: center;
}

.navbar-menu a {
    text-decoration: none;
    color: #ecf0f1;
    font-weight: bold;
    transition: color 0.3s;
}

.navbar-menu a:hover {
    color: #3498db;
}

    </style>
  </head>
  <body>
  <h3 class="mt-5 text-center">OSIS Chairman Election Results</h3>
  <br>
      <div>
            <nav class="navbar">
                  <ul class="navbar-menu text-center">
                      <li><a href="admins.php">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin Data</a></li>
                      <li><a href="tabelosis.php">OSIS Candidate Data</a></li>
                  </ul>
            </nav>
      </div>
  <hr>

  <div class="container text-center p-2 border rounded chart-container">
    <canvas id="voteChart"></canvas>
  </div>
  <br>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
  <script>
    const voteData = <?php
        $result = mysqli_query($connection, 'SELECT nama_osis, vote FROM vote');
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
    ?>;

    const labels = voteData.map(item => item.nama_osis);
    const data = voteData.map(item => item.vote);

    const ctx = document.getElementById('voteChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Number of Votes',
          data: data,
          backgroundColor: '#36A2EB',
          borderColor: '#2c3e50',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          datalabels: {
            anchor: 'center', 
            align: 'center',
            color: '#ffffff',
            font: {
              size: 16,
              weight: 'bold'
            },
            textShadow: '2px 2px 4px rgba(0,0,0,0.6)',
            formatter: function(value) {
              return value;
            }
          },
          tooltip: {
            callbacks: {
              label: function(tooltipItem) {
                return tooltipItem.label + ': ' + tooltipItem.raw + ' votes';
              }
            }
          }
        }
      },
      plugins: [ChartDataLabels]
    });
  </script>
  </body>
</html>
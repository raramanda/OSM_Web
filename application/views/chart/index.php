<html>

<head>
  <title>Belajarphp.net - ChartJS</title>
  <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.bundle.js"></script>

  <style type="text/css">
    .container {
      width: 50%;
      margin: 15px auto;
    }
  </style>
  <meta http-equiv="refresh" content="10" />
</head>

<body>
  <div class="container">
    <canvas id="myChart" width="100" height="100"></canvas>
  </div>
  <script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [
          <?php foreach ($obs as $t) : ?>
            <?= '"' . date('d/m/y', $t['time']) . '",'; ?>
          <?php endforeach; ?>
        ],
        datasets: [{
            label: 'Jarak Tempuh Harian',
            lineTension: 0.3,
            // backgroundColor: "rgba(78, 115, 223, 0.05)",
            // borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(255, 99, 132, 1)",
            pointBorderColor: "rgba(255, 99, 132, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255,99,132,1)',
            borderWidth: 2,
            data: [
              <?php foreach ($obs as $t) : ?>
                <?= '"' . $t['data'] . '",'; ?>
              <?php endforeach; ?>
            ],
          },
          {
            label: 'Jarak Tempuh Total',
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 0.5)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            // backgroundColor: 'rgba(255, 99, 132, 0.2)',
            // borderColor: 'rgba(255,99,132,1)',
            borderWidth: 1,
            data: [
              <?php foreach ($obs as $t) : ?>
                <?= '"' . $t['total'] . '",'; ?>
              <?php endforeach; ?>
            ],
          },
        ]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>
</body>

</html>
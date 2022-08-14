<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="img/icon.png">
  <link rel="apple-touch-icon" href="img/icon.png" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <title>Cyber Cherry Tomatoes</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
  <link rel="stylesheet" href="milligram.css?version=1.1">
</head>
<script src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
<script src="https://d3js.org/d3.v7.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-zoom/1.2.1/chartjs-plugin-zoom.min.js"></script>

<body>
  <?php require("header.php"); ?>
  <div class="flex-container-page">
    <div class="flex-container-charts">
      <div class="flex-container">
        <h2>🍒 Sensor 0 (Outdoor) 🍅</h2>
        <div id="battery">
          <div id="battery_body"><span id="battery_voltage0"></span>
            <div id="battery_charge0"></div>
          </div>
          <div id="battery_pole"></div>
        </div>
        <div class="myCanvas"><canvas id="myChart0"></canvas></div>
      </div>
      <div class="flex-container">
        <h2>🌿 Sensor 1 (Indoor) 🎍</h2>
        <div id="battery">
          <div id="battery_body"><span id="battery_voltage1"></span>
            <div id="battery_charge1"></div>
          </div>
          <div id="battery_pole"></div>
        </div>
        <div class="myCanvas"><canvas id="myChart1"></canvas></div>
      </div>

    </div>
  </div>
  <script src="sensors.js?version=1"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/icon.png">
    <title>Cyber Cherry Tomatoes</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css">
    <link rel="stylesheet" href="milligram.css">
  </head>
  <!-- neck -->
  <body>
    <h1>🍒 Cyber Cherry Tomatoes are growing 🍅</h1>
    <hr>
    <div class="flex-container">
      <img id="imgtomato" class=".flex-item">
      <?php require("lastupdate.php"); ?>
      <button onclick="location.href='timelapse.php';">TimeLapse</button>
    </div>
    <script>document.getElementById("imgtomato").src = "/img/tomate-cerise-grappe.png?"+Math.round(6969*Math.random());</script>
  </body>
  <!-- legs -->
  <!-- feet -->
</html>
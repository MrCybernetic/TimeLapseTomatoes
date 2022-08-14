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
    <link rel="stylesheet" href="milligram.css?version=1.5">
</head>

<body>
    <?php require("header.php"); ?>
    <div class="flex-container-page">
        <h1>The Stuff</h1>
        <div class="flex-container-stuffs">
            <div class="stuff">
                <h2>Technos</h2>
                <p>Attiny85, Chart.js, ESP-cam, ESP01, Git, Model-viewer, MQTT, NodeRed, KiCad, OnShape</p>
            </div>
            <div class="stuff">
                <h2>Sensor</h2>
                <model-viewer id="sensor" src="3d\Assembly_V4.gltf" shadow-intensity="1" ar ar-modes="webxr scene-viewer quick-look" camera-controls alt="A 3D model carousel">
                    <div class="progress-bar hide" slot="progress-bar">
                        <div class="update-bar"></div>
                    </div>
                </model-viewer>
                <button onclick="hide_show(3)">bottom_bell</button><button onclick="hide_show(4)">top_bell</button>
            </div>
            <div class="stuff">
                <h2>ESPCam</h2>
                <model-viewer src="3d\Cyber_ESPcam.gltf" shadow-intensity="1" ar ar-modes="webxr scene-viewer quick-look" camera-controls alt="A 3D model carousel" orientation="0 -90deg 0">
                    <div class="progress-bar hide" slot="progress-bar">
                        <div class="update-bar"></div>
                    </div>
                </model-viewer>
            </div>
        </div>
        <h1>The Cyborg</h1>
        <p>
            <a href="https://github.com/MrCybernetic">
                <ion-icon name="logo-github"></ion-icon> Github
            </a><a href="https://twitter.com/Mr_Cybernetic">
                <ion-icon name="logo-twitter"></ion-icon> Twitter
            </a>
        </p>
    </div>
    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script>
        let bottom_bell = 3;
        let top_bell = 4;


        function hide_show(element) {
            if (document.getElementById("sensor").model.materials[element].getAlphaMode() != 'BLEND') {
                document.getElementById("sensor").model.materials[element].setAlphaMode('BLEND')
                document.getElementById("sensor").model.materials[element].pbrMetallicRoughness.setBaseColorFactor([0,0,1,0])
            } else {
                document.getElementById("sensor").model.materials[element].setAlphaMode('OPAQUE')
                document.getElementById("sensor").model.materials[element].pbrMetallicRoughness.setBaseColorFactor([1,1,1,1]);
                
            }
        }
    </script>
</body>

</html>
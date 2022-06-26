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
  <body>
	<h1>🍒 Cyber Cherry Tomatoes are growing 🍅</h1>
	<hr>
	<div class="flex-container">
    <div id="loader" class="loadingio-spinner-double-ring-8a2fhe6mt8u"><div class="ldio-hueejp8pogw">
      <div></div>
      <div></div>
      <div><div></div></div>
      <div><div></div></div>
      </div></div>

  <div class="imagesbank">
    <?php 
        $handle = opendir(dirname(realpath(__FILE__)).'/bucket/');
        $imgArray = array();
        $txtArray = array();
        while($file = readdir($handle)){
            if($file !== '.' && $file !== '..'){
                array_push($imgArray,'<img id="imageTomatoes" style="display: none;" src="/bucket/'.$file.'" />');
                array_push($txtArray,'<div id="lastrefresh" style="display: none;" >'.$file.'</div>');
            }
        } 
        sort($imgArray);
        sort($txtArray);

        $length = count($imgArray);
        for ($i = 0; $i < $length; $i++) {
          array_splice($imgArray,$i,3);
          array_splice($txtArray,$i,3);
          $length = count($imgArray);
        }
        echo implode('', $imgArray);
        echo implode('', $txtArray);
    ?>
    </div>
    <div id="controls" style="display: none !important"><button id="previous" class="lecture" onclick="Previous();" disabled>⏮️</button><button id="pause" class="lecture" onclick="togglePause();">⏸️</button><button class="lecture"  id="next" onclick="Next();" disabled>⏭️</button></div>
    <button onclick="location.href='index.php';">Back</button>

  </div>
  <script>
    var pause=false;
    var iCurSlide = 0;
    var imagesBank = document.querySelectorAll('[id=imageTomatoes]');
    var legendssBank = document.querySelectorAll('[id=lastrefresh]');

    function togglePause() {
      pause=!pause;
      if (pause) {
        document.getElementById("pause").innerHTML="▶️"
        document.getElementById("previous").disabled=false;
        document.getElementById("next").disabled=false;
      }
      if (!pause) {
        document.getElementById("pause").innerHTML="⏸️";
        document.getElementById("previous").disabled=true;
        document.getElementById("next").disabled=true;
    }
    }


    function Next() {
      pause=true;
      document.getElementById("pause").innerHTML="▶️"
      iCurSlide++
      if (imagesBank.length == iCurSlide+1) {
        iCurSlide = 0;
        imagesBank[0].style.display = "block";
        imagesBank[imagesBank.length-1].style.display = "none";
        legendssBank[0].style.display = "block";
        legendssBank[imagesBank.length-1].style.display = "none";
      }
    }

    function Previous() {
      pause=true;
      document.getElementById("pause").innerHTML="▶️"
      imagesBank[1+iCurSlide].style.display = "none";
      legendssBank[1+iCurSlide].style.display = "none";
      if (iCurSlide>1)  iCurSlide = iCurSlide-2;
      console.log(iCurSlide)

      
    }

    function drawFrame() {
      imagesBank[iCurSlide].style.display = "none";
      imagesBank[1+iCurSlide].style.display = "block";
      legendssBank[iCurSlide].style.display = "none";
      legendssBank[1+iCurSlide].style.display = "block";
      if (!pause) iCurSlide++;
      if (imagesBank.length == iCurSlide+1) {
        iCurSlide = 0;
        imagesBank[0].style.display = "block";
        imagesBank[imagesBank.length-1].style.display = "none";
        legendssBank[0].style.display = "block";
        legendssBank[imagesBank.length-1].style.display = "none";
      }
    }
    Promise.all(Array.from(document.images).filter(img => !img.complete).map(img => new Promise(resolve => { img.onload = img.onerror = resolve; }))).then(() => {
      document.getElementById("loader").style.display = "none";
      document.getElementById("controls").setAttribute('style', 'display:block');
      var iTimer = setInterval(drawFrame, 100); 
    });
  </script>
</body>
</html>
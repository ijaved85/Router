<!DOCTYPE html>
<html>
<head>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="favicon.png">
    <link rel="manifest" href="./manifest.json">
    <!--Sweet Alert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js">
    </script>

    <!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    </script>
    <style>
@font-face {
      font-family: 'Archivo Black';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/archivoblack/v17/HTxqL289NzCGg4MzN6KJ7eW6OYs.ttf) format('truetype');
    }
      body {
        background: #0c0c16e6;
        font-family: "Archivo Black", sans-serif;
      }
      .container {
        display: flex;
        margin-top: 30vh;
      }
      .container .centerMargin {
        display: flex;
        align-items: center;
        margin: 0 auto;
      }
      .container .text {
        color: white;
        padding-left: 0.5vw;
        font-size: 1.5vw;
      }
      .container .d1 {
        animation: pulse2s 1s infinite;
      }
      .container .d2 {
        animation: pulse2s 1.4s infinite;
      }
      .container .d3 {
        animation: pulse2s 1.8s infinite;
      }
      .container .dot {
        color: white;
        margin-left: 0.3vw;
        font-size: 2vw;
      }
      .container .connection {
        transform: rotate(0.5turn);
        display: flex;
      }
      .container .connection .conn {
        margin-right: 5px;
      }
      .container .connection .bar1 {
        background: #433f52;
        width: 1vw;
        height: 3vw;
        animation: fade2s 1.8s infinite;
        animation-fill-mode: forwards;
        border-radius: 7px;
      }
      .container .connection .bar2 {
        background: #433f52;
        width: 1vw;
        height: 2vw;
        animation: fade2s 1.4s infinite;
        animation-fill-mode: forwards;
        border-radius: 7px;
      }
      .container .connection .bar3 {
        background: #433f52;
        width: 1vw;
        height: 1vw;
        animation: fade2s 1s infinite;
        animation-fill-mode: forwards;
        border-radius: 7px;
      }
@keyframes fade {
        0% {
          background: #4af626;
        }
        100% {
          background: #433f52;
        }
      }
@keyframes pulse {
        0% {
          transform: scale(1);
        }
        80% {
          transform: scale(1.2);
          transform: translateY(-3px);
        }
        100% {
          transform: scale(1.1);
        }
      }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Wifi Router</title>
  </head>
  <body>
    <?php
    $url = $_SERVER['REMOTE_ADDR'];
    ?>
    <div class="container">
      <div class="centerMargin">
        <div class="connection">
          <div class="bar1 conn"></div>
          <div class="bar2 conn"></div>
          <div class="bar3 conn"></div>
        </div>
        <h2 class="text">&nbsp;Connecting to ip <?php echo $url; ?></h2>
        <h2 class="dot d1">.</h2>
        <h2 class="dot d2">.</h2>
        <h2 class="dot d3">.</h2>
      </div>
    </div>
    <script>
      var url = "<?php echo $url; ?>";
      
      
      
      setTimeout(()=> {
        window.location.host = (url);
      }, 5000);



      if ('serviceWorker' in navigator) {
        window.addEventListener('load', ()=> {
          navigator.serviceWorker.register('./sw.js').then((reg)=> {
            // Registration was successful
            console.log('Registration successful with scope: ', reg.scope);
          }, (err)=> {
            // registration failed :(
            console.log('Registration failed: ', err);
          });
        });
      }

      let deferredPrompt;
      $("#install").css("display", "none");
      window.addEventListener('beforeinstallprompt', (e) => {
        e.preventDefault();
        deferredPrompt = e;
        $("#install").css("display", "block");
        $("#install").click((e) => {
          $("#install").css("display", "none");
          deferredPrompt.prompt();
          deferredPrompt.userChoice
          .then((choiceResult) => {
            if (choiceResult.outcome === 'accepted') {
              console.log('User accepted the A2HS prompt');
            } else {
              console.log('User dismissed the A2HS prompt');
            }
            deferredPrompt = null;
          });
        });
      });

    </script>
  </body>
</html>
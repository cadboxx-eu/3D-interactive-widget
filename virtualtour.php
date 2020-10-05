<?php

  $globalVersion = '1.4.0';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Villas on Rio — Virtual Tour</title>
    <meta name="description" content="Mouse Click Example - A-Frame">
    <meta charset="utf-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
  </head>

  <style>
    .virtualtour{
      background: #fff;
      background-image: url('data:image/svg+xml;utf8,<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve"> <circle fill="grey" stroke="none" cx="45" cy="50" r="2"> <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.1"/> </circle> <circle fill="grey" stroke="none" cx="50" cy="50" r="2"> <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.2"/> </circle> <circle fill="grey" stroke="none" cx="55" cy="50" r="2"> <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.3"/> </circle> </svg>');
      background-size: 300px;
      background-position: center;
      background-repeat: no-repeat;
      width: 100%; height: 100%;
      left: 0; top: 0;
      position: absolute;
      overflow: hidden;
    }

    .virtualtour__iframe{
      width: 100%; height: 100%;
      left: 0; top: 0;
      position: absolute;
      border: none;
      opacity: 0;
      transition: all 0.5s;
    }
    .virtualtour__iframe.this--visible{
      opacity: 1;
    }

    .virtualtour__thumbnail{
      background-color: #ccc; pointer-events: none !important;
      background-size: cover;
      filter: blur(10px);
      transition: all 0.5s;
      width: 110%;
      height: 110%;
      left: -5%; top: -5%;
      position: absolute;
      border: none;
    }
    .virtualtour__thumbnail.this--noblur{
      filter: blur(0);
    }

    .virtualtour__thumbnail.this--fadeout{
      opacity: 0;
    }

    .virtualtour__playbutton {
      position: absolute;
      width: 100px;
      height: 100px;
      display: block;
      border: 2px solid #fff;
      border-radius: 50%;
      padding: 0;
      margin: 0 auto;
      user-select: none;
      background-color: rgba(0, 0, 0, 0.6);
      transition: background-color 0.5s ease;
      left: 50%; top: 50%;
      transform: translate(-50%, -50%);
      z-index: 1000;
      cursor: pointer;
    }
    .virtualtour__playbutton:after {
      position: absolute;
      top: calc(50% - 25px);
      left: calc(50% - 14px);
      display: block;
      content: '';
      box-sizing: border-box;
      border-color: transparent transparent transparent #fff;
      border-style: solid;
      border-width: 26px 0 26px 40px;
    }
    .virtualtour__playbutton::hover {
      background-color: rgba(0, 33, 66, 0.9);
    }

    .sr-only{
      border: 0 !important;
      clip: rect(1px, 1px, 1px, 1px) !important; /* 1 */
      -webkit-clip-path: inset(50%) !important;
        clip-path: inset(50%) !important;  /* 2 */
      height: 1px !important;
      margin: -1px !important;
      overflow: hidden !important;
      padding: 0 !important;
      position: absolute !important;
      width: 1px !important;
      white-space: nowrap !important;            /* 3 */
    }

  </style>

  <body>

    <?php if( isset($_GET['pano']) && isset($_GET['thumb']) ):  ?>

    <?php
      $blurclass = '';
      if( isset($_GET['noblur']) ){
        $blurclass = 'this--noblur';
      }
    ?>

      <div class="virtualtour">
        <iframe id="tourframe" class="virtualtour__iframe" data-src="//<?=urldecode($_GET['pano']);?>" src=""></iframe>
        <div id="tourthumb" class="virtualtour__thumbnail <?=$blurclass?>" style="background-image: url('//<?=urldecode($_GET['thumb']);?>')"></div>
        <button id="tourbuttn" onclick="mazvirtualtour.play();" class="virtualtour__playbutton">
          <span class="sr-only"> Star The Tour </span>
        </button>
      </div>

    <?php else: ?>

      <pre>
      Usage:
        ?pano=[<a href="https://www.urlencoder.org/" target="_blank" rel="noreferrer noopener">urlencoded</a>-url-for-pano]
        &thumb=[<a href="https://www.urlencoder.org/" target="_blank" rel="noreferrer noopener">urlencoded</a>-url-for-thumbnail ]
        &noblur [optional, does what it says]
        &autoplay [optional, does what it says]

        *do not include the protocol in either URL!
      </pre>

    <?php endif; ?>

    <script>
      var mazvirtualtour = (function(){

        var tourframe = document.getElementById("tourframe");
        var tourthumb = document.getElementById("tourthumb");
        var tourbuttn = document.getElementById("tourbuttn");

        play = function() {
          tourframe.classList.add('this--visible');
          tourthumb.classList.add('this--fadeout');
          tourframe.setAttribute("src", tourframe.getAttribute('data-src')  );
          tourbuttn.remove();
        };

        <?php if( isset($_GET['autoplay']) ): ?>
          setTimeout(function(){
            play();
          }, 150);
        <?php endif; ?>

        return{
          play: play
        };

      })();
    </script>

  </body>
</html>
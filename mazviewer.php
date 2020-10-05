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

    <!-- If this GET parameter is set, we will display beautiful shadows on mattes, something I really regret losing in the production verion -->

    <!-- Loading Aframe and Dependencies -->
    <script src="https://aframe.io/releases/1.0.3/aframe.min.js"></script>
    <script src="assets/aframe-orbit-controls.min.js"></script>
    <!-- <script src="assets/aframe-teleport-controls.min.js"></script> -->
    <script src="assets/aframe-look-at-component.js"></script>
    <script src="assets/animation-mixer.js"></script>
    <script src="assets/aframe-event-set-component.min.js"></script>

    <link rel="stylesheet" href="https://use.typekit.net/foo7sru.css">

  </head>

  <body>


    <a-scene shadow="type: pcfsoft">

      <!-- All Images -->
      <a-assets>
        <img id="img_sky" src="src/additional/<?=$_GET['pano']?>">
      </a-assets>


      <!-- Camera with Raycaster (so we can interact with the scene with the mouse/touch) -->
        <a-entity id="camera" camera="far: 5000; zoom: 0.6" look-controls="" cursor="rayOrigin: mouse" raycaster="direction: 0.9218844171533822 -0.07934214953674647 -0.37925445905968874; origin: -1.8387398940563615 2.3769941735180065 -0.12375643952806391; useWorldCoordinates: true; objects: .clickable;" data-aframe-inspector-original-camera=""></a-entity>
      <!-- </a-entity> -->

      <!-- Background Image -->
      <a-sky id="mainsky" src="#img_sky"></a-sky>


    </a-scene>


  </body>
</html>
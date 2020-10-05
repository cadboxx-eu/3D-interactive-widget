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

    <!-- Loads custom scripts for events and animations <-->
    <script src="assets/spa.js?v=<?=$globalVersion?>"></script>

  </head>

  <body>


    <a-scene shadow="type: pcfsoft">

      <!-- All Images -->
      <a-assets>
        <img id="img_navarrow" src="src/navarrow.png?v=<?=$globalVersion?>">
        <img id="img_spa1_sky" src="src/Spa1.jpg?v=<?=$globalVersion?>">
        <img id="img_spa2_sky" src="src/Spa1.jpg?v=<?=$globalVersion?>">
        <img id="img_spa3_sky" src="src/Spa1.jpg?v=<?=$globalVersion?>">
      </a-assets>


      <!-- Camera with Raycaster (so we can interact with the scene with the mouse/touch) -->
        <a-entity id="camera" camera="far: 5000; zoom: 0.6" look-controls="" cursor="rayOrigin: mouse" raycaster="direction: 0.9218844171533822 -0.07934214953674647 -0.37925445905968874; origin: -1.8387398940563615 2.3769941735180065 -0.12375643952806391; useWorldCoordinates: true; objects: .clickable;" data-aframe-inspector-original-camera=""></a-entity>
      <!-- </a-entity> -->


      <!-- Navigation Arrows -->
      <a-image
        sky-click-handler="spa2_sky"
        id="arrow"
        data-partof="spa1_sky"
        class="clickable"
        look-at="#camera"
        src="#img_navarrow"
        alpha-test=""
        material="opacity: 0.8"
        geometry="primitive: circle; radius: 2.3"
        desktop-geometry="primitive: circle; radius: 2.0"
        shadow="receive: false"
        position="-5.2 -10 17.7"
        animation="property: position; to: -5.2 -9 17.7; dur: 3000; easing: easeOutQuad; dir: alternate; loop: true"
        scale="1 1 1"
        animation__mousedown="property: components.material.material.color; type: color; from: #fffefe; to: #aaffff; startEvents: mouseenter; dur: 500"
        animation__mouseleave="property: components.material.material.color; type: color; to: white; startEvents: mouseleave; dur: 500"
        animation__mousedown_scale="property: scale; to: 1.1 1.1 1.1; startEvents: mouseenter; dur: 350; easing: easeOutQuad;"
        animation__mouseleave_scale="property: scale; to: 1 1 1; startEvents: mouseleave; dur: 350; easing: easeOutQuad;"
      >
      </a-image>






      <!-- Background Image -->
      <a-sky id="mainsky" src="#img_spa1_sky"></a-sky>


    </a-scene>


  </body>
</html>
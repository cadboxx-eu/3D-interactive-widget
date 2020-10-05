<?php

  $globalVersion = '1.5.0';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Villas on Rio Virtual Pod Tour</title>
    <meta name="description" content="Mouse Click Example - A-Frame">
    <meta charset="utf-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <!-- If this GET parameter is set, we will display beautiful shadows on mattes, something I really regret losing in the production verion -->
    <script>
      var showShadows = <?=(( isset($_GET['shadows']) && $_GET['shadows'] == 'false' ) ? 'false' : 'true')?>
    </script>

    <!-- Loading Aframe and Dependencies -->
    <script src="https://aframe.io/releases/1.0.3/aframe.min.js"></script>
    <script src="assets/aframe-orbit-controls.min.js"></script>
    <!-- <script src="assets/aframe-teleport-controls.min.js"></script> -->
    <script src="assets/aframe-look-at-component.js"></script>
    <script src="assets/animation-mixer.js"></script>
    <script src="assets/aframe-event-set-component.min.js"></script>

    <link rel="stylesheet" href="assets/styles/styles.css?v=<?=$globalVersion?>" />
    <link rel="stylesheet" href="https://use.typekit.net/foo7sru.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400&display=swap" rel="stylesheet">

    <!-- Loads custom scripts for events and animations <-->
    <script src="assets/main.js?v=<?=$globalVersion?>"></script>

  </head>

  <body>

    <a-scene shadow="type: pcfsoft">


      <!-- All Images -->
      <a-assets>
        <img id="img_sky" src="src/B6_360_1.jpg?v=<?=$globalVersion?>">
        <img id="img_circle0" src="src/circle0.png?v=<?=$globalVersion?>">
        <img id="img_circle1" src="src/circle1.png?v=<?=$globalVersion?>">
        <img id="img_circle2" src="src/circle2.png?v=<?=$globalVersion?>">
      </a-assets>


      <!-- Camera with Raycaster (so we can interact with the scene with the mouse/touch) -->
      <a-entity id='cameraWrapper' rotation="0 95 0" position="-0.12365 1.34538 0.72366" >
        <a-entity id="camera" camera="far: 5000; zoom: 0.7" look-controls="" cursor="rayOrigin: mouse" raycaster="direction: 0.9218844171533822 -0.07934214953674647 -0.37925445905968874; origin: -1.8387398940563615 2.3769941735180065 -0.12375643952806391; useWorldCoordinates: true; objects: .clickable;" data-aframe-inspector-original-camera=""></a-entity>
      </a-entity>


      <!-- Spotlight and fill lights -->
      <a-entity light="angle: 20; decay: 7; castShadow: true; distance: 10; shadowCameraFov: 88.5; shadowCameraNear: 2.22; shadowCameraTop: 6.06; shadowCameraRight: 16.83; shadowCameraBottom: -4.91; shadowCameraLeft: -13.19;" position="-7.52044 6.6806 2.678"></a-entity>
      <a-entity light="angle: 20; decay: 10; castShadow: true; distance: 10; shadowCameraFov: 88.5; shadowCameraNear: 2.04; shadowCameraTop: 9.48; shadowCameraRight: 16.74; shadowCameraBottom: -4.67; shadowCameraLeft: -13.27" position="4.69131 6.6806 0.50657"></a-entity>
      <a-entity light="intensity: 0.5; type: ambient"></a-entity>


      <!-- Door- and bedframe mattes -->
      <!-- These are used to both hide the overflow of overlapping objects such as drawers and POIs, as well as provide a surface to recieve shadows -->
      <!-- The shadow-material component (registered in main.js) is used to provide a transparent object which still reveieves a shadow. -->
      <!-- Note that the material component here is not neccesary, but I left it on the element for debugging. We can temporarily remvoe the shadow material -->
      <!-- Component, and then we can see where the matte is positioned in 3D space -->
      <a-box shadow="cast: false" shadow-material="" position="-6.95214 -2.97154 10.46272" geometry="width: 0.5; height: 15; depth: 6" material="opacity: 0.25"></a-box>
      <a-box shadow="cast: false" shadow-material="" position="-6.952 -2.972 -5.86206" geometry="width: 0.5; height: 15; depth: 6.3" material="opacity: 0.25"></a-box>
      <a-box shadow="cast: false" shadow-material="" position="-12.25215 -9.49217 2.34542" geometry="width: 10; height: 4; depth: 0.13" material="opacity: 0.25"></a-box>
      <a-box shadow="cast: false" shadow-material="" position="-17.30051 -7.2446 2.37312" geometry="width: 20; height: 0.2; depth: 17" material="opacity: 0.25"></a-box>

      <a-box shadow="cast: false" shadow-material="" position="-7.29852 -6.8679 -1.96624" geometry="width: 0.2; height: 2; depth: 4" material="opacity: 0.25;"></a-box>

      <!-- This box hides both the overflow of the drawer underneath as well as provide a surface for shadows -->
      <a-box id="desk-top" class="clickable" shadow="cast: false" sshadow-material="" position="8.77143 -4.62456 0.125" width="4" height="4" geometry="width: 4.5; height: 0.35; depth: 9.37" material="opacity: 0.0000"></a-box>


      <!-- clothes Drawer functinoality set in main.js through the animation-click-handler attirbute -->
      <!-- Note how the click handler (the actual POI) is cascading through its parent-elements -->
      <!-- That means when you click the child (and child-child), its parents will also inherit all these handlers -->
      <!-- It's important to turn off the other handlers, otherwise you would trigger the animation/whatever twice! -->
      <a-box
        id="clothes-drawer"
        class="not-clickable custom-animation-object clothes_drawer_click_class"
        shadow="cast: false"
        sshadow-material=""
        position="-9.679 -8.824 4.917"
        geometry="width: 4.5; height: 2.8; depth: 5"
        material="opacity: 0.25"
        animation__mousedown="property: components.material.material.color; type: color; from: red; to: blue; startEvents: mouseenter; dur: 500"
        animation__mouseleave="property: components.material.material.color; type: color; to: white; startEvents: mouseleave; dur: 500"
      >
        <a-box
          animation-click-handler="clothes_drawer_outside"
          id="clothes-drawer-2"
          class="clickable custom-animation-object clothes_drawer_click_class"
          shadow="cast: false"
          sshadow-material=""
          position="0 0 -5.141"
          geometry="width: 4.5; height: 2.8; depth: 5"
          material="opacity: 0.25"
          animation__mousedown="property: components.material.material.color; type: color; from: red; to: blue; startEvents: mouseenter; dur: 500"
          animation__mouseleave="property: components.material.material.color; type: color; to: white; startEvents: mouseleave; dur: 500"
        >
          <a-image id="clothes-drawer-poi" geometry="primitive: circle; radius: 0.425" desktop-geometry="primitive: circle; radius: 0.33" look-at="#camera" src="#img_circle0" alpha-test position="4.885 3.225 2.313" class="clickable"
          animation="property: position; to: 4.885 6 2.313; dur: 2800; easing: easeOutQuad; dir: alternate; loop: 2"
          animation__loop="property: position; to: 4.885 4 2.313; dur: 4050; easing: easeOutQuad; delay: 6500; dir: alternate; loop: true"
          ></a-image>
        </a-box>
      </a-box>


      <!-- Curtain functinoality set in main.js through the animation-click-handler attirbute -->
      <a-box
        id="curtain_outside"
        shadow="cast: false"
        sshadow-material=""
        position="-5.834 0.178 -1.029"
        rotation="0 90 0"
        width="4" height="4"
        geometry="width: 2.400; height: 12.400; depth: 0.100"
        material="opacity: 0.25"
        animation__mousedown="property: components.material.material.color; type: color; from: red; to: blue; startEvents: mouseenter; dur: 500"
        animation__mouseleave="property: components.material.material.color; type: color; to: white; startEvents: mouseleave; dur: 500"
      >
        <a-image id="curtain_outside-poi" src="#img_circle0" geometry="primitive: circle; radius: 0.425" desktop-geometry="primitive: circle; radius: 0.25" alpha-test position="-1.12 1.5 0.5" class="not-clickable" animation="property: position; to: -1.12 1.6 0.5; dur: 3500; easing: easeOutQuad; dir: alternate; loop: true">
          <a-entity material="opacity: 0.00" geometry="primitive: circle; radius: 1.33;" position="1 0 -2" class="clickable" animation-click-handler="curtain_outside"></a-entity>
        </a-image>
      </a-box>


      <!-- Headboard handlers -->
      <a-image
        animation-click-handler="headboard_outside"
        id="headboard_outside"
        shadow="cast: false"
        sshadow-material=""
        class="clickable"
        position="-22 6.861 17.717"
        geometry="primitive: circle; radius: 1.4"
        desktop-geometry="primitive: circle; radius: 0.8"
        material="opacity: 0.95"
        rotation="0 -90 0"
        scale="1.05 1.05 1.05"
        src="#img_circle0"
        animation="property: position; to: -22 5.861 17.717; dur: 2250; easing: easeOutQuad; dir: alternate; loop: true"
        animation__mousedown="property: components.material.material.color; type: color; from: #fffefe; to: #aaffff; startEvents: mouseenter; dur: 500"
        animation__mouseleave="property: components.material.material.color; type: color; to: white; startEvents: mouseleave; dur: 500"
        animation__mousedown_scale="property: scale; to: 1.05 1.05 1.05; startEvents: mouseenter; dur: 500"
        animation__mouseleave_scale="property: scale; to: 1 1 1; startEvents: mouseleave; dur: 500"
      >
      </a-image>


      <!-- bluetooth -->
      <a-image
        id="bluetooth"
        look-at="#camera"
        animation="property: position; to: -10.75 -5.0 9.5; dur: 4000; easing: easeOutQuad; dir: alternate; loop: true"
        src="#img_circle0"
        alpha-test=""
        material="opacity: 0.75"
        geometry="primitive: circle; radius: 0.5"
        desktop-geometry="primitive: circle; radius: 0.3"
        shadow="receive: false"
        position="-10.75 -5.5 9.5"
        scale="1.75 1.75 1.75"
        animation__mousedown="property: components.material.material.color; type: color; from: #fffefe; to: #aaffff; startEvents: mouseenter; dur: 500"
        animation__mouseleave="property: components.material.material.color; type: color; to: white; startEvents: mouseleave; dur: 500"
        animation__mousedown_scale="property: scale; to: 1.8 1.8 1.8; startEvents: mouseenter; dur: 350; easing: easeOutQuad;"
        animation__mouseleave_scale="property: scale; to: 1.75 1.75 1.75; startEvents: mouseleave; dur: 350; easing: easeOutQuad;"
      >
      <a-entity material="opacity: 0.00" geometry="primitive: circle; radius: 1.33;" position="0 0 -2" class="clickable" animation-click-handler="bluetooth_outside"></a-entity>
      </a-image>

      <!-- bluetooth -->
      <a-image
        id="bed"
        look-at="#camera"
        animation="property: position; to: -9.75 -5.0 1.5; dur: 4000; easing: easeOutQuad; dir: alternate; loop: true"
        src="#img_circle0"
        alpha-test=""
        material="opacity: 0.75"
        geometry="primitive: circle; radius: 0.5"
        desktop-geometry="primitive: circle; radius: 0.3"
        shadow="receive: false"
        position="-9.75 -5.5 1.5"
        scale="1.75 1.75 1.75"
        animation__mousedown="property: components.material.material.color; type: color; from: #fffefe; to: #aaffff; startEvents: mouseenter; dur: 500"
        animation__mouseleave="property: components.material.material.color; type: color; to: white; startEvents: mouseleave; dur: 500"
        animation__mousedown_scale="property: scale; to: 1.8 1.8 1.8; startEvents: mouseenter; dur: 350; easing: easeOutQuad;"
        animation__mouseleave_scale="property: scale; to: 1.75 1.75 1.75; startEvents: mouseleave; dur: 350; easing: easeOutQuad;"
      >
      <a-entity material="opacity: 0.00" geometry="primitive: circle; radius: 1.33;" position="0 0 -2" class="clickable" animation-click-handler="bed"></a-entity>
      </a-image>


      <!-- lighting -->
      <a-image
        id="lighting"
        look-at="#camera"
        src="#img_circle0"
        alpha-test=""
        material="opacity: 0.75"
        geometry="primitive: circle; radius: 0.56"
        desktop-geometry="primitive: circle; radius: 0.4"
        shadow="receive: false"
        position="-20.75 7.8 5"
        animation="property: position; to: -20.75 9 5; dur: 3650; easing: easeOutQuad; dir: alternate; loop: true"
        scale="1.75 1.75 1.75"
        animation__mousedown="property: components.material.material.color; type: color; from: #fffefe; to: #aaffff; startEvents: mouseenter; dur: 500"
        animation__mouseleave="property: components.material.material.color; type: color; to: white; startEvents: mouseleave; dur: 500"
        animation__mousedown_scale="property: scale; to: 1.8 1.8 1.8; startEvents: mouseenter; dur: 350; easing: easeOutQuad;"
        animation__mouseleave_scale="property: scale; to: 1.75 1.75 1.75; startEvents: mouseleave; dur: 350; easing: easeOutQuad;"
      >
      <a-entity material="opacity: 0.00" geometry="primitive: circle; radius: 1.33;" position="0 0 -2" class="clickable" animation-click-handler="lighting_outside"></a-entity>
      </a-image>


      <!-- Link to Interior -->
      <a-image
        framechange-click-handler="index.php<?=(( isset($_GET['shadows']) ) ? '?shadows='.$_GET['shadows'] : '')?>"
        id="arrow"
        class="clickable"
        look-at="#camera"
        src="#img_circle2"
        alpha-test=""
        material="opacity: 0.75"
        geometry="primitive: circle; radius: 1.8"
        desktop-geometry="primitive: circle; radius: 1.35"
        shadow="receive: false"
        position="-13 -4.5 5"
        animation="property: position; to: -13 -4.1 5; dur: 3000; easing: easeOutQuad; dir: alternate; loop: true"
        scale="1 1 1"
        animation__mousedown="property: components.material.material.color; type: color; from: #fffefe; to: #aaffff; startEvents: mouseenter; dur: 500"
        animation__mouseleave="property: components.material.material.color; type: color; to: white; startEvents: mouseleave; dur: 500"
        animation__mousedown_scale="property: scale; to: 1.1 1.1 1.1; startEvents: mouseenter; dur: 350; easing: easeOutQuad;"
        animation__mouseleave_scale="property: scale; to: 1 1 1; startEvents: mouseleave; dur: 350; easing: easeOutQuad;"
      >
      </a-image>


      <!-- Background Image -->
      <a-sky id="mainsky" src="#img_sky"></a-sky>


    </a-scene>

    <!-- Dialog related markup -->
    <?php require 'blocks/dialogue.php'; ?>

  </body>
</html>
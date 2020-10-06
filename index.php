<?php

  $globalVersion = '1.5.0';

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Virtual Object Test by Moritz Zimmer</title>
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

    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,800;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/newstyles.css?v=<?=$globalVersion?>" />

    <!-- Loads custom scripts for events and animations <-->
    <script src="assets/main.js?v=<?=$globalVersion?>"></script>

  </head>

  <body>

    <a-scene shadow="type: pcfsoft" background="color: white" loading-screen="dotsColor: #ff3300; backgroundColor: white">


      <!-- All Images -->
      <a-assets>
        <a-asset-item id="tree-obj" src="src/Tshirt_obj.obj"></a-asset-item>
        <a-asset-item id="tree-obj" src="src/male.obj"></a-asset-item>
        <a-asset-item id="tree-obj" src="src/female.obj"></a-asset-item>
        <a-asset-item id="tree-mtl" src="src/TShirt.mtl"></a-asset-item>

        <img id="img_sky" src="src/bgwhite2.jpg?v=<?=$globalVersion?>">

        <img id="tshirt1" src="src/bunt.jpeg?v=<?=$globalVersion?>">
        <img id="tshirt2" src="src/art.jpeg?v=<?=$globalVersion?>">
        <img id="tshirt3" src="src/pattern.jpeg?v=<?=$globalVersion?>">
        <img id="tshirt4" src="src/rainbow.jpeg?v=<?=$globalVersion?>">
        <img id="tshirt5" src="src/bismillah.jpg?v=<?=$globalVersion?>">

        <img id="img_circle0" src="src/circle0.png?v=<?=$globalVersion?>">
        <img id="img_circle1" src="src/circle1.png?v=<?=$globalVersion?>">
        <img id="img_circle2" src="src/circle2.png?v=<?=$globalVersion?>">
        <img id="img_appletv" src="src/appletv-min.png?v=<?=$globalVersion?>">


        <img id="brick_diffuse" src="https://aframe.io/sample-assets/assets/images/bricks/brick_diffuse.jpg" crossorigin="anonymous">

      </a-assets>



      <a-entity id='cameraWrapper' rotation="0 90 0" position="-0.12365 0 0.72366" >
        <a-entity  camera look-controls orbit-controls="target: 0 0 0; autoRotate: true; autoRotateSpeed: 0.05; minDistance: 5; maxDistance: 25; initialPosition: 2 2 6"></a-entity>
      </a-entity>


      <a-entity
        id="tshirty"
        obj-model="obj: src/male.obj"
        scale="0 0 0"
        position="-0.2 -3.05 0"
        rotation="0 90 0"
        material="src: #tshirt1">
      </a-entity>

      <a-entity
        id="tshirtf"
        obj-model="obj: src/female.obj"
        scale="0.1 0.1 0.1"
        position="-0.2 -2.5 -6"
        rotation="0 90 0"
        material="src: #tshirt1">
      </a-entity>





      <!-- Spotlight and fill lights -->
      <!-- <a-entity light="angle: 20; decay: 7; castShadow: true; distance: 10; shadowCameraFov: 88.5; shadowCameraNear: 2.22; shadowCameraTop: 6.06; shadowCameraRight: 16.83; shadowCameraBottom: -4.91; shadowCameraLeft: -13.19;" position="-7.52044 6.6806 2.678"></a-entity> -->

      <!-- <a-entity light="angle: 20; decay: 10; castShadow: true; distance: 10; shadowCameraFov: 88.5; shadowCameraNear: 2.04; shadowCameraTop: 9.48; shadowCameraRight: 16.74; shadowCameraBottom: -4.67; shadowCameraLeft: -13.27" position="4.69131 6.6806 0.50657"></a-entity> -->

      <a-entity light="angle: 20; decay: 7; castShadow: true; distance: 10; shadowCameraFov: 88.5; shadowCameraNear: 2.22; shadowCameraTop: 6.06; shadowCameraRight: 16.83; shadowCameraBottom: -4.91; shadowCameraLeft: -13.19; intensity: 0.25" position="-7.52044 6.6806 2.678"></a-entity>

      <a-entity light="angle: 20; decay: 10; castShadow: true; distance: 10; shadowCameraFov: 88.5; shadowCameraNear: 2.04; shadowCameraTop: 9.48; shadowCameraRight: 16.74; shadowCameraBottom: -4.67; shadowCameraLeft: -13.27; intensity: 0.5" position="13.93467 17.45536 -7.90778"></a-entity>


      <a-entity light="intensity: 0.5; type: ambient"></a-entity>


      <!-- Goodbye, Friend :'(' -->
      <a-sphere position="6.96188 -0.37915 -9.11629" id="pizzaSphere" radius="1.25" color="#EF2D5E" shadow="" material="opacity: 0.6" geometry="radius: 0.5" animation="property: position; to: 5 -4.6 2; dur: 5500; dir: alternate; easing: linear; loop: true"></a-sphere>


      <!-- Background Image -->
      <a-sky id="mainsky" src="#img_sky"></a-sky>


    </a-scene>


    <div class="switcher">
      Body Type
      <button class="switcher__button type_switcher this--active" data-showbodytype="tshirtf">Female</button>
      <button class="switcher__button type_switcher" data-showbodytype="tshirty">Male</button>
      <br>
      <br>
      Design
      <button class="switcher__button material_switcher this--active" data-outfitid="tshirt1">Geometric</button>
      <button class="switcher__button material_switcher" data-outfitid="tshirt2">AArt</button>
      <button class="switcher__button material_switcher" data-outfitid="tshirt3">Abstract</button>
      <button class="switcher__button material_switcher" data-outfitid="tshirt4">Rainbow</button>
      <button class="switcher__button material_switcher" data-outfitid="tshirt5">Calligraphy</button>
    </div>


    <script>
      aframeInteractions.init();
    </script>


  </body>
</html>
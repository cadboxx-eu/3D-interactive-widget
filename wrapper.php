<!DOCTYPE html>
<html>
<head>
  <title>Villas on Rio Virtual Virtual Pod Tour</title>
  <meta name="description" content="Mouse Click Example - A-Frame">
  <meta charset="utf-8">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  <link rel="stylesheet" href="https://use.typekit.net/foo7sru.css">
  <style>
    @keyframes splashani{
      from { opacity: 0; }
      to   { opacity: 1; }
    }

    .podiframe,
    .welcomemessage{
      position: absolute;
      left: 0; top: 0;
      width: 100%; height: 100%;
    }

    .welcomemessage{
      background: #263d4a;
    }

    .welcomemessage__headline{
      font-family: questa-grande, serif;
      position: absolute;
      width: 100%;
      text-align: center;
      top: 50%;
      color: #fff;
      transform: translateY(-50%);
      font-weight: 400 !important;
    }

    .podiframe{
      opacity: 0;
      animation-delay: 2s;
      animation-name: splashani;
      animation-duration: 3s;
      animation-fill-mode: forwards;
      background: white;
    }




  </style>
</head>

<body>

  <div class="welcomemessage">
    <h1 class="welcomemessage__headline">Enjoy Your Pod Experience</h1>
  </div>

  <iframe src="outside.php?shadows=false" frameborder="0" class="podiframe"></iframe>



</body>
</html>
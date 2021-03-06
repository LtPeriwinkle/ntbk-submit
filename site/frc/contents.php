<!DOCTYPE html>
<html lang="en">
<head>
  <title>8012 Notebook</title>
  <meta charset="UTF-8">
  <meta name="author" content="periwinkle">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../home.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Epilogue&display=swap">
  <style>
    a:link {
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <div id="nav" class="w3-bar w3-black w3-text-white w3-bottom-bar w3-border-black">
    <a href="/frc" class="w3-bar-item w3-button w3-hover-dark-gray">home</a>
    <a href="" class="w3-bar-item w3-button w3-hover-dark-gray">notebook</a>
    <a href="/frc/contribute" class="w3-bar-item w3-button w3-hover-dark-gray">contribute</a>
  </div>
  <div id="main">
    <h1 class="epilogue">Notebook Table of Contents</h1>
    <p>This is where you can see the notebook created by members of Team 8012.</p>
  <?php
    session_start();
    if (!empty($_SESSION["files"])) {
      unset($_SESSION["files"]);
    }
    $files = scandir("/data/frc/md/");
    $_SESSION["files"] = $files;
    $index = 2;
    foreach ($files as $file) {
        $title = substr($file, 0, -3);
        if ($title != "") {
          echo "<a href='preview?file=$index'>$title</a><br>";
          $index += 1;
        }
    }
  ?>
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>9573X Notebook</title>
  <meta charset="UTF-8">
  <meta name="author" content="yx">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Epilogue&display=swap">
</head>

<body>
  <div id="nav" class="w3-bar w3-black w3-text-white w3-bottom-bar w3-border-black">
    <a href=".." class="w3-bar-item w3-button w3-hover-dark-gray">home</a>
    <a href="" class="w3-bar-item w3-button w3-hover-dark-gray">notebook</a>
    <a href="contribute" class="w3-bar-item w3-button w3-hover-dark-gray">contribute</a>
    <a href="tutorial" class="w3-bar-item w3-button w3-hover-dark-gray">tutorial</a>
  </div>
  <div id="main">
    <h1 class="epilogue">Notebook Table of Contents</h1>
    <p>This is where you can see the notebook created by members of Team 9573X.</p>
  <?php
    $files = scandir("/data/md/");
    foreach ($files as $file) {
        $title = $file;
        echo "<a href='preview?file=$file'>$title</a><br>";
    }
  ?>
  </div>
</body>
</html>

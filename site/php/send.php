<!DOCTYPE html>
<html lang="en">
<head>
  <title>9573X Notebook</title>
  <meta charset="UTF-8">
  <meta name="author" content="periwinkle">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Epilogue&display=swap">
</head>

<body>
  <div id="nav" class="w3-bar w3-black w3-text-white w3-bottom-bar w3-border-black">
    <a href=".." class="w3-bar-item w3-button w3-hover-dark-gray">home</a>
    <a href="contents" class="w3-bar-item w3-button w3-hover-dark-gray">notebook</a>
    <a href="contribute" class="w3-bar-item w3-button w3-hover-dark-gray">contribute</a>
    <a href="tutorial" class="w3-bar-item w3-button w3-hover-dark-gray">tutorial</a>
    <a href="contact" class="w3-bar-item w3-button w3-hover-dark-gray">contact</a>
    <a href="data" class="w3-bar-item w3-button w3-dark-gray">data</a>
  </div>
  <div id="main">
    <h1 class="epilogue">your form has been sent with the requested urgency.</h1>
    <a href="..">back to homepage</a>
  </div>
</body>
</html>
<?php
  chdir("/data/send/");
  $file = fopen("{$_SERVER['REQUEST_TIME']}.txt", "w");
  fwrite($file, "{$_POST["body"]} by {$_POST["name"]}");
  fclose($file);
?>

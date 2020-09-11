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

  <!-- This is the markdown parsing for the preview -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/markdown-it/11.0.0/markdown-it.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/monokai.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js"></script>
  <script src="md.js"></script>
</head>

<body onload="parse()">
  <div id="nav" class="w3-bar w3-black w3-text-white w3-bottom-bar w3-border-black">
    <a href=".." class="w3-bar-item w3-button w3-hover-dark-gray">home</a>
    <a href="contents" class="w3-bar-item w3-button w3-hover-dark-gray">notebook</a>
    <a href="contribute" class="w3-bar-item w3-button w3-hover-dark-gray">contribute</a>
    <a href="tutorial" class="w3-bar-item w3-button w3-hover-dark-gray">tutorial</a>
  </div>
  <div hidden id="raw">
  <?php
    session_start();
    $index = $_GET["file"];
    $filename = $_SESSION["files"][$index];
    $md = file_get_contents("/data/md/{$filename}");
    if ($md != False) {
      echo $md;
    } else {
      echo "# ERROR: THE FILE YOU REQUESTED DOES NOT EXIST";
      echo "## Please click 'Table of Contents' to find valid files";
    }
  ?>
  </div>
  <div id="preview" class="preview" font-family="Roboto"></div>
  <div align="center" id="ntbk-nav">
    <a href=contents>Table of Contents</a>
  </div>
</body>
</html>

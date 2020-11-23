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
  <script src="img.js"></script>
  <!-- This is the markdown parsing for the preview -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/markdown-it/11.0.0/markdown-it.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/monokai.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/highlight.min.js"></script>
  <script src="md.js"></script>
</head>

<body onload="parse(); imageSize();">
  <div id="nav" class="w3-bar w3-black w3-text-white w3-bottom-bar w3-border-black">
    <a href=".." class="w3-bar-item w3-button w3-hover-dark-gray">home</a>
    <a href="contents" class="w3-bar-item w3-button w3-hover-dark-gray">notebook</a>
    <a href="contribute" class="w3-bar-item w3-button w3-hover-dark-gray">contribute</a>
    <a href="tutorial" class="w3-bar-item w3-button w3-hover-dark-gray">tutorial</a>
    <a href="contact" class="w3-bar-item w3-button w3-hover-dark-gray">contact</a>
    <a href="data" class="w3-bar-item w3-button w3-dark-gray">data</a>
  </div>
  <div hidden id="raw">
  <?php
    session_start();
    $index = $_GET["file"];
    if (empty($_SESSION["files"])) {
      $_SESSION["files"] = scandir("/data/md");
    }
    $filename = $_SESSION["files"][$index];
    $md = file_get_contents("/data/md/{$filename}");
    if ($md != False) {
      echo $md;
    } else {
      echo "<h1>The file you requested does not exist.</h1> <h4>Please return to the table of contents to find valid files.</h4>
      <p>If the Table of Contents directed you here, please file an issue on Github with the filename that you clicked.</p>";
    }
  ?>
  </div>
  <div id="preview" class="preview" font-family="Roboto"></div>
  <div align="center" id="ntbk-nav">
    <?php
      $prev = $_GET["file"] - 1;
      $next = $_GET["file"] + 1;
      $numfiles = count($_SESSION["files"]);
      echo "<div class='w3-bar'>";
      if ($_GET["file"] != 2) {
        echo "<a class='w3-button w3-hover-dark-gray' href='preview?file={$prev}'>Previous</a>";
      }
      echo "<a class='w3-button w3-hover-dark-gray' href='contents'>Table of Contents</a>";
      if ($_GET["file"] != $numfiles - 1) {
        echo "<a class='w3-button w3-hover-dark-gray' href='preview?file={$next}'>Next</a>";
      }
      echo "</div>";
      ?>
  </div>
</body>
</html>

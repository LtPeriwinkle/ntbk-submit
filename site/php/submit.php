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
  </div>
  <div id="main">
  <?php
  chdir("/data/md/");
  $name = "{$_POST["date"]}-{$_POST["cat"]}.md";
  $file = fopen($name, "w");
  $text = "# {$_POST["title"]}\n";
  fwrite($file, $text);
  $text = "### {$_POST["cat"]} by {$_POST["name"]} on {$_POST["date"]}\n";
  fwrite($file, $text);
  $text = "{$_POST["desc"]}\n";
  fwrite($file, $text);
  $i = 0;
  $count = count($_FILES["pic"]["tmp_name"]);
  while($i < $count) {
    if ($_FILES["pic"]["size"][$i] != 0) {
      fwrite($file, "![](https://apexnotebook.ml/img/{$_POST["date"]}-{$_POST["cat"]}-{$i}.png)\n");
    }
    $i = $i + 1;
  }
  $i = 0;
  while ($i < $count) {
    $tmp_path = $_FILES["pic"]["tmp_name"][$i];
    if ($tmp_path != "") {
      $final_path = "/data/img/{$_POST["date"]}-{$_POST["cat"]}-{$i}.png";
      move_uploaded_file($tmp_path, $final_path);
    }
    $i += 1;
  }
  fclose($file);
  ?>
  <h3>Thank you for submitting!</h3>
  <p>Your submission will be automatically added to the notebook! It will be manually reviewed, and if it needs<br>
   to be removed, you will be contacted. You can preview the notebook <a href="contents">here</a> or by clicking "notebook" in the bar at the top.</p>
  </div>
</body>
</html>
